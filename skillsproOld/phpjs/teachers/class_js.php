<script type="text/javascript">
	$(".btn-success").click(function(){
		var class_code=$(this).data('val');
		window.location="<?php echo WEBDIR.ROOT;?>/teachers/prepare_class.php?class_code="+class_code;
	});	
</script>