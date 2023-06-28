<?php
namespace App\Controller\Admin;

use \App\Utils\View;
use \App\Model\Entity\Client;

/**
 * Método responsável por retornar o conteúdo(view) da nossa cadastro
 * @return string
 */
class Cadastro extends Page
{
    public static function getCadastro($request, $id)
    {

        $client = Client::clientToArray($id);

        //View da home
        $content = View::render("admin/cadastro", $client);

        //Retorna a view da página
        return parent::getPage("Cadastro - CloudShop", $content, "cadastro edit");
    }

    /**
     * Método responsável por cadastrar um Cliente
     * @param Request $request
     * @return string
     */
    public static function insertClient($request){
        //Dados do post
        $postVars = $request->getPostVars();
        
        //Nova instância de cliente
        $client = (new Client())->criar(
            $postVars["nome"],
            $postVars["email"],
            $postVars["senha"],
            $postVars["pessoa"],
            $postVars["cpf"],
            $postVars["cnpj"],
            $postVars["nascimento"],
            $postVars["telefone"],
            $postVars["endereco"],
            $postVars["cep"],
            $postVars["cartao"],
            $postVars["titular"],
            $postVars["codigo"],
            $postVars["vencimento"]
        );

        $client->cadastrar();

        return self::getCadastro();
    }

    /**
     * Método responsável por editar as informações do usuário
     * @param Request $request
     * @return string
     */
    public static function adminCadastro($request)
    {
        //POST VARS
        $postVars = $request->getPostVars();
        $tipo = $postVars["tipo"];

        if($tipo == "edit"){
            self::editCadastro($request);
        }else if($tipo == "delete"){
            self::deleteCadastro($request);
        }
    }

    public static function editCadastro($request)
    {
        //POST VARS
        $postVars = $request->getPostVars();
        array_shift($postVars);
        $client = (new Client)->criarArray($postVars);

        //CRIA A SESSÃO DE LOGIN
        if($client->editar($postVars)){
            //REDIRECIONA O USUÁRIO PARA A EDIÇÃO DE CADASTRO
            $request->getRouter()->redirect("/admin/cadastro/".$client->id);
        }else{
            echo "erro ao editar";
        }
    }

    public static function deleteCadastro($request)
    {
        //POST VARS
        $postVars = $request->getPostVars();
        array_shift($postVars);
        $client = (new Client)->criarArray($postVars);

        //CRIA A SESSÃO DE LOGIN
        if($client->delete()){
            //REDIRECIONA O USUÁRIO PARA A EDIÇÃO DE CADASTRO
            $request->getRouter()->redirect("/admin/login");
        }else{
            echo "erro ao deletar";
        }
    }
}
?>