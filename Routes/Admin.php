<?php

use \App\Http\Response;
use \App\Controller\Admin;

//Rota admin
$router->get('/admin', [
    function(){
        return new Response(200, "Admin :)");
    }
]);

//Rota admin login
$router->get('/admin/login', [
    function($request){
        return new Response(200, Admin\Login::getLogin($request));
    }
]);
$router->post('/admin/login', [
    function($request){
        return new Response(200, Admin\Login::setLogin($request));
    }
]);

//Rota admin cadastro
$router->get('/admin/cadastro', [
    function($request){
        return new Response(200, Admin\Cadastro::getCadastro($request));
    }
]);
$router->get('/admin/cadastro/{{idPagina}}', [
    function($idPagina,$request){
        return new Response(200, Admin\Cadastro::getCadastro($request, $idPagina));
    }
]);

//Rota admin edit
$router->post('/admin/cadastro/{{idPagina}}', [
    function($request){
        return new Response(200, Admin\Cadastro::adminCadastro($request));
    }
]);

?>