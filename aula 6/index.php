<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Projeto controle remoto</h3>
    <pre>
        <?php 
            require_once "controleRemoto.php";
            $c = new controleRemoto();
            //$c->ligar();
            $c->maisVolume(10);
            $c->menosVolume(20);
            $c->abrirMenu();
        ?>
    </pre>
</body>
</html>
