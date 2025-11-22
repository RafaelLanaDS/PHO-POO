<?php 
require_once "controlador.php";
/*
inclui o arquivo da interface controlador, garantindo que a classe 
possa implementar todos os metodos necessários
*/
class controleRemoto implements Controlador{
    //atribustos privados
    private $volume; //armazena o volume atual
    private $ligado; //definese o crontrole esta ligado
    private $tocando; //define se esta tocando
    
    //metodo construtor chamo automaticamente o new objeto
    public function __construct(){
        $this->volume = 50; // volume padrao quando liga o controle
        $this->ligado = false; //começa desligado
        $this->tocando = true; // nada tocando no inicio
    }

    //GETTERS metodos de leitura
    private function getvolume(){
        return $this->volume;
    }
    private function getligado(){
        return $this->ligado;
    }
    private function gettocando(){
        return $this->tocando;
    }
    

    //SETTERS metodos de escrita
    private function setvolume($volume){
        $this->volume = $volume;
    }
    private function setligado($ligado){
        $this->ligado = $ligado;
    }
    private function settocando($tocando){
        $this->tocando = $tocando;
    }

    //METODOS OBRIGATORIOS (interface do controlador)

    public function ligar(){ // liga o controle
        $this->setligado(true);
    } 

    public function desligar(){ // desliga o controle
        $this->setligado(false);
    }

    public function abrirMenu(){ // exibe um "MENU" no console com informaçoes do controle
        echo "<p>". "--Menu Aberto--" . "</p>";
        echo "</br>" . "Esta lidado?: " . ($this->getligado()?"SIM":"NÃO");
        echo "</br>" . "Esta tocando?: " . ($this->gettocando()? "SIM":"NÃO");
        echo "</br>" . "Volume: " . $this->getvolume();
        for($i=0;  $i <= $this->getvolume(); $i += 10){ //mostra a barra de volume a cada 10 unidades 
            echo "|";
        }
        echo "</br>" ;
    }

    public function fecharMenu(){ // fechar o menu
        echo "</br>" . "fechando menu";
    } 

    public function maisVolume(){ // Aumenta o volume, se somente se estiver ligado
        if($this->getligado() ==  true){
            $this->setvolume($this->getvolume() + 5);
        }
    } 

    public function menosVolume(){ // Diminui o volume somente se estiver ligado
        if($this->getligado() ==  true){
            $this->setvolume($this->getvolume() - 5);
        }
    } 

    public function ligarMudo(){ //ativa o modo mudo(colaca volume = 0)
        if($this->getligado() && $this->getvolume() > 0){
            $this->setvolume(0);
        }
            
    } 
    public function desligarMudo(){ // começa a tocar, se estiver ligado e não estiver tocando
        if($this->getligado() && ! $this->getvolume()){ // Esse ! significa negação, ou seja: “não está tocando” com && ! -> O controle está ligado E NÃO está tocando?
            $this->setvolume(50);
        }
    } 
    public function play(){ // começa a tocar, se estiver ligado e não estiver tocando 
        if($this->getligado() && ! ($this->gettocando())){
            $this->settocando(true);
        }
    } 
    public function pause(){ // Pausa, se estiver ligado e estiver tocando
        if($this->getligado() && ! ($this->gettocando())){
            $this->settocando(false);
        }
    }
}    
?>