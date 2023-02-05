<?php require 'header.php'; ?>

<div class="container">
        <div class="post">
            <article>
                <h2 class="tituloLogin">Iniciar Sesion</h2>
                <form class="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="text" name="usuario" placeholder="Usuario">
                    <input type="password" name="password" placeholder="Contraseña">
                    <input type="submit" value="Iniciar Sesion">
                </form>
            </article>
        </div>

    </div>

<?php require 'footer.php'; ?>