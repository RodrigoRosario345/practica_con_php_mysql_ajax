<?php require 'header.php'; ?>
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
        <?php foreach($posts as $post): ?> 
            <div class="post">
                <article>
                    <h2 class="titulo"><a href="single.php?id=<?php echo $post['id'];?>"><?php echo $post['titulo'];?></a></h2>
                    <p class="fecha"><?php echo fecha($post['fecha']);?></p>
                    <div class="thumb">
                        <a href="single.php?id=<?php echo $post['id'];?>">
                            <img src="<?php echo RUTA;?>/imagenes/<?php echo $post['thumb']; ?>">
                        </a>
                    </div>
                    <p class="extracto"><?php echo $post['extracto'];?></p>
                    <a href="single.php?id=<?php echo $post['id'];?>" class="continuar">leer mas</a>
                </article>
            </div> 
        <?php endforeach; ?>

    </div>
    <?php require 'paginacion.php'; ?>
</body>
</html>
<?php require 'footer.php'; ?>

