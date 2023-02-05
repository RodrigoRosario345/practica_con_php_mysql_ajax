<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e342c8a50b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria Dinamica</title>

</head>
<body>
    <header>
        <div class="container">
            <li class="titulo">Mi Galeria del Mundial Qatar 2022</li>
            <li><a href="subir.php" class="subir"><i class="fas fa-upload"></i> Subir Foto</a></li>
        </div>
    </header>
    <section class="fotos">
        <div class="contenedor">
            <?php foreach($fotos as $foto): ?>
                <div class="item">
                    <a href="foto.php?id=<?php echo $foto['id']; ?>">
                        <img src="fotos/<?php echo $foto['imagen']; ?>">
                    </a>
                </div>
            <?php endforeach; ?>
            
        </div>
        <div class="botones">
            <?php if($pagina_actual > 1): ?>
                <a href="index.php?p=<?php echo $pagina_actual - 1; ?>" class="izquierda"><i class="fa-solid fa-arrow-left-long"></i>  Pagina Anterior</a>
            <?php endif; ?>
            <?php if($total_paginas != $pagina_actual): ?>
                <a href="index.php?p=<?php echo $pagina_actual + 1; ?>" class="derecha">Pagina siguiente  <i class="fa-solid fa-arrow-right-long"></i></a>
            <?php endif; ?>
            
            <!-- <a href="" class="izquierda"><i class="fa-solid fa-arrow-left-long"></i>  Pagina Anterior</a>
            <a href="" class="derecha">Pagina siguiente  <i class="fa-solid fa-arrow-right-long"></i></a> -->
        </div>
        
    </section>
    <footer>
        <p class="piePagina">Galeria fue elaborada por Rodrigo Rosario Cruz</p>
    </footer>
</body>
</html>