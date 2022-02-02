<?php require 'views/header.php'; ?>

    <div id="main">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de consulta</h1>

        <table width="100%" id="tabla">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="tbody-articulos">
            
        <?php
            include_once 'models/articulo.php';
            foreach ($this->articulos as $row) {
                $articulo = new Articulo();
                $articulo = $row;
        ?>
                <tr id="fila-<?php echo $articulo->id; ?>">
                    <td><?php echo $articulo->id; ?></td>
                    <td><?php echo $articulo->clave; ?></td>
                    <td><?php echo $articulo->nombre; ?></td>
                    <td><a href="<?php echo constant('URL') . 'consultaArti/verArticulo/' . $articulo->id; ?>">Actualizar</a></td>
                    <td><button class="bEliminar" data-matricula="<?php echo $articulo->id; ?>">Eliminar</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>