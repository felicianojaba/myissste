<?php require 'views/header.php'; ?>
    
    
      <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <main class="px-3">
          <h1 class="center error"><?php echo $this->mensaje; ?></h1>
        </main>
        
      </div>

<script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
    <?php require 'views/footer.php'; ?>
    <script>
$(document).ready(function (){
	console.log("jqueery chambeando en false. . ");	
  $('#trabajar').hide();
	$('#search').hide();
});
</script> 