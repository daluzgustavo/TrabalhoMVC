<?php

namespace Model\VO;

final class AlunosVO extends VO {

    private $nome;
    private $dataNasc;
    private $curso;
    private $matricula;
    private $cpf;

    public function __construct($id = 0, $nome = "", $dataNasc = null, $curso = "", $matricula = "", $cpf = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->dataNasc = $dataNasc;
        $this->curso= $curso;
        $this->matricula = $matricula;
        $this->cpf = $cpf;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function getDataNasc(){
        return $this->dataNasc;
    }

    public function setDataNasc($dataNasc){
        $this->dataNasc = $dataNasc;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function setCurso($curso){
        $this->curso = $curso;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
}