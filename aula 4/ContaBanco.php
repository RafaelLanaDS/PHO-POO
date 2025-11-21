<?php 
class ContaBanco{
    //atributos
    public string $NumConta;
    protected string $Tipo;
    private string $Dono;
    private float $Saldo;
    private bool $Status;

    // Método construtor: é executado automaticamente quando um objeto da classe é criado
public function __construct(){
    // Define o saldo inicial da conta como 0.0
    $this->setSaldo(0.0);

    // Define que a conta começa fechada
    $this->setStatus(false);

    // Apenas exibe uma mensagem informando que a conta foi criada
    echo "Conta criada com sucesso !!";
}


// =========================
// MÉTODO PARA ABRIR CONTA
// =========================
public function AbrirConta($t){
    // Define o tipo da conta (CC = conta corrente, CP = conta poupança)
    $this->setTipo($t);

    // Ao abrir uma conta, o status passa a ser TRUE (aberta)
    $this->setStatus(true);

    // Se a conta for do tipo CC, adiciona R$50 de saldo inicial
    if($t == "CC"){
        $this->setSaldo(50);

    // Se a conta for do tipo CP, adiciona R$150 de saldo inicial
    }elseif($t == "CP"){
        $this->setSaldo(150);
    }
}


// =========================
// MÉTODO PARA FECHAR CONTA
// =========================
public function FecharConta(){
    // Se ainda houver dinheiro na conta, não pode fechar
    if($this->getSaldo() > 0){
        echo "Ainda há dinheiro na conta, saque para fechá-la";

    // Se o saldo for negativo, existem dívidas, então não pode fechar
    }elseif($this->getSaldo() < 0){
        echo "Você tem débitos nessa conta, impossível fechar";

    // Se o saldo for exatamente 0, pode fechar a conta
    }else{
        $this->setStatus(false);
    }
}


// =========================
// MÉTODO PARA DEPOSITAR
// =========================
public function Depositar($v){
    // Só é possível depositar se a conta estiver aberta
    if($this->getStatus() == true){

        // Soma o valor depositado ao saldo atual
        $this->setSaldo($this->getSaldo() +  $v);

    }else{
        // Se a conta estiver fechada, não permite depósito
        echo "Conta fechada, não consigo depositar";
    }
}


// =========================
// MÉTODO PARA SACAR
// =========================
public function sacar($v){
    // Primeiro verifica se a conta está aberta
    if($this->getStatus() == true){

        // Verifica se existe saldo (mas aqui o if está incompleto, falta comparar)
        if($this->getSaldo()){

            // Confirma se o saldo é suficiente para sacar o valor desejado
            if($this->getSaldo() >= $v){

                // Realiza o saque (subtrai saldo)
                $this->setSaldo($this->getSaldo() - $v);
            }

        }else{
            // Se não houver saldo suficiente
            echo "Saldo insuficiente para saque";
        }

    } else{
        // Se a conta estiver fechada
        echo "Não posso sacar de uma conta fechada";
    }
}


// =========================
// MÉTODO PARA PAGAR MENSALIDADE
// =========================
public function PagarMensal(){
    // Define o valor da mensalidade dependendo do tipo da conta
    if($this->getTipo() == "CC"){
        $v = 12; // Conta corrente paga 12
    } elseif($this->getTipo() == "CP"){
        $v = 20; // Conta poupança paga 20
    }

    // Verifica se há saldo para pagar a mensalidade
    if($this->getSaldo()){

        // Subtrai o valor da mensalidade do saldo
        $this->setSaldo($this->getSaldo() -  $v);

    }else{
        // Se não tiver saldo, informa problema
        echo "Problemas com a conta";
    }
}

    //Metodos Getters e Setters
    public function getNumConta(){
        return $this->NumConta;
    }
    public function setNumConta($n){
        $this->NumConta = $n;
    }

    public function getTipo(){
        return $this->Tipo;
    }
    public function setTipo($t){
        $this->Tipo = $t;
    } 

    public function getDono(){
        return $this->Dono;
    }
    public function setDono($d){
        $this->Dono = $d;
    }

    public function getSaldo(){
        return $this->Saldo;
    }
    public function setSaldo($s){
        $this->Saldo = $s;
    }

    public function getStatus(){
        return $this->Status;
        
    }
    public function setStatus($status){
        $this->Status = $status;
    } 

}
?>