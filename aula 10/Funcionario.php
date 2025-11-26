<?php
require_once "Pessoa.php";
class Funcionario extends Pessoa {
    // Atributos
    private $setor;
    private $trabalhando;


    // -------- GETTERS --------
    public function getSetor() {
        return $this->setor;
    }

    public function getTrabalhando() {
        return $this->trabalhando;
    }

    // -------- SETTERS --------
    public function setSetor($setor) {
        $this->setor = $setor;
    }

    public function setTrabalhando($trabalhando) {
        $this->trabalhando = $trabalhando;
    }

    // -------- MÉTODO ESPECIAL --------
    // Altera o estado de trabalho (de true para false e vice-versa)
    public function mudarTrabalho() {
        $this->trabalhando = !$this->trabalhando;
    }
}
?>
