<?php require 'header.php'; ?>
<body><!-- solo usar un foreach y no dos porque al ser un array asociativo se puede llamar a la variable que se quiera directo sin la necesidad de recorrer con dos bucles -->
    <div class="container">
        <h2 class="tituloBusqueda"><?php echo $titulo ?></h2>
        <?php foreach($resultados as $post): ?> 
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
<?php require 'footer.php'; ?>
