<?php require '../views/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e342c8a50b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body><!-- solo usar un foreach y no dos porque al ser un array asociativo se puede llamar a la variable que se quiera directo sin la necesidad de recorrer con dos bucles -->
    <div class="container">
        <h2 class="tituloPrincipal">Panel de Control</h2><br>
        <div class="botones">
            <a class="btn" href="nuevo.php">Nuevo Post</a>
            <a class="btn" href="cerrar.php">Cerrar Session</a>
        </div>
        <?php foreach($posts as $post): ?> 
            <div class="post">
                <article>
                    <h2 class="tituloAdmin"><?php echo $post['id']. '.-'. $post['titulo'] ?></h2>
                    <a class="color1" href="editar.php?id=<?php echo $post['id'];?>"><i class="icono1 fa-solid fa-pen-to-square"></i> Editar</a>
                    <a class="color2" href="../single.php?id=<?php echo $post['id'];?>"><i class="icono2 fa-solid fa-eye"></i> ver</a>
                    <a class="color3" href="borrar.php?id=<?php echo $post['id'];?>"><i class="icono3 fa-solid fa-trash"></i> eliminar</a>
                </article>
            </div> 
        <?php endforeach; ?>

    </div>
    <?php require '../paginacion.php'; ?>
</body>
</html>
<?php require '../views/footer.php'; ?>
