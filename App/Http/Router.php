<?php
    namespace App\Http;

    use \Closure;
    use \Exception;
    use \ReflectionFunction;
    use \App\Http\Middleware\Queue as MiddlewareQueue;

    class Router{
        /**
         * URL completa do projeto (raiz)
         * @var string
         */
        private $url = "";

        /**
         * Prefixo de todas as rotas
         * @var string
         */
        private $prefix = "";

        /**
         * Índice de rotas
         * @var array
         */
        private $routes = [];

        /**
         * Instância de Request
         * @var Request
         */
        private $request;

        /**
         * Método responsável por iniciar uma classe
         * @param string $url
         * 
         */
        public function __construct($url){
            $this->url = $url;
            $this->setPrefix();
            $this->request = new Request($this);
        }

        /**
         * Método responsável por definir o prefixo das rotas
         */
        private function setPrefix(){
            $parseUrl = parse_url($this->url);
            
            $this->prefix = $parseUrl["path"] ?? "";
        }

        /**
         * Método responsável por adicionar uma rota na classe
         * @param string $method
         * @param string $route
         * @param array $params
         * 
         */
        public function addRoute($method, $route, $params = []){
            //Validação dos parâmetros
            foreach($params as $key=>$value){
                if($value instanceof Closure){
                    $params["controller"] = $value;
                    unset($params[$key]);
                    
                    continue;
                }
            }

            //MIDDLEWARES DA ROTA
            $params["middlewares"] = $params["middlewares"] ?? [];

            //Variáveis da rota
            $params["variables"] = [];

            //Padrão de validação das variáveis das rotas
            $patternVariable = "/{{(.*?)}}/";
            if(preg_match_all($patternVariable, $route, $matches)){
                $route = preg_replace($patternVariable, "(.*?)", $route);
                $params["variables"] = $matches[1];
            }

            //Padrão de validação da URL
            $patternRoute = "/^".str_replace("/", "\/", $route)."$/";

            //Adiciona rota dentro da classe
            $this->routes[$patternRoute][$method] = $params;
        }

        /**
         * Método responsável por definir uma rota de GET
         * @param string $route
         * @param array $params
         * 
         */
        public function get($route, $params = []){
            return $this->addRoute("GET", $route, $params);
        }

        /**
         * Método responsável por definir uma rota de POST
         * @param string $route
         * @param array $params
         * 
         */
        public function post($route, $params = []){
            return $this->addRoute("POST", $route, $params);
        }

        /**
         * Método responsável por definir uma rota de PUT
         * @param string $route
         * @param array $params
         * 
         */
        public function put($route, $params = []){
            return $this->addRoute("PUT", $route, $params);
        }

        /**
         * Método responsável por definir uma rota de DELETE
         * @param string $route
         * @param array $params
         * 
         */
        public function delete($route, $params = []){
            return $this->addRoute("DELETE", $route, $params);
        }

        /**
         * Método responsável por retornar a URI
         * @return array
         */
        private function getUri(){
            //URI da request
            $uri = $this->request->getUri();

            //Fatia a URI com o prefixo
            $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

            return end($xUri);
        }

        /**
         * Método responsável por retornar os dados da rota atual
         * @return array
         */
        private function getRoute(){
            //Uri
            $uri = $this->getUri();

            //Method
            $httpMethod = $this->request->getHttpMethod();

            //Valida as rotas
            foreach($this->routes as $patternRoute=>$methods){
                //Verifica se a uri bate o padrão
                if(preg_match($patternRoute, $uri, $matches)){
                    //Verifica o método
                    if(isset($methods[$httpMethod])){
                        //Remove a primeira posicao
                        unset($matches[0]);
    
                        //Variáveis processadas
                        $keys = $methods[$httpMethod]["variables"];
                        $methods[$httpMethod]["variables"] = array_combine($keys, $matches);
                        $methods[$httpMethod]["variables"]["request"] = $this->request;
                        
                        //Retorno dos parâmetros da rota
                        return $methods[$httpMethod];
                    }

                    //Método não permitido/definido
                    throw new Exception("Método não é permitido", 405);
                }
            }

            //Url não encontrada
            throw new Exception("Url não encontrada", 404);
        }

        /**
         * Método responsável por executar a rota atual
         * @return Response
         */
        public function run(){
            try{
                //Obtém a rota atual
                $route = $this->getRoute();

                //Verifica o controlador
                if(!isset($route["controller"])){
                    throw new Exception("A URL não pôde ser processada", 500);
                }

                //Argumentos da função
                $args = [];

                //Reflection
                $reflection = new ReflectionFunction($route["controller"]);
                foreach($reflection->getParameters() as $parameter){
                    $name = $parameter->getName();
                    $args[$name] = $route["variables"][$name] ?? "";
                }

                //RETORNA A EXECUAÇÃO DA FILA DE MIDDLEWARES
                return (new MiddlewareQueue($route["middlewares"], $route["controller"], $args))->next($this->request);

            }catch(Exception $e){
                return new Response($e->getCode(), $e->getMessage());
            }
        }

        /**
         * Método responsável por redirecionar a URL
         * @param string $route
         */
        public function redirect($route){
            //URL
            $url = $this->url.$route;

            //EXECUTA O REDIRECT
            header("location: ".$url);
            exit;
        }
    }
?>