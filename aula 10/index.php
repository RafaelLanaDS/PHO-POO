<pre>
    <?php 
        require_once 'pessoa.php';
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

        print_r($p1);
        print_r($p2);
        print_r($p3);
        print_r($p4);
    ?>
</pre>