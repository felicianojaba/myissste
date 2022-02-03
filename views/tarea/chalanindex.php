    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center">Bienvenido al sitio</h1>
        <button onclick="sendRequest()">
        	Send ajax request
    	</button>
    	<h1 id="title"></h1>
    </div>
<?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/push.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/popper.min.js"></script>
</body>
</html>
<script type="text/javascript">
	function sendRequest(){
		//console.log("Hola Charais");
		var theObject = new XMLHttpRequest();
		theObject.open('POST', 'http://localhost/issste/public/php/elchalan.php', true);
		theObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		theObject.onreadystatechange = function(){
			document.getElementById('title').innerHTML = theObject.responseText;
		}
		theObject.send('usuario= No,lo dudes mi Charais');
	}
</script>