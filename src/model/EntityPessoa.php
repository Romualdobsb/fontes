<?php

namespace ORGANIZACAO\src\model;

use DI\Model\DbPessoa;
use DI\Model\Conexao;

class EntityPessoa
{
    private $conexao;
    private $tb;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM pessoa";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            $dados[] = $row;
        }

        return empty($dados)?[]:$dados;
    }

    public function insert(array $dados)
    {
        if (!empty($dados['nome']) && !empty($dados['email'])):

            try{
                $sql = "INSERT INTO pessoa (nome,email) VALUES (?, ?)";
                $stm = $this->conexao->prepare($sql);
                $stm->bindValue(1, $dados['nome']);
                $stm->bindValue(2, $dados['email']);
                $stm->execute();

                echo "<script>alert('Registro inserido com sucesso')</script>";

            }catch(PDOException $erro){
                echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
            }

        endif;
    }

}