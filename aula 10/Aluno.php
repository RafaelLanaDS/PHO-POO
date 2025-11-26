<?php
require_once "pessoa.php";
class Aluno extends Pessoa{
    // Atributos
    private $matricula;
    private $curso;

    //metodo
    public function cancelarMatricula(){
        echo "A matricula sera cancelada";
    }
    
    // -------- GETTERS --------
    public function getMatricula() {
        return $this->matricula;
    }

    public function getCurso() {
        return $this->curso;
    }

    // -------- SETTERS --------
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }
}

?>
