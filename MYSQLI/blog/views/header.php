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
    <header>
        <div class="contenedor">
            <div class="izquierda">
                <p><a href="index.php">Mi primer blog</a></p>
            </div>
            <div class="derecha">
                <form action="<?php echo RUTA; ?>/buscar.php" method="get" class="buscarC">
                    <input type="text" name="busqueda" class="buscar" placeholder="Buscar">
                    <button type="submit" class="icono fa fa-search"></button>
                </form>
                <nav class="menu">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#">Contacto <i class="fa-solid fa-envelope"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</body>
</html>