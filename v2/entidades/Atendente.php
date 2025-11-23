<?php

declare(strict_types=1);

// require_once 'Pessoa.php';
// require_once 'Cliente.php';
// require_once 'Venda.php';
// require_once 'TipoPagamento.php';

/**
 * CLASSE: Atendente
 * Herda de Pessoa e adiciona informações de login e a capacidade de realizar vendas.
 *
 * --- NOVIDADE ---
 * - 'realizarVenda' agora verifica se o cliente está bloqueado.
 * - Adicionado 'registrarPagamentoFiado' para desbloquear clientes.
 */
class Atendente extends Pessoa
{
    public function __construct(
        string $nome,
        private string $email,
        private string $senha
    ) {
        parent::__construct($nome);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Simula um login. Em um sistema real, a senha estaria criptografada.
     */
    public function login(string $email, string $senha): bool
    {
        return $this->email === $email && $this->senha === $senha;
    }

    /**
     * Método principal que cria uma nova Venda.
     * Note que ele recebe os objetos Cliente e os Itens da Venda.
     *
     * --- MODIFICADO ---
     * Lança uma Exceção se o cliente estiver bloqueado.
     *
     * @param Cliente $cliente O cliente da venda.
     * @param VendaItem[] $itens Um array de objetos VendaItem.
     * @param TipoPagamento $tipoPagamento O tipo de pagamento.
     * @return Venda O objeto de venda criado.
     * @throws Exception Se o cliente estiver bloqueado.
     */
    public function realizarVenda(Cliente $cliente, array $itens, TipoPagamento $tipoPagamento): Venda
    {
        // --- NOVA REGRA DE NEGÓCIO ---
        if ($cliente->estaBloqueado()) {
            throw new Exception("Cliente '{$cliente->getNome()}' está bloqueado para novas compras pois possui débito 'fiado' pendente.");
        }
        
        // O 'this' aqui se refere à própria instância do Atendente
        return new Venda($this, $cliente, $itens, $tipoPagamento);
    }

    /**
     * --- NOVO MÉTODO ---
     * Simula o recebimento do pagamento de todas as dívidas 'fiado' do cliente.
     * Em um sistema real, isso estaria ligado a vendas específicas.
     */
    public function registrarPagamentoFiado(Cliente $cliente): void
    {
        echo "<p style='color: blue;'>Registrando pagamento total 'fiado' para: {$cliente->getNome()}...</p>";
        $cliente->desbloquearCliente();
        echo "<p style='color: green; font-weight: bold;'>Pagamento recebido! Cliente '{$cliente->getNome()}' está DESBLOQUEADO.</p>";
    }
}