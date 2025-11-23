<?php

declare(strict_types=1);

// require_once 'Atendente.php';
// require_once 'Cliente.php';
// require_once 'VendaItem.php';
// require_once 'TipoPagamento.php';

/**
 * CLASSE: Venda
 * A classe principal que orquestra as informações.
 * Ela junta Atendente, Cliente e os Itens da Venda.
 *
 * --- NOVIDADE ---
 * O construtor agora chama o método 'bloquearCliente' se a venda for 'fiado'.
 */
class Venda
{
    private float $total;
    private DateTimeImmutable $dataVenda;
    private ?DateTimeImmutable $dataVencimento = null; // Pode ser nulo

    /**
     * @param Atendente $atendente
     * @param Cliente $cliente
     * @param VendaItem[] $itens
     * @param TipoPagamento $tipoPagamento
     */
    public function __construct(
        private Atendente $atendente,
        private Cliente $cliente,
        private array $itens,
        private TipoPagamento $tipoPagamento
    ) {
        $this->dataVenda = new DateTimeImmutable();
        $this->total = $this->calcularTotalVenda();
        $this->definirDatasPagamento(); // Define vencimento E bloqueia o cliente se for fiado
    }

    /**
     * Método privado para calcular o total da venda.
     * ABSTRAÇÃO: Quem usa a classe Venda não precisa saber COMO o total é calculado.
     */
    private function calcularTotalVenda(): float
    {
        $total = 0.0;
        foreach ($this->itens as $item) {
            $total += $item->getSubtotal();
        }
        return $total;
    }

    /**
     * Define a data de vencimento se o pagamento for 'fiado'.
     * --- MODIFICADO ---
     * Agora também bloqueia o cliente.
     */
    private function definirDatasPagamento(): void
    {
        if ($this->tipoPagamento === TipoPagamento::FIADO) {
            $this->dataVencimento = $this->dataVenda->modify('+30 days');
            // --- NOVA REGRA DE NEGÓCIO ---
            $this->cliente->bloquearCliente();
        }
    }

    // --- Getters Públicos (Encapsulamento) ---

    public function getAtendente(): Atendente
    {
        return $this->atendente;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    /**
     * @return VendaItem[]
     */
    public function getItens(): array
    {
        return $this->itens;
    }

    public function getTipoPagamento(): TipoPagamento
    {
        return $this->tipoPagamento;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getDataVenda(): DateTimeImmutable
    {
        return $this->dataVenda;
    }

    public function getDataVencimento(): ?DateTimeImmutable
    {
        return $this->dataVencimento;
    }
}