<script type="text/javascript">
	$('#batch_time').timepicker();
	$("#center_id").change(function(){
		var center_id=$("#center_id").val();
		var partner_id=$("#partner_id").val();
		alert(center_id);
		$.ajax({
			type:"POST",
			url:"<?php echo WEBDIR.ROOT;?>partners/ajax_centerwise_course.php",
			data:{"center_id":center_id,"partner_id":partner_id},
			success:function(data){
				$("#course_id").html(data);
			}
		});
	});
</script>