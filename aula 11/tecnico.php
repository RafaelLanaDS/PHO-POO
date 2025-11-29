<?php 
require_once "aluno.php";
class tecnico extends aluno{
    private $registroProficional;
    
    public function pratica(){
        echo "A tecnico {$this->nome} esta praticando";
    }

    function getregistroProficional(){
        return $this->registroProficional;
    }
    function setregistroProficional($RG){
        $this->registroProficional = $RG;   
    }
}
?>