<?php $hours=0;
	  $minutes=40;
?>	 

<script type="text/javascript">
	$("#btn_test").click(function(){
		var test_id=$(this).data('test');
		window.location="configure_test.php?test_id="+test_id;
	});
	$("#btn_submit").click(function(){
			var question_id=$("#question_id").val();
			var test_id=$("#test_id").val();
			var student_id=$("#student_id").val();
			var security_salt=$("#security_salt").val();
			var exam_id=$("#exam_id").val();
			var option_id='';
			if($("#last_question").length>0)			
				var last_question=$("#last_question").val();
			else
				var last_question=0;
			//alert(option_id);
			//var right_answer=$("#right_answer").val();
			var valid=1;
			$("input[name=opt]").each(function(){
				if($(this).is(":checked")==true)
					option_id=$(this).val();
			});
			if(option_id=='' && valid==1){
				$("#error").show();
				$("#error").text("Please check atleast one option");
				valid=0;
			}
			if(valid==1){
				$.ajax({
					type:"POST",
					url:"ajax_next_question.php",
					data:{"test_id":test_id,"exam_id":exam_id,"student_id":student_id,"security_salt":security_salt,"question_id":question_id,'option_id':option_id},
					success:function(data){
						if(exam_id==last_question)
							location.href="end.php?test_id="+test_id+"&security_salt="+security_salt;
						else
							$('#quest_div').html(data);
						
					} 
				});
			}
	});

	
</script>