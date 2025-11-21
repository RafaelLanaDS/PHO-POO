<PRE>
    <?php 
    require_once "ContaBanco.php";
    $c1 = new ContaBanco;
    $c1->setNumConta("47741-25");
    $c1->setDono("Rafael Lana de Sousa");
    $c1->AbrirConta("CP");
    $c1->Depositar(200);
    $c1->sacar(50);
    $c1->PagarMensal();
    $c1->sacar(280);
    $c1->FecharConta();
    print_r($c1);
    ?>
</PRE>