<?php

declare(strict_types=1);

/**
 * CLASSE ABSTRATA: Pessoa
 * Define a base para Cliente e Atendente, reutilizando a propriedade 'nome'.
 * Isso é um exemplo de HERANÇA.
 */
abstract class Pessoa
{
    // Propriedades protegidas são acessíveis pela própria classe e por classes filhas.
    public function __construct(protected string $nome)
    {
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}