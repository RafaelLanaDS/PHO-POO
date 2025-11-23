<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Mercearia - Teste</title>
    <style>
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; 
            line-height: 1.6; 
            background-color: #e9eef3; 
            color: #333; 
            padding: 20px;

            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            width: 80%;
            max-width: 900px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        h1, h2, h3 { 
            color: #2c3e50; 
        }

        h1 { 
            border-bottom: 2px solid #3498db; 
            padding-bottom: 10px;
        }

        h2 { 
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            margin-top: 30px;
        }

        ul { 
            background-color: #fafafa; 
            border: 1px solid #ddd; 
            padding: 15px; 
            border-radius: 8px;
            list-style: none;
        }

        li { 
            margin-bottom: 8px;
        }

        p { 
            padding: 8px; 
        }
    </style>
</head>
<body>
<div class="container">
    <?php

   
    // Enums (não dependem de nada)
    require_once 'entidades/UnidadeMedida.php';
    require_once 'entidades/TipoPagamento.php';

    // Classe base
    require_once 'entidades/Pessoa.php';

    // Classes que herdam de Pessoa
    require_once 'entidades/Cliente.php';
    
    // Classes de entidade
    require_once 'entidades/Produto.php';

    // Classes que dependem de outras
    require_once 'entidades/VendaItem.php'; // Depende de Produto

    // Classes principais de orquestração
    // Venda depende de Atendente, Cliente, VendaItem, TipoPagamento
    // Atendente depende de Pessoa, Cliente, Venda, TipoPagamento
    // Colocamos Venda antes de Atendente para garantir que Atendente possa criar uma 'new Venda'
    require_once 'entidades/Venda.php';
    require_once 'entidades/Atendente.php';


    echo "<h1>Sistema de Vendas da Mercearia</h1>";

    // 1. Cadastrar Produtos
    $produto1 = new Produto("Arroz 5kg", 25.50, UnidadeMedida::UNIDADE);
    $produto2 = new Produto("Feijão 1kg", 8.99, UnidadeMedida::UNIDADE);
    $produto3 = new Produto("Maçã Gala", 12.90, UnidadeMedida::KILO);

    echo "<h3>Produtos Cadastrados:</h3>";
    echo "<li>{$produto1->getNome()} - R$ {$produto1->getPreco()} ({$produto1->getUnidade()->value})</li>";
    echo "<li>{$produto2->getNome()} - R$ {$produto2->getPreco()} ({$produto1->getUnidade()->value})</li>";
    echo "<li>{$produto3->getNome()} - R$ {$produto3->getPreco()} ({$produto3->getUnidade()->value})</li>";


    // 2. Cadastrar Cliente
    $cliente1 = new Cliente("João da Silva", "123.456.789-00", "11987654321");

    // 3. Cadastrar Atendente
    $atendente1 = new Atendente("Maria Oliveira", "maria@mercearia.com", "senha123");

    echo "<h3>Funcionários e Clientes:</h3>";
    echo "<li>Atendente: {$atendente1->getNome()}</li>";
    echo "<li>Cliente: {$cliente1->getNome()} (CPF: {$cliente1->getCpf()})</li>";


    // 4. Simular um Login (opcional)
    if ($atendente1->login("maria@mercearia.com", "senha123")) {
        echo "<p style='color: green;'>Atendente '{$atendente1->getNome()}' logado com sucesso.</p>";
    }

    // 5. Montar o carrinho de compras (Itens da Venda)
    $itensDaVenda = [
        new VendaItem($produto1, 2.0), // 2 pacotes de Arroz
        new VendaItem($produto2, 1.0), // 1 pacote de Feijão
        new VendaItem($produto3, 1.5)  // 1.5 kg de Maçã
    ];

    // 6. Atendente realiza a venda (Exemplo 1: Fiado)
    // Esta venda irá BLOQUEAR o cliente
    echo "<h2>--- Venda 1 (Fiado) ---</h2>";
    try {
        $venda1 = $atendente1->realizarVenda($cliente1, $itensDaVenda, TipoPagamento::FIADO);

        echo "<ul>";
        echo "<li><b>Atendente:</b> {$venda1->getAtendente()->getNome()}</li>";
        echo "<li><b>Cliente:</b> {$venda1->getCliente()->getNome()}</li>";
        echo "<li><b>Data:</b> {$venda1->getDataVenda()->format('d/m/Y H:i')}</li>";
        echo "<li><b>Tipo Pagamento:</b> {$venda1->getTipoPagamento()->value}</li>";
        echo "<li><b>Itens:</b></li>";
        echo "<ul>";
        foreach ($venda1->getItens() as $item) {
            echo "<li>{$item->getProduto()->getNome()} ({$item->getQuantidade()} {$item->getProduto()->getUnidade()->value}) - Subtotal: R$ " . number_format($item->getSubtotal(), 2, ',', '.') . "</li>";
        }
        echo "</ul>";
        echo "<li><b>TOTAL DA VENDA: R$ " . number_format($venda1->getTotal(), 2, ',', '.') . "</b></li>";
        if ($venda1->getDataVencimento()) {
            echo "<li style='color: red;'><b>Vencimento: {$venda1->getDataVencimento()->format('d/m/Y')}</b></li>";
        }
        echo "</ul>";
        echo "<p style='color: red; font-weight: bold;'>AVISO: Cliente '{$cliente1->getNome()}' foi bloqueado devido a esta compra 'fiado'.</p>";

    } catch (Exception $e) {
        echo "<p style='color: red; font-weight: bold;'>ERRO: {$e->getMessage()}</p>";
    }


    // 7. TENTATIVA de realizar outra venda (Exemplo 2: À Vista)
    // Esta tentativa deve FALHAR pois o cliente está bloqueado.
    echo "<h2>--- Tentativa de Venda 2 (À Vista, Cliente Bloqueado) ---</h2>";
    $itensDaVenda2 = [
        new VendaItem($produto2, 1.0) // 1 pacote de Feijão
    ];

    // Usamos try...catch para capturar a exceção que esperamos
    try {
        $venda2 = $atendente1->realizarVenda($cliente1, $itensDaVenda2, TipoPagamento::A_VISTA);
        // Se o código chegar aqui, nossa lógica de bloqueio falhou.
        echo "<p style='color: orange;'>ERRO NA LÓGICA: A venda foi realizada, mas o cliente deveria estar bloqueado.</p>";
    } catch (Exception $e) {
        // Este é o resultado esperado
        echo "<p style='color: red; font-weight: bold;'>VENDA RECUSADA: {$e->getMessage()}</p>";
    }

    // 8. Registrando o Pagamento da dívida
    echo "<h2>--- Registrando Pagamento da Dívida ---</h2>";
    $atendente1->registrarPagamentoFiado($cliente1);


    // 9. TENTATIVA de realizar a Venda 2 novamente (Após Pagamento)
    // Agora deve funcionar
    echo "<h2>--- Tentativa de Venda 3 (À Vista, Após Pagamento) ---</h2>";
    try {
        $venda3 = $atendente1->realizarVenda($cliente1, $itensDaVenda2, TipoPagamento::A_VISTA);
        
        // Se chegar aqui, funcionou!
        echo "<p style='color: green; font-weight: bold;'>Venda realizada com sucesso!</p>";
        echo "<ul>";
        echo "<li><b>Atendente:</b> {$venda3->getAtendente()->getNome()}</li>";
        echo "<li><b>Cliente:</b> {$venda3->getCliente()->getNome()}</li>";
        echo "<li><b>Data:</b> {$venda3->getDataVenda()->format('d/m/Y H:i')}</li>";
        echo "<li><b>Tipo Pagamento:</b> {$venda3->getTipoPagamento()->value}</li>";
        echo "<li><b>Total: R$ " . number_format($venda3->getTotal(), 2, ',', '.') . "</b></li>";
        echo "<li style='color: green;'><b>Pagamento recebido!</b></li>";
        echo "</ul>";

    } catch (Exception $e) {
        echo "<p style='color: red; font-weight: bold;'>ERRO INESPERADO: {$e->getMessage()}</p>";
    }

    ?>
</div>
</body>
</html>