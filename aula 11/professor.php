<?php 
require_once "pessoa.php";
class professor extends pessoa{
    private $especialidade;
    private $salario;
    
    public function receberAumento($valor){
        $this->setsalario($this->getsalario() + $valor);
    }

    function getespecialidade(){
        return $this->especialidade;
    }
    function getsalario(){
        return $this->salario;
    }
    function setespecialidade($especialidade){
        $this->especialidade = $especialidade;
    }
    function setsalario($salario){
        $this->salario = $salario;
    }

}
?>