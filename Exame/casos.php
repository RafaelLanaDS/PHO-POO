<?php
require_once 'carro.php';
require_once 'moto.php';
require_once 'aluguel.php';

// Caso 1
$carro = new Carro("SUV Luxo", 150, 5, "Gasolina");
$moto  = new Moto("Sport 250", 80, 15, 20);

$aluguel1 = new Aluguel("João Silva", "123.456.789-00", 10);
$aluguel1->adicionarVeiculo($carro);
$aluguel1->adicionarVeiculo($moto);

$aluguel1->exibirDados();

echo "<hr>";

// Caso 2
$moto2 = new Moto("City 125", 50, 10, 10);

$aluguel2 = new Aluguel("Maria Oliveira", "987.654.321-00", 30);
$aluguel2->adicionarVeiculo($moto2);

$aluguel2->exibirDados();