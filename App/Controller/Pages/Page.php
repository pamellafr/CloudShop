<?php
namespace App\Controller\Pages;

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
    private static function getHeader()
    {
        return View::render("pages/header",[
            "caminho" => "."
        ]);
    }

    /**
     * Método responsável por renderizar o rodapé da página
     * @return string
     */
    private static function getFooter()
    {
        return View::render("pages/footer",[
            "caminho" => "."
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
        return View::render("pages/page", [
            "title" => $title,
            "page" => $page,
            "caminho" => ".",
            "header" => self::getHeader(),
            "content" => $content,
            "footer" => self::getFooter()
        ]);
    }
}
?>