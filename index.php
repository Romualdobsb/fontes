<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

use \ORGANIZACAO\src\model\PDOConect;
use \ORGANIZACAO\src\Controller\PessoaController;

function __autoload($nomeClasse)
{
    require "./vendor/autoload.php";

    $classe = '/' . str_replace('\\', '/', $nomeClasse) . '.php';
    require_once($classe);
}


$pessoa = new PessoaController();
$dadosPessoa = $pessoa->selPessoa();

//$pessoa->insPessoa();

require_once "./View/pessoa.phtml";

