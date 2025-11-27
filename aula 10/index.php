<pre>
    <?php 
        require_once 'pessoa.php'; // n precisa necessariamente pegar a class pessoa 
        require_once 'aluno.php';
        require_once 'professor.php';
        require_once 'funcionario.php';

        $p1 = new Pessoa();
        $p2 = new Aluno();
        $p3 = new Professor(); 
        $p4 = new Funcionario();

        $p1->setNome("Pedro");
        $p2->setNome("Rafael");
        $p3->setNome("Maria");
        $p4->setNome("Luiza");

        $p1->setidade(23);
        $p2->setCurso("TI");
        $p3->setSalario(2500);
        $p4->setSetor("adiministração");

        print_r($p1);
        print_r($p2);
        print_r($p3);
        print_r($p4);

        //comandos que nao funcionariam metodos especificos das classe filha nao pode ser usado por outra ex:
        //$p3->recerberAumento($valor);
        //
    ?>
</pre>