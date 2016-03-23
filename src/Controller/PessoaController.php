<?php

namespace ORGANIZACAO\src\Controller;

use ORGANIZACAO\src\model\EntityPessoa;
use ORGANIZACAO\src\model\PDOConect;
use GUMP;

class PessoaController
{
    private $instancePessoa;

    public function __construct()
    {
        $con = new PDOConect();
        $this->instancePessoa = new EntityPessoa($con->conexao());
    }

    public function selPessoa()
    {
        return $this->instancePessoa->selectAll();
    }

    public function insPessoa()
    {
        $dadosForm = ['nome'=>'Romualdo','email'=>'teste@teste.geral'];

        $regras = [
            'nome' => 'required|alpha_numeric',
            'email' => 'required|max_len,150|min_len,10'
        ];

        $is_valid = GUMP::is_valid($dadosForm, $regras);

        if($is_valid === true) {
            //$this->instancePessoa->insert($dadosForm);
            return $dadosForm;
        } else {
            return print_r($is_valid);
        }
    }

}
