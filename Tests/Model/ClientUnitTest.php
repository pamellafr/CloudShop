<?php

use PHPUnit\Framework\TestCase;
use App\Model\Entity\Client;
use App\DatabaseManager\Database;
use \WilliamCosta\DotEnv\Environment;

class ClientUnitTest extends TestCase
{
    public function testeCriar(){
        //Carrega variáveis de ambiente
        Environment::load(__DIR__."/../../");

        $client = new Client();
        $client->id = 1;

        // Dados de teste
        $nome = "John Doe";
        $email = "johndoe@example.com";
        $senha = "password";
        $pessoa = "fisica";
        $cpf = "123456789";
        $cnpj = "";
        $nascimento = "1990-01-01";
        $telefone = "999999999";
        $endereco = "123 Main Street";
        $cep = "12345";
        $cartao = "1234567890123456";
        $titular = "John Doe";
        $codigo = 123;
        $vencimento = "2023-12-31";

        $client->criar(
            $nome, 
            $email, 
            $senha, 
            $pessoa, 
            $cpf, 
            $cnpj, 
            $nascimento, 
            $telefone,
            $endereco, 
            $cep, 
            $cartao, 
            $titular, 
            $codigo, 
            $vencimento
        );

        // Verifica se os dados foram atribuídos corretamente
        $this->assertEquals($nome, $client->nome);
        $this->assertEquals($email, $client->email);
        $this->assertEquals($senha, $client->senha);
        $this->assertEquals($pessoa, $client->pessoa);
        $this->assertEquals($cpf, $client->cpf);
        $this->assertEquals($cnpj, $client->cnpj);
        $this->assertEquals($nascimento, $client->nascimento);
        $this->assertEquals($telefone, $client->telefone);
        $this->assertEquals($endereco, $client->endereco);
        $this->assertEquals($cep, $client->cep);
        $this->assertEquals($cartao, $client->cartao);
        $this->assertEquals($titular, $client->titular);
        $this->assertEquals($codigo, $client->codigo);
        $this->assertEquals($vencimento, $client->vencimento);

        // Verifica se o ID foi atribuído corretamente
        $this->assertNotNull($client->id);
    }

    public function testeCriarArray(){
        //Carrega variáveis de ambiente
        Environment::load(__DIR__."/../../");

        $client = new Client();

        // Dados de teste
        $nome = "John Doe";
        $email = "johndoe@example.com";
        $senha = "password";
        $pessoa = "fisica";
        $cpf = "123456789";
        $cnpj = "";
        $nascimento = "1990-01-01";
        $telefone = "999999999";
        $endereco = "123 Main Street";
        $cep = "12345";
        $cartao = "1234567890123456";
        $titular = "John Doe";
        $codigo = 123;
        $vencimento = "2023-12-31";

        $infos = array(
            "id" => 1,
            "email" => $email,
            "senha" => $senha,
            "nome" => $nome,
            "pessoa" => $pessoa,
            "cpf" =>$cpf,
            "cnpj" => $cnpj,
            "nascimento" => $nascimento,
            "telefone" => $telefone,
            "endereco" => $endereco,
            "cep" => $cep,
            "cartao" => $cartao,
            "titular" => $titular,
            "codigo" => $codigo,
            "vencimento" => $vencimento
        );

        $client->criarArray($infos);

        // Verifica se os dados foram atribuídos corretamente
        $this->assertEquals($nome, $client->nome);
        $this->assertEquals($email, $client->email);
        $this->assertEquals($senha, $client->senha);
        $this->assertEquals($pessoa, $client->pessoa);
        $this->assertEquals($cpf, $client->cpf);
        $this->assertEquals($cnpj, $client->cnpj);
        $this->assertEquals($nascimento, $client->nascimento);
        $this->assertEquals($telefone, $client->telefone);
        $this->assertEquals($endereco, $client->endereco);
        $this->assertEquals($cep, $client->cep);
        $this->assertEquals($cartao, $client->cartao);
        $this->assertEquals($titular, $client->titular);
        $this->assertEquals($codigo, $client->codigo);
        $this->assertEquals($vencimento, $client->vencimento);

        // Verifica se o ID foi atribuído corretamente
        $this->assertNotNull($client->id);
    }

    public function testeClientArray(){
        //Carrega variáveis de ambiente
        Environment::load(__DIR__."/../../");

        $client = new Client();
        $client->id = 1;

        // Dados de teste
        $nome = "John Doe";
        $email = "johndoe@example.com";
        $senha = "password";
        $pessoa = "fisica";
        $cpf = "123456789";
        $cnpj = "";
        $nascimento = "1990-01-01";
        $telefone = "999999999";
        $endereco = "123 Main Street";
        $cep = "12345";
        $cartao = "1234567890123456";
        $titular = "John Doe";
        $codigo = 123;
        $vencimento = "2023-12-31";

        $client->criar(
            $nome, 
            $email, 
            $senha, 
            $pessoa, 
            $cpf, 
            $cnpj, 
            $nascimento, 
            $telefone,
            $endereco, 
            $cep, 
            $cartao, 
            $titular, 
            $codigo, 
            $vencimento
        );

        $infos = $client->clientArray();

        // Verifica se os dados foram atribuídos corretamente
        $this->assertEquals($nome, $infos["nome"]);
        $this->assertEquals($email, $infos["email"]);
        $this->assertEquals($senha, $infos["senha"]);
        $this->assertEquals($cpf, $infos["cpf"]);
        $this->assertEquals($cnpj, $infos["cnpj"]);
        $this->assertEquals($nascimento, $infos["nascimento"]);
        $this->assertEquals($telefone, $infos["telefone"]);
        $this->assertEquals($endereco, $infos["endereco"]);
        $this->assertEquals($cep, $infos["cep"]);
        $this->assertEquals($cartao, $infos["cartao"]);
        $this->assertEquals($titular, $infos["titular"]);
        $this->assertEquals($codigo, $infos["codigo"]);
        $this->assertEquals($vencimento, $infos["vencimento"]);
        $this->assertEquals("checked", $infos["pessoaFisica"]);
        $this->assertEquals("", $infos["pessoaJuridica"]);

        // Verifica se o ID foi atribuído corretamente
        $this->assertNotNull($infos["id"]);
    }
}


?>