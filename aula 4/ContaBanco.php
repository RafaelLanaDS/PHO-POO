<?php 
class ContaBanco{
    //atributos
    public string $NumConta;
    protected string $Tipo;
    private string $Dono;
    private float $Saldo;
    private bool $Status;

    //Metodo construtor
    public function __construct(){
        $this->setSaldo(0.0);
        $this->setStatus(false);
        echo "Conta criada com sucesso !!";
    }

    //METODOS
    public function AbrirConta($t){
        $this->setTipo($t);
        $this->setStatus(true);
        if($t == "CC"){
            $this->setSaldo(50);
        }elseif($t == "CP"){
            $this->setSaldo(150);
        }
    }
    public function FecharConta(){
        if($this->getSaldo() > 0){
            echo "Ainda ha dinheiro na conta, saque para fechala";
        }elseif($this->getSaldo() < 0){
            echo "Voce tem debitos nessa conta, impossivel fechar";
        }else{
            $this->setStatus(false);
        }
    }
    public function Depositar($v){
        if($this->getStatus() == true){
            $this->setSaldo($this->getSaldo() +  $v);
        }else{
            echo "conat fechda não consigo depositar";
        }
    }

    public function sacar($v){
        if($this->getStatus() == true){
            if($this->getSaldo()){
                if($this->getSaldo() >= $v){
                    $this->setSaldo($this->getSaldo() - $v);
                }
            }else{
                echo "saldo insuficiente para saldo";
            }
        } else{
            echo "Não posso sacar de um conta fechada";
        }
    }

    public function PagarMensal(){
        if($this->getTipo() == "CC"){
            $v = 12;
        } elseif($this->getTipo() == "CP"){
            $v = 20;
        }
        if($this->getSaldo()){
            $this->setSaldo($this->getSaldo() -  $v);
        }else{
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