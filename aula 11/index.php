<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php 
            require_once "pessoa.php";
            require_once "visitante.php";
            require_once "aluno.php";
            require_once "bolsista.php";
            require_once "professor.php";
            require_once "tecnico.php";
            /*$p1 = new Pessoa();-> A CLASSE PESSOA NAO PODE SER INSTANCIADA SO PODE SER UTILIZADA PARA HERANÇAS*/
            $v1 = new visitante(); // class visitante
            $v1->setnome("rafael");
            $v1->setIdade(23);
            $v1->setSexo('m');
            $v1->fazerAniversario();
            print_r($v1);

            $a1 = new aluno(); // herança para diferença
            $a1->setnome('Pedro');
            $a1->setmatricula(564854);
            $a1->setidade(18);
            $a1->setsexo("M");
            $a1->setCurso("ADS");
            $a1->pagarMensalidade();
            print_r($a1);

            $b1 = new bolsista();
            $b1-> setmatricula(56445);
            $b1-> setnome("Robson ");
            $b1-> setbolsa(12,2);
            $b1-> setcurso("ciencia da  computação");
            $b1-> setidade(20);
            $b1-> pagarMensalidade();
            print_r($b1);

            $p1 = new professor();
            $p1-> setnome("Buin");
            $p1-> setidade(32);
            $p1-> setsexo('M');
            $p1-> setEspecialidade("MySQL");
            $p1-> setsalario(4000);
            $p1-> receberAumento(200);
            $p1-> fazerAniversario();
            print_r($p1);

            $t1 = new tecnico();
            $t1-> setnome("Maria");
            $t1-> setidade(21);
            $t1-> setsexo("F");
            $t1-> setmatricula(54561);
            $t1-> setcurso("Odonto");
            $t1-> setregistroProficional("547456488-54");
            $t1-> pratica();
            $t1-> pagarMensalidade();
            $t1-> fazerAniversario();
            print_r($t1);

        ?>
    </pre>
</body>
</html>