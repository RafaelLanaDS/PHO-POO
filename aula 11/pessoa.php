<?php 
    abstract class  pessoa {
        protected string $nome;
        protected int $idade;
        protected $sexo;

        public function FazerAniversario(){
            $this->setIdade($this->getIdade() + 1);
        }
        // SETTERS
        public function setnome(string $nome) {
            $this->nome = $nome;
        }

        public function setIdade(int $idade) {
            $this->idade = $idade;
        }

        public function setSexo($sexo) {
            $this->sexo = $sexo;
        }

        // GETTERS
        public function getnome(): string {
            return $this->nome;
        }

        public function getIdade(): int {
            return $this->idade;
        }

        public function getSexo() {
            return $this->sexo;
        }
    }
?>