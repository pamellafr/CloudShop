<?php

require __DIR__."/Includes/app.php";

use \App\Http\Router;

//Inicia o router
$router = new Router(URL);

//Inclui as rotas de páginas
include __DIR__."/Routes/Pages.php";

//Inclui as rotas do painel
include __DIR__."/Routes/Admin.php";

//Imprime o response da rota
$router->run()->sendResponse();

?>