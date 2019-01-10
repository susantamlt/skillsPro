<script type="text/javascript">
	$("#btn_submit").click(function(){
		tinymce.triggerSave();
		var teacher_comments=$("#teacher_comments").val();
		var score=$("#score").val();
		var student_id=$("#student_id").val();
		var project_id=$("#project_id").val();
		var teacher_id=$("#project_id").val();
		$.ajax({
			type:"POST",
			url:"<?php echo WEBDIR.ROOT;?>teachers/ajax_save_corrected_assignment.php",
			data:{"teacher_comments":teacher_comments,"student_id":student_id,"project_id":project_id,"teacher_id":teacher_id,"score":score},
			dataType:"json",
			success:function(data){
				if(data.result==1){
					$("#success").text("Assignment checked successfully");
					$("#success").show();
					$("#error").hide();
				}else{
					$("#success").hide();
					$("#error").show();
					$("#error").text("Some thing went wrong");
				}
			}
		});
	});
</script>