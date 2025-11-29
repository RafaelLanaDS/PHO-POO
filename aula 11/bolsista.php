<?php 
require_once "aluno.php"; // herda de aluno + pessoa 
class bolsista extends aluno {
    private $bolsa;
    public function renovarbolsa(){
        echo "<p>Bolsa renovada</p>";
    }
    public function pagarMensalidade(){ // sobreponto metodo da class aluno SOBREPOSIÇÃO
        echo $this->nome . "é bolsista! Então paga com desconto";
    }

    function getbolsa(){
        return $this->bolsa;
    }
    function setbolsa($b){
        $this->bolsa = $b;
    }
}
?>