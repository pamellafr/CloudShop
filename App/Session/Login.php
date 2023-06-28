<?php

namespace App\Session;

class Login{

    /**
     * Método responsável por iniciar a sessão
     */
    private static function init(){
        //VERIFICA SE A SESSÃO NÃO ESTÁ ATIVA
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    /**
     * Método responsável por criar o login do usuário
     * @param Client $client
     * @return boolean 
     */
    public static function login($client){
        //INICIA A SESSÃO
        self::init();

        //DEFINE A SESSÃO DO USUÁRIO
        $_SESSION["client"] = [
            "id" => $client->id,
            "nome" => $client->nome,
            "email" => $client->email
        ];
        
        //SUCESSO
        return true;
    }

}

?>