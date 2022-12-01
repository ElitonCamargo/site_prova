<?php
require_once('DataBase.php');

class Tutor{
    public $Id;
    public $cpf;
    public $nome;
    public $telefone;
    public $email;
    public $data_nasc;
    public $cep;
    public $uf;
    public $cidade;
    public $bairro;
    public $logradouro;
    public $numero;

    public function consultarTodos($filtro = ""){ 
        $cmdSql = "CALL tutor_consultar(:filtro);";
        $cx = (new DataBase())->connection();
        $cx = $cx->prepare($cmdSql);
        if($cx->execute([':filtro' => $filtro])){
            if($cx->rowCount()){
                return $cx->fetchAll(PDO::FETCH_CLASS,__CLASS__);
            }
        }
        return false;
    }

    public function cadastrar(){
        $cmdSql = "CALL tutor_cadastrar(:cpf, :nome, :telefone, :email, :data_nasc, :cep, :uf, :cidade, :bairro, :logradouro, :numero);";
        $cx = (new DataBase())->connection();
        $cx = $cx->prepare($cmdSql);
        $dados = [
            ':cpf' => $this->cpf,
            ':nome' => $this->nome,
            ':telefone' => $this->telefone,
            ':email' => $this->email,
            ':data_nasc' => $this->data_nasc,
            ':cep' => $this->cep,
            ':uf' => $this->uf,
            ':cidade' => $this->cidade,
            ':bairro' => $this->bairro,
            ':logradouro' => $this->logradouro,
            ':numero' => $this->numero,
        ];
        return $cx->execute($dados);
    }

}

// Id, cpf, nome, telefone, email, data_nasc, cep, uf, cidade, bairro, logradouro, numero
