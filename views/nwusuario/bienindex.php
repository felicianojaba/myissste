<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de Nuevos Articulos</h1>

        <form action="<?php echo constant('URL'); ?>nwarticulo/biencrear" method="POST">
            <label for="">Clave</label><br>
            <input type="text" name="clave" id=""><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nombre" id=""><br>
            <label for="">Imagen</label><br>
            <input type="text" name="imagen" id=""><br>
            
            
            
            <input type="submit" value="Crear nuevo articulo">
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>
