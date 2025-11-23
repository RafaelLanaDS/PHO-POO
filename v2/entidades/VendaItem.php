<?php

declare(strict_types=1);

// require_once 'Produto.php';

/**
 * CLASSE: VendaItem
 * Classe auxiliar que representa um produto DENTRO de uma venda (Produto + Quantidade).
 * Isso desacopla a Venda da lógica de cálculo do subtotal.
 */
class VendaItem
{
    public function __construct(
        private Produto $produto,
        private float $quantidade
    ) {
    }

    public function getProduto(): Produto
    {
        return $this->produto;
    }

    public function getQuantidade(): float
    {
        return $this->quantidade;
    }

    /**
     * Calcula o subtotal para este item.
     */
    public function getSubtotal(): float
    {
        return $this->produto->getPreco() * $this->quantidade;
    }
}