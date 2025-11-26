<?php
require_once "Pessoa.php";
class Professor extends Pessoa{
    // Atributos
    private $especialidade;
    private $salario;

    // -------- GETTERS --------
    public function getEspecialidade() {
        return $this->especialidade;
    }

    public function getSalario() {
        return $this->salario;
    }

    // -------- SETTERS --------
    public function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    // -------- MÉTODO ESPECIAL: AUMENTAR SALÁRIO --------
    public function receberAumento($valor) {
        $this->salario += $valor;
    }
}

?>
