 <?php require 'views/header.php'; ?>
        <script>
            $(document).ready(function(){
                
                $("#boton").on("click", function(){
                    var miArchivo = $("#archivoId").prop('files')[0];
                    var datosForm = new FormData;
                    datosForm.append("archivoId",miArchivo);
                    var destino = "<?php echo constant('URL'); ?>nwarticulo/crear";

                    
                    var image = document.getElementById('output');
                    image.src = URL.createObjectURL(miArchivo);
                    
                    
                    $.ajax({
                        type:'POST',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: datosForm,
                        url: destino
                
            }).fail(function(){alert('Fallo al subir el archivo');});
        
            });
                
                
            });
       </script>
<body>
    
    <div id="main">
         <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de Nuevos Articulos</h1>
        <form action="<?php echo constant('URL'); ?>nwarticulo/biencrear" method="POST" ecytype="multipart/form-data">
            <input type="file" id="archivoId"><br><br>
            <input type="button" id="boton" value="Subir Archivo"><br><br>
            <p><img id="output" width="166" eight="166" /></p>
            <label for="">Clave</label><br>
            <input type="text" name="clave" id=""><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nombre" id=""><br>
            <label for="">Imagen</label><br>
            <input type="text" name="imagen" id=""><br>
            <input type="submit" value="Crear nuevo articulo">
        </form> 
    </div>    
    
</body>

<?php require 'views/footer.php'; ?>   




       
        