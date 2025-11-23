<?php

declare(strict_types=1);

// require_once 'UnidadeMedida.php';

/**
 * CLASSE: Produto
 * Representa um item da mercearia.
 * As propriedades são privadas (ENCAPSULAMENTO) e acessadas por getters.
 */
class Produto
{
    public function __construct(
        private string $nome,
        private float $preco,
        private UnidadeMedida $unidade
    ) {
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getUnidade(): UnidadeMedida
    {
        return $this->unidade;
    }
}