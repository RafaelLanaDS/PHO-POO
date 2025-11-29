<?php 
require_once "pessoa.php";
/*final*/ class aluno extends pessoa {
    private $matricula;
    private $curso;

    public /*final*/ function pagarMensalidade(){ // nao pode ser sobreposto esse metodo  por conta do FINAL logo bolsista nao pode pegar o metodo
        echo " Pagando mensalidade do aluno " . $this->nome;
    }
    
    function getmatricula(){
        return $this->matricula;
    }
    function getcurso(){
        return $this->curso;
    }

    function setmatricula($matricula){
        $this->matricula = $matricula;
    }
    function setcurso($curso){
        $this->curso = $curso;
    }

}
?>