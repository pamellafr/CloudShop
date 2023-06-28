<?php
namespace App\Controller\Pages;

use \App\Utils\View;

/**
 * Método responsável por retornar o conteúdo(view) da nossa login
 * @return string
 */
class Login extends Page
{
    public static function getLogin()
    {
        //View da home
        $content = View::render("pages/login", []);

        //Retorna a view da página
        return parent::getPage("Login - CloudShop", $content, "login");
    }
}
?>