
    <?php require 'views/header.php'; ?>

    <div id="main">
        <div><?php echo $this->mensaje; ?></div>
            <h1 class="center">Actualizar <?php echo $this->articulo->id; ?></h1>

        <form action="<?php echo constant('URL'); ?>consultaArti/actualizarArticulo" method="POST">
            <label for="">Id</label><br>
            <input type="text" disabled name="id" id="" value="<?php echo $this->articulo->id; ?>"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nombre" value="<?php echo $this->articulo->nombre; ?>"><br>
            <label for="">Clave</label><br>
            <input type="text" name="clave" value="<?php echo $this->articulo->clave; ?>"><br>
            <input type="submit" value="Actualizar articulo">
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>