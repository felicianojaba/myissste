<!DOCTYPE html>
<html>
 <head>
 <title>Formulario con Ajax</title>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 </head>
 <body>
        <div id="formulario">
            <form method="post" id="formdata">
                <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" required="required"></br>
                <label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos" required="required"></br>
                <label for="direccion">Dirección: </label><input type="text" name="direccion" id="direccion" required="required"></br>
                Género: <input type="radio" name="genero" id="hombre" checked="checked"><label for="hombre"> Hombre - </label><input type="radio" name="genero" id="mujer"><label for="mujer"> Mujer</label>
                <label for="mayor">Es mayor de 18 años: </label><input type="checkbox" name="mayor" id="mayor" required="required">
                <input type="button" id="botonenviar" value="Enviar">
            </form>
        </div>
        <div id="exito" style="display:none">
            Sus datos han sido recibidos con éxito.
        </div>
        <div id="fracaso" style="display:none">
            Se ha producido un error durante el envío de datos.
        </div>
 </body>
</html>
2. La magia de jQuery
Llega el momento de añadir el jQuery. ¿Dónde? Pues unos os dirán que en el <head>, otros os dirán que en el <body>. La respuesta correcta es que nos vale en ambos sitios, el código JavaScript se puede insertar tanto en el <head> como en el <body>, aunque muchos recomiendan tenerlo en el <head> para tenerlo localizado. Yo, por ejemplo, siempre suelo escribirlo al final del código, justo antes de cerrar el </body>. Como nos da exactamente igual, yo pondré solo el código JavaScript, y ya cada uno que lo copie donde quiera (dentro de las etiquetas <script type=»text/javascript»></script>). Esta vez lo haré por partes.

Primero con la función opcional de validar el formulario. Se trata de una función que recorrerá todos los campos uno por uno, y si uno no está relleno, devolverá false y mostrará un mensaje.

function validaForm(){
    // Campos de texto
    if($("#nombre").val() == ""){
        alert("El campo Nombre no puede estar vacío.");
        $("#nombre").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#apellidos").val() == ""){
        alert("El campo Apellidos no puede estar vacío.");
        $("#apellidos").focus();
        return false;
    }
    if($("#direccion").val() == ""){
        alert("El campo Dirección no puede estar vacío.");
        $("#direccion").focus();
        return false;
    }

    // Checkbox
    if(!$("#mayor").is(":checked")){
        alert("Debe confirmar que es mayor de 18 años.");
        return false;
    }

    return true; // Si todo está correcto
}

Dicho esto, pongo el código completo:

$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonenviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        if(validaForm()){                               // Primero validará el formulario.
            $.post("enviar.php",$("#formdata").serialize(),function(res){
                $("#formulario").fadeOut("slow");   // Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
                if(res == 1){
                    $("#exito").delay(500).fadeIn("slow");      // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
                } else {
                    $("#fracaso").delay(500).fadeIn("slow");    // Si no, lo mismo, pero haremos aparecer el div "fracaso"
                }
            });
        }
    });    
});
Para que funcione con este ejemplo, el archivo enviar.php lo tenéis que hacer de forma que:

No devuelva mensajes de texto, solo 1/0 dependiendo de si el proceso ha resultado exitoso o erróneo. Esto es porque lo hemos hecho de esta forma, pero podéis hacer que devuelva mensajes perfectamente y luego mostrarlos con alert, o insertarlos en algún otro sitio vía jQuery… son miles las posibilidades
Los datos que hemos pasado con el formulario los ha recibido en $_POST. Es decir, estarán en $_POST[«nombre»], $_POST[«apellidos»]…
Si lo que queréis es probarlo, haced que ese formulario sólo tenga una línea: <?php echo(«1»); ?> o <?php echo(«0»); ?>, según la respuesta que queráis ver.





<html>
 
<head>
 
<title>Ejemplo sencillo de AJAX</title>
 
<script type="text/javascript" src="/js/jquery.js"></script>
 
<script>
function realizaProceso(valorCaja1, valorCaja2){
        var parametros = {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
        };
        $.ajax({
                data:  parametros,
                url:   'ejemplo_ajax_proceso.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}
</script>
 
</head>
 
<body>
 
Introduce valor 1
 
<input type="text" name="caja_texto" id="valor1" value="0"/> 
 
 
Introduce valor 2
 
<input type="text" name="caja_texto" id="valor2" value="0"/>
 
Realiza suma
 
<input type="button" href="javascript:;" onclick="realizaProceso($('#valor1').val(), $('#valor2').val());return false;" value="Calcula"/>
 
<br/>
 
Resultado: <span id="resultado">0</span>
 
</body>
 
</html>