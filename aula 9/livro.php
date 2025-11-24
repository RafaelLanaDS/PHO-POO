<?php 
require_once "interface.php";
require_once "pessoa.php";

class livro implements publicacao{
    private string $titulo;
    private string $autor;
    private int $totPaginas;
    private int $pagAtual;
    private bool $aberto;
    private $leitor;

    public function detalhes(){
        echo "Livro " . $this->titulo . " escrito por " . $this->autor;
        echo "<br>" . "Paginas:" . $this->totPaginas  . " atual " . $this->pagAtual;
        echo "<br>" . "Sendo lido por " . $this->leitor->getnome();
    }
    function __construct($t, $a, $tot, $leitor){
        $this->titulo = $t;
        $this->autor = $a;
        $this->totPaginas = $tot;
        $this->pagAtual = 0;
        $this->aberto = false; // O livro começa fechado, isso está normal
        $this->leitor = $leitor; // recebe um objeto Pessoa
    }

    function gettitulo(){
        return $this->titulo;
    }
    function getautor(){
        return $this->autor;
    }
    function gettotPaginas(){
        return $this->totPaginas;
    }
    function getpagAtual(){
        return $this->pagAtual;
    }
    function getaberto(){
        return $this->aberto;
    }
    function getleitor(){
        return $this->leitor;
    }

    function settitulo($titulo){
        $this->titulo = $titulo;
    }
    function setautor($autor){
        $this->autor = $autor;
    }
    function settotPaginas($totpaginas){
        $this->totPaginas = $totpaginas;
    }
    function setpagAtual($pagAtual){
        $this->pagAtual = $pagAtual;
    }
    function setaberto($aberto){
        $this->aberto = $aberto;
    }
    function setleitor($leitor){
        $this->leitor = $leitor;
    }

    //interface
    public function abrir(){
        $this->aberto = true;
        echo "O livro esta aberto" . "<br>";
    }
    public function fechar(){
        echo "O livro esta fechado" . "<br>";
    }
    public function folhear($p){
        if($p> $this->totPaginas){
            $this->pagAtual = 0;
        } else{
            $this->pagAtual = $p;
        }
    }
    public function avancarPag(){
        $this->setpagAtual($this->getpagAtual() + 1);
    }
    public function voltarPag(){
        $this->setpagAtual($this->getpagAtual() - 1);
    }

}
?>