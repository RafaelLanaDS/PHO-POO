<?php

declare(strict_types=1);

/**
 * Enum para definir os tipos de pagamento da venda.
 */
enum TipoPagamento: string
{
    case A_VISTA = 'a_vista'; // Pago na hora
    case FIADO = 'fiado';     // Fiado para 30 dias
}