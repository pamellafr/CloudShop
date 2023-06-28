<?php

namespace App\Model\Entity;

use \App\DatabaseManager\Database;

class Client{
    /**
     * ID do Cliente
     * @var integer
     */
    public $id;

    /**
     * Nome do Cliente
     * @var string
     */
    public $nome;

    /**
     * Email do Cliente
     * @var string
     */
    public $email;

    /**
     * Senha do Cliente
     * @var string
     */
    public $senha;

    /**
     * Tipo do Cliente
     * @var string
     */
    public $pessoa;

    /**
     * CPF do Cliente
     * @var string
     */
    public $cpf;

    /**
     * CNPJ do Cliente
     * @var string
     */
    public $cnpj;

    /**
     * Nascimento do Cliente
     * @var string
     */
    public $nascimento;

    /**
     * Telefone do Cliente
     * @var string
     */
    public $telefone;

    /**
     * Endereço do Cliente
     * @var string
     */
    public $endereco;

    /**
     * CEP do Cliente
     * @var string
     */
    public $cep;

    /**
     * Número do cartão do Cliente
     * @var string
     */
    public $cartao;

    /**
     * Titular do cartão do Cliente
     * @var string
     */
    public $titular;

    /**
     * Código do cartão do Cliente
     * @var string
     */
    public $codigo;

    /**
     * Vencimento do cartao do Cliente
     * @var string
     */
    public $vencimento;

    /**
     * Método responsável por cadastrar a instância atual no banco de dados
     * @return boolean
     */
    public function cadastrar(){
        //Insere o Cliente no banco de dados
        $this->id = (new Database("clientes"))->insert([
            "nome" => $this->nome,
            "email" => $this->email,
            "senha" => $this->senha,
            "pessoa" => $this->pessoa,
            "cpf" => $this->cpf,
            "cnpj" => $this->cnpj,
            "nascimento" => $this->nascimento,
            "telefone" => $this->telefone,
            "endereco" => $this->endereco,
            "cep" => $this->cep,
            "cartao" => $this->cartao,
            "titular" => $this->titular,
            "codigo" => $this->codigo,
            "vencimento" => $this->vencimento
        ]);

        return true;
    }

    public function editar($postVars){
        //Insere o Cliente no banco de dados
        return (new Database("clientes"))->update("id = ".$this->id,$postVars);
    }

    public function delete(){
        //Insere o Cliente no banco de dados
        return (new Database("clientes"))->delete("id = ".$this->id);
    }

    public function criar($nome, $email, $senha, $pessoa, $cpf, $cnpj, $nascimento, $telefone, $endereco, $cep, $cartao, $titular, $codigo, $vencimento){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->pessoa = $pessoa;
        $this->cpf = $cpf;
        $this->cnpj = $cnpj;
        $this->nascimento = $nascimento;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->cep = $cep;
        $this->cartao = $cartao;
        $this->titular = $titular;
        $this->codigo = $codigo;
        $this->vencimento = $vencimento;

        return $this;
    }

    public function criarArray($postVars){
        $this->id = $postVars["id"];
        $this->nome = $postVars["nome"];
        $this->email = $postVars["email"];
        $this->senha = $postVars["senha"];
        $this->pessoa = $postVars["pessoa"];
        $this->cpf = $postVars["cpf"];
        $this->cnpj = $postVars["cnpj"];
        $this->nascimento = $postVars["nascimento"];
        $this->telefone = $postVars["telefone"];
        $this->endereco = $postVars["endereco"];
        $this->cep = $postVars["cep"];
        $this->cartao = $postVars["cartao"];
        $this->titular = $postVars["titular"];
        $this->codigo = $postVars["codigo"];
        $this->vencimento = $postVars["vencimento"];

        return $this;
    }

    /**
     * Método responsável por retornar um usuário conforme seu email
     * @param string $email
     * @return Client
     */
    public static function getUserByEmail($email){
        return (new Database("clientes"))->select("email = '".$email."'")->fetchObject(self::class);
    }

    /**
     * Método responsável por retornar um usuário conforme seu id
     * @param integer $id
     * @return Client
     */
    public static function getUserById($id){
        return (new Database("clientes"))->select("id = '".$id."'")->fetchObject(self::class);
    }

    /**
     * Método responsável por retornar um array com as informações do cliente
     * @param integer $id
     * @return array
     */
    public static function clientToArray($id){
        $client = self::getUserById($id);

        $pessoaFisica = ($client->pessoa == "fisica") ? "checked" : "";
        $pessoaJuridica = ($client->pessoa == "juridica") ? "checked" : "";

        $array = [
            "id" => $id,
            "nome" => $client->nome,
            "email" => $client->email,
            "senha" => $client->senha,
            "pessoa" => $client->pessoa,
            "cpf" => $client->cpf,
            "cnpj" => $client->cnpj,
            "nascimento" => $client->nascimento,
            "telefone" => $client->telefone,
            "endereco" => $client->endereco,
            "cep" => $client->cep,
            "cartao" => $client->cartao,
            "titular" => $client->titular,
            "codigo" => $client->codigo,
            "vencimento" => $client->vencimento,
            "pessoaFisica" => $pessoaFisica,
            "pessoaJuridica" => $pessoaJuridica
        ];

        return $array;
    }

    public function clientArray(){
        $pessoaFisica = ($this->pessoa == "fisica") ? "checked" : "";
        $pessoaJuridica = ($this->pessoa == "juridica") ? "checked" : "";

        $array = [
            "id" => $this->id,
            "nome" => $this->nome,
            "email" => $this->email,
            "senha" => $this->senha,
            "pessoa" => $this->pessoa,
            "cpf" => $this->cpf,
            "cnpj" => $this->cnpj,
            "nascimento" => $this->nascimento,
            "telefone" => $this->telefone,
            "endereco" => $this->endereco,
            "cep" => $this->cep,
            "cartao" => $this->cartao,
            "titular" => $this->titular,
            "codigo" => $this->codigo,
            "vencimento" => $this->vencimento,
            "pessoaFisica" => $pessoaFisica,
            "pessoaJuridica" => $pessoaJuridica
        ];

        return $array;
    }
}

?>