<?php 
 class Lutador{
    private string $nome;
    private string $nacionalidade;
    private int $idade;
    private float $altura;
    private float $peso;
    private string $categoria;
    private int $vitorias;
    private int $derrotas;
    private int $empates;

    //CONSTRUTOR
    function __construct($no, $na, $id, $al, $pe, $vi, $de, $em,){
        $this->nome = $no;
        $this->nacionalidade = $na;
        $this->idade = $id;
        $this->altura = $al;
        $this->setpeso($pe); // peso define automaticamente a categoria
        $this->vitorias = $vi;
        $this->derrotas = $de;
        $this->empates = $em;
    }
    //GETTERS acessores
    function getnome(){
        return $this->nome;
    }
    function getnacionalidade(){
        return $this->nacionalidade;
    }
    function getidade(){
        return $this->idade;
    }
    function getaltura(){
        return $this->altura;
    } 
    function getpeso(){
        return $this->peso;
    } 
    function getcategoria(){
        return $this->categoria;
    } 
    function getvitorias(){
        return $this->vitorias;
    } 
    function getderrotas(){
        return $this->derrotas;
    } 
    function getempates(){
        return $this->empates;
    }

    //SETTERS modificadores
    private function setnome($n){
        $this->nome = $n;
    }
    private function setnacionalidade($nac){
        $this->nacionalidade = $nac;
    }
    private function setidade($i){
        $this->idade = $i;
    }
    private function setaltura($a){
        $this->altura = $a;
    } 
    private function setpeso($p){ // define o peso e atualiza automaticamente a categoria
        $this->peso = $p;
        $this->setcategoria();
    } 
    private function setcategoria(){ // categoria definida com base no peso
        if($this->peso < 52.2){
            $this->categoria = "Ivalido";
        }elseif ($this->peso <= 70.3){
            $this->categoria = "leve";
        }elseif ($this->peso <= 83.9){
            $this->categoria = "Medio";
        }elseif ($this->peso <= 120.2){
            $this->categoria = "Pesado";
        }else {
            $this->categoria = "Invalido";
        }
    } 

    // atualizam resultados da carreira do lutador 
    private function setvitorias($v){
        $this->vitorias = $v;
    } 
    private function setderrotas($d){
        $this->derrotas = $d;
    } 
    private function setempates($e){
        $this->empates = $e;
    }  


    //Metodos

    public function apresentar(){ // Exibe apresentação na tela
        echo "<p>" . "----------------------" . "</p>";
        echo "Chegou a hora! o lutador " . $this->getnome();
        echo "veio diretamente do " .  $this->getnacionalidade();
        echo " tem " . $this->getidade() . " anos e pesa " . $this->getpeso() . "kl";
        echo " Ele tem " . $this->getvitorias() . " Vitorias ";
        echo $this->getderrotas() . " Derrotas e " . $this->getempates() . " empates";
    }
    public function status(){ // exibe status resumido
        echo "<p>" . "----------------------" . "</p>";
        echo $this->getnome() . " é um peso " . $this->getcategoria();
        echo " e ja ganhou " . $this->getvitorias() . " vezes, ";
        echo " perdeu " . $this->getderrotas() . " vezes e ";
        echo " empatou " . $this->getempates() . " vezes!";

    }

    //metodos publicos para mudar resultado
    public function ganharLuta(){
        $this->setvitorias($this->getvitorias() + 1);
    }
    public function perderLuta(){
        $this->setderrotas($this->getderrotas() + 1);
    }
    public function empatarLuta(){
        $this->setempates($this->getempates() + 1);
    }

 }
?>