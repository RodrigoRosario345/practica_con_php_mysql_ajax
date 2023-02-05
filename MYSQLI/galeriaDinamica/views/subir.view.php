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
            <h1 class="titulo">Subir Foto</h1>
        </div>
    </header>
    <div class="contenedorFoto">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
                <label for="foto">Selecciona tu foto: </label><br><br>
                <input type="file" name="foto" id="foto" ><br><br>
                <label for="titulo">Titulo de la foto: </label><br>
                <input type="text" name="titulo" id="titulo"><br><br>
                <label for="texto">Descripcion: </label><br>
                <textarea name="texto" id="texto" placeholder="Ingresa una descripcion"></textarea><br><br>
                <?php if(!empty($error)): ?>
                    <div class="error">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <input class="enviar" type="submit" value="Subir Foto">

               
            </form><br><br>
        
    </div> 
    <div class="medio"><a href="index.php" class="regresar2"><i class="large material-icons">keyboard_return</i>  regresar</a>  </div>  
    <footer>
        <p class="piePagina">Galeria fue elaborada por Rodrigo Rosario Cruz</p>
    </footer>

</body>
</html>