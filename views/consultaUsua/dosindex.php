<?php require 'views/header.php'; ?>

    <div id="main">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de consulta</h1>

        <table width="100%" id="tabla">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="tbody-usuarios">
            
        <?php
            include_once 'models/usuario.php';
            foreach ($this->usuarios as $row) {
                $usuario = new Usuario();
                $usuario = $row;
        ?>
                <tr id="fila-<?php echo $usuario->id; ?>">
                    <td><?php echo $usuario->id; ?></td>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><?php echo $usuario->telefono; ?></td>
                    <td><?php echo $usuario->email; ?></td>
                    <td><a href="<?php echo constant('URL') . 'consultaUsua/verUsuario/' . $usuario->id; ?>">Actualizar</a></td>
                    <td><button class="bEliminar" data-matricula="<?php echo $usuario->id; ?>">Eliminar</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant(name)('URL'); ?>/public/js/main.js"></script>          
</body>
</html>