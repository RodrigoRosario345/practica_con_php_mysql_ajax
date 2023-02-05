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
<body>
    <div class="container">
        <div class="post">
            <article>
                <h2 class="titulo"><?php echo $post['titulo'];?></h2>
                <p class="fecha"><?php echo fecha($post['fecha']);?></p>
                <div class="thumb">
                    <img src="<?php echo RUTA;?>/imagenes/<?php echo $post['thumb']; ?>">
                </div>

                <p class="extracto">
                    <?php echo nl2br($post['texto']);// nl2br sirve para respetar los espacios existentes agrega un br?>
                </p>
                
            </article>
        </div>

    </div>
</body>
</html>
<?php require 'footer.php'; ?>

