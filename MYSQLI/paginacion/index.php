<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="titulo">Articulos</h1>
        <section class="articulos">
            <ul>
                <?php include 'articulos.php' ?>
                <?php foreach($articulos as $articulo): ?>
                    <li><?php echo $articulo['id'] . '.- ' . $articulo['articulo'] ?></li>
                <?php endforeach ?>
            </ul>
        </section>

        <section class="botones">
            <ul class="mini-padre">
                <?php if($pagina == 1): ?>
                    <li class="disabled">&laquo;</li>
                <?php else: ?>
                    <li class="mini-hijo"><a href="?pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
                <?php endif ?>

                <?php 
                    for($i = 1; $i <= $numeroPaginas; $i++) {
                        if($pagina == $i) {
                            echo "<li class='dentro'><a href='?pagina=$i'class='active' >$i</a></li>";
                        } else {
                            echo "<li><a href='?pagina=$i'>$i</a></li>";
                        }
                    }
                ?>

                <?php if($pagina == $numeroPaginas): ?>
                    <li class="disabled">&raquo;</li>
                <?php else: ?>
                    <li class="mini-hijo"><a href="?pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
                <?php endif ?>
            </ul>
        </section>
    </div>
    
</body>
</html>