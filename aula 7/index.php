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
        require_once 'UFE.php';
        require_once 'luta.php';
        $l = array();
        $l[0] = new Lutador("RafaelAlfa", "Brasileira", 23, 1.86, 76.8, 10, 1, 3);
        $l[1] = new Lutador("Putscript", "Brasil", 29, 1.68, 57.8, 14, 2, 3);
        $l[2] = new Lutador("SnapShodow","EUA",35, 1.68, 117.8, 14, 2, 3);
        $l[3] = new Lutador("Dead Code","Australiano", 28, 1.93, 81.6, 13, 0, 2);
        $l[4] = new Lutador("UFOCobol","Brasil", 37, 1.70, 119.3, 5, 4, 3);

        $UEC01 = new Luta();
        $UEC01->marcarluta($l[2], $l[4]);
        $UEC01->luta();
        //$l[0]->status();
        //$l[3]->status();
    ?>
    </pre>
</body>
</html>