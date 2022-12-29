<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">Iniciar Sesion</h1>
        <hr class="border">    
        <div class="cuadro">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">  <!--htmlspecialchars($_SERVER['PHP_SELF']) es para que no se pueda ver el codigo php en la url-->
                <div class="mini_contenedor"><i class='usuario bx bxs-user bx-md'></i><input type="text" name="usuario" id="usuario" placeholder="Usuario"></div>
                <div class="mini_contenedor"><i class='Rcontraseña bx bxs-lock bx-md'></i><input type="password" name="contraseña" id="Rcontraseña" placeholder="Contraseña"><i class='enviar bx bx-arrow-back bx-rotate-180 bx-md' onclick="login.submit()"></i> </div>
                <?php if(!empty($errores)): ?>
                    <div class="error">
                        <ul>
                            <?php echo $errores; ?>
                        </ul>
                    </div>
                
                <?php endif; ?>
            </form>
            
        </div>
        <h3>¿ aun no tienes cuenta ?</h3>
        <div id="Sesion"><a  href="registro.php">Registrate</a></div>
        
    </div>
</body>
</html>