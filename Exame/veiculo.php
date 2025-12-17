<?php

// Classe base
abstract class Veiculo {
    protected $modelo;
    protected $precoDia;

    public function __construct($modelo, $precoDia) {
        $this->modelo = $modelo;
        $this->precoDia = $precoDia;
    }

    // Método que será sobrescrito polimorfismo
    abstract public function detalhes();

    public function getPrecoDia() {
        return $this->precoDia;
    }
}