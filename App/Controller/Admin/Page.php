<?php
namespace App\Controller\Admin;

use \App\Utils\View;

/**
 * Método responsável por retornar o conteúdo(view) da nossa página genérica
 * @return string
 */
class Page
{

    /**
     * Método responsável por renderizar o topo da página
     * @return string
     */
    private static function getHeader($caminho)
    {
        return View::render("pages/header",[
            "caminho" => $caminho
        ]);
    }

    /**
     * Método responsável por renderizar o rodapé da página
     * @return string
     */
    private static function getFooter($caminho)
    {
        return View::render("pages/footer",[
            "caminho" => $caminho
        ]);
    }

    /**
     * Método responsável por retornar o conteúdo (view) da estrutura genérica de página
     * @param string $title
     * @param string $content
     * @return string
     */
    public static function getPage($title, $content, $page)
    {
        //ESCOLHER A PASTA DOS ASSETS (CSS, IMG, JS)
        $opcao = explode(" ", $page);
        $opcao = count($opcao) > 1 ? $opcao[1] : "";
        $caminho = ($opcao == "edit") ? "./../.." : "./..";

        return View::render("pages/page", [
            "title" => $title,
            "page" => $page,
            "caminho" => $caminho,
            "header" => self::getHeader($caminho),
            "content" => $content,
            "footer" => self::getFooter($caminho)
        ]);
    }
}
?>