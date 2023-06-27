<?php

use \App\Http\Response;
use \App\Controller\Pages;

//ROTA HOME
$router->get('/', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);
$router->get('/index', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);
$router->get('/index.php', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);
$router->get('/index.html', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);

//ROTAS CADASTRO
$router->get('/cadastro', [
    function(){
        return new Response(200, Pages\Cadastro::getCadastro());
    }
]);
$router->get('/cadastro.php', [
    function(){
        return new Response(200, Pages\Cadastro::getCadastro());
    }
]);
$router->get('/cadastro.html', [
    function(){
        return new Response(200, Pages\Cadastro::getCadastro());
    }
]);

//ROTA CADASTRO (INSERT)
$router->post('/cadastro', [
    function($request){
        Pages\Cadastro::insertClient($request);
    }
]);

//PÁGINA DINÂMICA
$router->get('/paginas/{{acao}}/{{idPagina}}', [
    function($idPagina, $acao){
        return new Response(200, "Pagina ".$idPagina." - ".$acao);
    }
]);

?>