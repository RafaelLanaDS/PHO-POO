<?php

declare(strict_types=1);

// A ordem de carregamento será feita pelo index.php
// require_once 'Pessoa.php';

/**
 * CLASSE: Cliente
 * Herda de Pessoa e adiciona informações específicas do cliente.
 *
 * --- NOVIDADE ---
 * Adicionado controle de bloqueio para compras 'fiado'.
 */
class Cliente extends Pessoa
{
    // Novo atributo para controlar o bloqueio
    private bool $bloqueadoPorFiado = false;

    public function __construct(
        string $nome,
        private string $cpf,
        private string $telefone
    ) {
        // Chama o construtor da classe PAI (Pessoa)
        parent::__construct($nome);
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    // --- NOVOS MÉTODOS ---
    public function bloquearCliente(): void
    {
        $this->bloqueadoPorFiado = true;
    }

    public function desbloquearCliente(): void
    {
        $this->bloqueadoPorFiado = false;
    }

    public function estaBloqueado(): bool
    {
        return $this->bloqueadoPorFiado;
    }
}