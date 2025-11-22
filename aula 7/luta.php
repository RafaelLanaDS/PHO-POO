<?php 
require_once "UFE.php"; // importa arquivo com lutadores criados 
class Luta {
    //atributos = referencia para obejtos lutador 
    private $desafiante;
    private $desafiado;
    private $rounds;
    private $aprovada;

    //marca uma luta entre dois lutadores 
    public function marcarluta($l1, $l2){
        // so podem lutar se forem da mesma categoria e não forem o mesmo lutador
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
    public function luta(){ // realiza a luta se estiver aprovada 
        if ($this->aprovada){
            //apresenta os lutadores 
            $this->desafiado->apresentar() ;
            $this->desafiante->apresentar();
            //sorteio do resultado: 0 = empate, 1 = desafiado vence, 2 = desafiante vence
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