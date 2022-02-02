    <?php require 'views/header.php'; ?>

    <div id="main">
        <div><?php echo $this->mensaje; ?></div>
            <h1 class="center">Actualizar <?php echo $this->usuario->id; ?></h1>

        <form action="<?php echo constant('URL'); ?>consultaUsua/actualizarUsuario" method="POST">
            <label for="">Id</label><br>
            <input type="text" disabled name="id" id="" value="<?php echo $this->usuario->id; ?>"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nombre" value="<?php echo $this->usuario->nombre; ?>"><br>
            <label for="">Telefono</label><br>
            <input type="text" name="telefono" value="<?php echo $this->usuario->telefono; ?>"><br>
            <label for="">Email</label><br>
            <input type="text" name="email" value="<?php echo $this->usuario->email; ?>"><br>
            <input type="submit" value="Actualizar usuario">
        </form>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>