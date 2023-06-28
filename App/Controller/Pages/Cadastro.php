<?php
namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Client;
use \App\Controller\Admin\Login;

/**
 * Método responsável por retornar o conteúdo(view) da nossa cadastro
 * @return string
 */
class Cadastro extends Page
{
    public static function getCadastro()
    {
        //View da home
        $content = View::render("pages/cadastro", []);

        //Retorna a view da página
        return parent::getPage("Cadastro - CloudShop", $content, "cadastro");
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

        //REDIRECIONA O USUÁRIO PARA A EDIÇÃO DE CADASTRO
        $request->getRouter()->redirect("/admin/login");
    }
}
?>