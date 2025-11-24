<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>testes</h1>
    <pre>
        <?php 
        require_once "pessoa.php";
        require_once "livro.php";
        
        $p[0] = new pessoa("Rafael ", 23, "M");
        $p[1] = new pessoa("Rafaela ", 25, "F");

        $l[0] = new livro("Game Of Thrones","George R. R. Martin", 300, $p[0]);
        $l[1] = new livro("Casa do Dragão","George R. R. Martin", 500, $p[1]);
        $l[2] = new livro("O festival dos corvos","George R. R. Martin", 800, $p[1]);

        $l[0]->abrir();
        $l[0]->folhear(500);
        //$l[0]->avancarPag();
        $l[0]->detalhes();
        
        $l[2]->detalhes();
        ?>
    </pre>
</body>
</html>