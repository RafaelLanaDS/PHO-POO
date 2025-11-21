<?php 
require_once "controlador.php";
class controleRemoto implements Controlador{
    //atribustos
    private $volume;
    private $ligado;
    private $tocando;
    
    //metodo construtor
    public function __construct(){
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }

    private function getvolume(){
        return $this->volume;
    }
    private function getligado(){
        return $this->ligado;
    }
    private function gettocando(){
        return $this->tocando;
    }

    private function setvolume($volume){
        $this->volume = $volume;
    }
    private function setligado($ligado){
        $this->ligado = $ligado;
    }
    private function settocando($tocando){
        $this->tocando = $tocando;
    }

    function ligar(){
        $this->setligado(true);
    } 
    function desligar(){
        $this->setligado(false);
    } 
    public function abrirMenu(){
        echo "</br>" . "Esta lidado?: " . ($this->getligado()?"SIM":"NÃO");
        echo "</br>" . "Esta tocando?: " . ($this->gettocando()? "SIM":"NÃO");
        echo "</br>" . "Volume: " . $this->getvolume();
        for($i=0;  $i <= $this->getvolume(); $i += 10){
            echo "|";
        }
        echo "</br>" ;
    } 
    public function fecharMenu(){
        echo "</br>" . "fechando menu";
    } 
    public function maisVolume(){
        if($this->getligado() ==  true){
            $this->setvolume($this->getvolume() + 5);
        }
    } 
    public function menosVolume(){
        if($this->getligado() ==  true){
            $this->setvolume($this->getvolume() - 5);
        }
    } 
    public function ligarMudo(){
        if($this->getligado() && $this->getligado() > 0){
            $this->setvolume(0);
        }
            
    } 
    public function desligarMudo(){
        if($this->getligado() && $this->getligado() == 0){
            $this->setvolume(50);
        }
    } 
    public function play(){
        if($this->getligado() && ! ($this->gettocando())){
            $this->gettocando(true);
        }
    } 
    public function pause(){
        if($this->getligado() && ! ($this->gettocando())){
            $this->gettocando(false);
        }
    }
}    
?>