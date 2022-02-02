 <?php require 'views/header.php'; ?>
    
    <div id="main">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de Nuevos Usuarios</h1>
        <form action="<?php echo constant('URL'); ?>nwusuario/crear" method="POST">
            <label for="">Telefono</label><br>
            <input type="text" name="telefono" id=""><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nombre" id=""><br>
            <label for="">Email</label><br>
            <input type="text" name="email" id=""><br>
            <input type="submit" value="Crear nuevo usuario">
        </form> 
    </div>    
    
</body>

<?php require 'views/footer.php'; ?>   




       
        