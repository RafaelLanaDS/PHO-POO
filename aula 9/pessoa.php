<?php 
 class Pessoa{
    private string $nome;
    private int $idade;
    private string $sexo;

    public function __construct($n, $i, $s){
        $this->nome = $n;
        $this->idade = $i;
        $this->sexo = $s;
    }

    function getnome(){
        return $this->nome;
    }
    function getidade(){
        return $this->idade;
    }
    function getsexo(){
        return $this->sexo;
    }

    function setnome($n){
        $this->nome = $n;
    }
    function setidade($i){
        $this->idade = $i;
    }
    function setsexo($s){
        $this->sexo = $s;
    }


    public function fazerAniversario(){
        $this->setidade($this->getidade() + 1);
    }
 }
?>