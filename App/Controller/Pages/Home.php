<?php
namespace App\Controller\Pages;

use \App\Utils\View;

/**
 * Método responsável por retornar o conteúdo(view) da nossa home
 * @return string
 */
class Home extends Page
{
    public static function getHome()
    {
        //View da home
        $content = View::render("pages/home", []);

        //Retorna a view da página
        return parent::getPage("Home - CloudShop", $content, "index");
    }
}
?>