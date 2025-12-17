<?php
require_once 'veiculo.php';
class Carro extends Veiculo {
    private $assentos;
    private $combustivel;

    public function __construct($modelo, $precoDia, $assentos, $combustivel) {
        parent::__construct($modelo, $precoDia);
        $this->assentos = $assentos;
        $this->combustivel = $combustivel;
    }

    public function detalhes() {
        return "Carro: $this->modelo, 
                Assentos: $this->assentos, 
                Combustível: $this->combustivel, 
                R$ {$this->precoDia}/dia";
    }
}