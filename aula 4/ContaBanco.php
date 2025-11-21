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