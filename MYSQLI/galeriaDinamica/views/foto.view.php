<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/e342c8a50b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria Dinamica</title>

</head>
<body>
    <header>
        <div class="container">
            <h1 class="titulo">Foto: <?php if(!empty($foto['titulo']))
                echo $foto['titulo'];
            else
                echo $foto['imagen'];
            
            ?></h1>
        </div>
    </header>
    <div class="contenedorP">
        <img src="imgSave/<?php  echo $foto['imagen']?>" alt="">
        <p class="texto"><?php echo $foto['texto']?></p>
        <a href="index.php" class="regresar"><i class="large material-icons">keyboard_return</i>  regresar</a>
    </div>        
    <footer>
        <p class="piePagina">Galeria fue elaborada por Rodrigo Rosario Cruz</p>
    </footer>

</body>
</html>