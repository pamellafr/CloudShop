<?php

use PHPUnit\Framework\TestCase;
use App\Model\Entity\Client;
use App\DatabaseManager\Database;
use \WilliamCosta\DotEnv\Environment;

class ClientIntegrationTest extends TestCase
{
    public function testCadastrar()
    {

        //Carrega variáveis de ambiente
        Environment::load(__DIR__."/../../");

        // Preparação

        //Define as configurações do banco de dados
        Database::config(
            getenv("db_host"),
            getenv("db_name_test"),
            getenv("db_user"),
            getenv("db_pass"),
            getenv("db_port")
        );

        // Criação de uma instância da classe Client
        $client = new Client();
        $client->criar(
            "Aline", 
            "aline@aline.com", 
            "123senha", 
            "fisica", 
            "123", 
            "321", 
            "2002-05-06", 
            "99999-9999",
            "Rua 123", 
            "37704", 
            "265387941253", 
            "Aline Aline", 
            023, 
            "2023-12-22"
        );

        // Execução

        // Chama o método a ser testado
        $result = $client->cadastrar();

        // Verificação

        // Verifica se o método cadastrar() retorna true
        $this->assertTrue($result);

        // Verifica se o ID foi atribuído corretamente
        $this->assertNotNull($client->id);
    }

    public function testeEditar(){
        //Carrega variáveis de ambiente
        Environment::load(__DIR__."/../../");

        // Preparação

        //Define as configurações do banco de dados
        Database::config(
            getenv("db_host"),
            getenv("db_name_test"),
            getenv("db_user"),
            getenv("db_pass"),
            getenv("db_port")
        );

        $id = 1;

        $client = new Client();
        $client->id = $id;
        // Criação de um array com as informações do cliente
        $infos = array(
            "id" => 1,
            "email" => "marettialine1@gmail.com",
            "senha" => "123deoliveira41",
            "nome" => "Aline Stephanie Santos Gonçalves1",
            "pessoa" => "juridica",
            "cpf" => "022.129.076-131",
            "cnpj" => "0222221",
            "nascimento" => "2023-07-01",
            "telefone" => "359871213291",
            "endereco" => "Rua Paulo Turato 1041",
            "cep" => "377040431",
            "cartao" => "22221",
            "titular" => "Aline Stephanie Santos Gonçalves1",
            "codigo" => 314441,
            "vencimento" => "2023-07-01"
        );

        //Execução

        $result = $client->editar($infos);

        // Verificação

        // Verifica se o método editar() retorna true
        $this->assertTrue($result);

        // Verifica se o ID foi atribuído corretamente
        $this->assertNotNull($client->id);
    }

    public function testeDeletar(){
        //Carrega variáveis de ambiente
        Environment::load(__DIR__."/../../");

        // Preparação

        //Define as configurações do banco de dados
        Database::config(
            getenv("db_host"),
            getenv("db_name_test"),
            getenv("db_user"),
            getenv("db_pass"),
            getenv("db_port")
        );

        $client = new Client();
        $client->id = 1;

        //Execução

        $result = $client->delete();

        // Verificação

        // Verifica se o método editar() retorna true
        $this->assertTrue($result);
    }
}


?>