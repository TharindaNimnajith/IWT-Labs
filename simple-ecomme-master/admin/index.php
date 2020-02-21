 <?php include_once 'header.php'; ?>
	<div class="tab-content" style="padding-top: 20px;">
	  <div class="row tab-pane fade in active" id="category">
	  	<?php include_once 'category.php'; ?>
	  </div>
	  <div class="row tab-pane fade" id="products">
	  	<?php include_once 'products.php'; ?>
	  </div>
	
	</div>
	<script>
	  $(function () {
	    //$('#tabs a:last').tab('show')
	  })
	</script>
	</div>
</div>
</body>
</html>