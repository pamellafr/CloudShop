<?php

namespace App\Controller\Admin;

use \App\Utils\View;
use \App\Model\Entity\Client;
use \App\Session\Login as Session;

class Login extends Page{
    /**
     * Método responsável por retornar a renderização da página de login
     * @param Request $request
     * @param string $errorMessage
     * @return string
     */
    public static function getLogin($request, $errorMessage = null)
    {
        //Conteúdo da página de login
        $status = !is_null($errorMessage) ? View::render("admin/status", [
            "mensagem" => $errorMessage
        ]) : "";

        //Conteúdo da página de login
        $content = View::render("Admin/login", [
            "status" => $status
        ]);

        //Retorna a view da página
        return parent::getPage("Login - CloudShop", $content, "login");
    }

    /**
     * Método responsável por definir o login do usuário
     * @param Request $request
     * @return string
     */
    public static function setLogin($request)
    {
        //POST VARS
        $postVars = $request->getPostVars();
        $email = (string) $postVars["email"] ?? "";
        $senha = (string) $postVars["senha"] ?? "";

        //password_hash("", PASSWORD_DEFAULT);

        //BUSCA O USUÁRIO PELO EMAIL
        $client = Client::getUserByEmail($email);
        if(!$client instanceof Client){
            return self::getLogin($request, "E-mail inválido");
        }

        //VERIFICA A SENHA DO USUÁRIO
        if(strcmp($senha, $client->senha) != 0){
            return self::getLogin($request, "Senha inválida");
        }

        //CRIA A SESSÃO DE LOGIN
        Session::login($client);

        //REDIRECIONA O USUÁRIO PARA A EDIÇÃO DE CADASTRO
        $request->getRouter()->redirect("/admin/cadastro/".$client->id);
    }
}

?>