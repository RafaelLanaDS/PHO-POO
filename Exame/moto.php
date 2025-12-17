<?php
require_once 'veiculo.php';
class Moto extends Veiculo {
    private $tanque;
    private $bagageiro;

    public function __construct($modelo, $precoDia, $tanque, $bagageiro) {
        parent::__construct($modelo, $precoDia);
        $this->tanque = $tanque;
        $this->bagageiro = $bagageiro;
    }

    public function detalhes() {
        return "Moto: $this->modelo, 
                Tanque: {$this->tanque}L, 
                Bagageiro: {$this->bagageiro}L, 
                R$ {$this->precoDia}/dia";
    }
}