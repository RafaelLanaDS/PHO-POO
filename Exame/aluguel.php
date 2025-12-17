<?php
require_once 'veiculo.php';
class Aluguel {
    private $cliente;
    private $cpf;
    private $dias;
    private $veiculos = [];

    public function __construct($cliente, $cpf, $dias) {
        $this->cliente = $cliente;
        $this->cpf = $cpf;
        $this->dias = $dias;
    }

    // Adiciona veículo ao aluguel
    public function adicionarVeiculo($veiculo) {
        $this->veiculos[] = $veiculo;
    }

    // Total sem desconto
    public function totalSemDesconto() {
        $total = 0;
        foreach ($this->veiculos as $v) {
            $total += $v->getPrecoDia() * $this->dias;
        }
        return $total;
    }

    // Desconto por tempo
    private function descontoTempo() {
        if ($this->dias >= 30) return 0.10;
        if ($this->dias >= 14) return 0.07;
        if ($this->dias >= 7)  return 0.05;
        return 0;
    }

    // Total com desconto de tempo
    public function totalComDesconto() {
        $total = $this->totalSemDesconto();
        return $total - ($total * $this->descontoTempo());
    }

    // Pagamento à vista
    public function valorAvista() {
        return $this->totalComDesconto() * 0.95;
    }

    // Parcelamento
    public function parcelamento($parcelas = 10) {
        return $this->totalComDesconto() / $parcelas;
    }

    // Mostra tudo
    public function exibirDados() {
        echo "Cliente: {$this->cliente}";
        echo "CPF: {$this->cpf}";
        echo "Dias: {$this->dias}";

        echo "Veículos: ";
        foreach ($this->veiculos as $v) {
            echo "{$v->detalhes()}";
        }

        echo "Total sem desconto: R$ " . number_format($this->totalSemDesconto(), 2, ',', '.');
        echo "Total com desconto: R$ " . number_format($this->totalComDesconto(), 2, ',', '.');
        echo "À vista: R$ " . number_format($this->valorAvista(), 2, ',', '.');
        echo "10x de: R$ " . number_format($this->parcelamento(), 2, ',', '.');
    }
}
