<?php 
require_once "UFE.php";
class Luta {
    //atributos
    private $desafiante;
    private $desafiado;
    private $rounds;
    private $aprovada;

    //metodos
    public function marcarluta($l1, $l2){
        if($l1->getcategoria() === $l2->getcategoria() && ($l1 != $l2)){
            $this->aprovada = true;
            $this->desafiado = $l1;
            $this->desafiante = $l2;
        }else {
            $this->aprovada = false;
            $this->desafiado = null;
            $this->desafiante = null;
            echo "Essa luta não pode acontecer";
        }
    }
    public function luta(){
        if ($this->aprovada){
            $this->desafiado->apresentar() ;
            $this->desafiante->apresentar();
            $vencedor = rand(0, 2);
            switch($vencedor){
                case 0: //empate
                    echo "<br> "." EMPATE ! " . "<br>";
                    $this->desafiado->empatarLuta();
                    $this->desafiante->empatarluta();
                    break;
                case 1: //desafiado vence
                    echo  "<br>" . $this->desafiado->getnome(). " vencedor " ."<br>";
                    $this->desafiado->ganharLuta();
                    $this->desafiante->perderLuta();
                    break;
               case 2: // desafiante perdedor
                    echo  "<br>" . $this->desafiante->getnome() . " vencedor "  ."<br>";
                    $this->desafiado->perderLuta();
                    $this->desafiante->ganharLuta();
                    break;
            }
        }
    }

    //Metodos especiais 
    function getdesafiante(){
        return $this->desafiante;
    }
    function getdesafiado(){
        return $this->desafiado;
    }
    function getrounds(){
        return $this->rounds;
    }
    function getaprovada(){
        return $this->aprovada;
    }

    function setdesafiante($desafiante){
        $this->desafiante = $desafiante;
    }
    function setdesafiado($desafiado){
        $this->desafiado = $desafiado;
    }
    function setrounds($rounds){
        $this->rounds = $rounds;
    }
    function setaprovada($aprovada){
        $this->aprovada = $aprovada;
    }
}
?>