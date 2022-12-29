<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">Registrate</h1>
        <hr class="border">    
        <div class="cuadro">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
                <div class="mini_contenedor"><i class='usuario bx bxs-user bx-md'></i><input type="text" name="usuario" id="usuario" placeholder="Usuario"></div>
                <div class="mini_contenedor"><i class='contraseña bx bxs-lock bx-md'></i></i><input type="password" name="contraseña" id="contraseña" placeholder="Contraseña"></div>
                <div class="mini_contenedor"><i class='Rcontraseña bx bxs-lock bx-md'></i><input type="password" name="Rcontraseña" id="Rcontraseña" placeholder="Repetir Contraseña"><i class='enviar bx bx-arrow-back bx-rotate-180 bx-md' onclick="login.submit()"></i></div>
                <?php if(!empty($errores)): ?>
                    <div class="error">
                        <ul>
                            <?php echo $errores; ?>
                        </ul>
                    </div>
                
                <?php endif; ?>

            </form>
        </div>
        <h3>¿ ya tienes cuenta ?</h3>
        <div id="Sesion"><a  href="login.php">Iniciar Sesion</a></div>
        
    </div>
</body>
</html>