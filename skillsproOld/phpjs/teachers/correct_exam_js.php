<script type="text/javascript">
	$("#btn_submit").click(function(){
		tinymce.triggerSave();
		var teacher_comments=$("#teacher_comments").val();
		var cn_q_an_array = {};
		var marks_q_an_array = {};
		var $i=0;
		$('.correct_answer').each(function(){
			cn_q_an_details_id = $(this).data('id');
			//var correct_answer = $(this).val();
			cn_q_an_array[$i] = new Array();
			cn_q_an_array[$i][0] = cn_q_an_details_id;
			cn_q_an_array[$i][1] = $(this).val();
			$i++;
		});
		//alert(cn_q_an_array);
		var $j=0;
		$('.correct_marks').each(function(){
			m_q_an_details_id = $(this).data('id');
			//marks = $(this).val();
			marks_q_an_array[$j] = new Array();
			marks_q_an_array[$j][0] = m_q_an_details_id;
			marks_q_an_array[$j][1] = $(this).val();
			$j++;
		});
		var is_text_checking = {};
		$('.is_text_checking').each(function(){
			is_text_checking = $(this).val();
		});
		//alert(marks_q_an_array);
		var score=$("#score").val();
		var student_id=$("#student_id").val();
		var course_id=$("#course_id").val();
		var teacher_id=$("#teacher_id").val();
		var online_test_id=$("#online_test_id").val();
		//var is_text_checking = $('.is_text_checking').val();
		$.ajax({
			type:"POST",
			url:"<?php echo WEBDIR.ROOT;?>teachers/ajax_save_correct_exam.php",
			data:{"teacher_comments":teacher_comments,"student_id":student_id,"course_id":course_id,"teacher_id":teacher_id,"online_test_id":online_test_id,"marks_q_an_array":marks_q_an_array,"cn_q_an_array":cn_q_an_array,"is_text_checking":is_text_checking},
			dataType:"json",
			success:function(data){
				if(data.result==1){	
					$("#success").text("Exam/Quiz checked successfully");
					$("#success").show();
					$("#error").hide();
					$("html, body").animate({ scrollTop: 0 }, "slow");
					setTimeout(function(){window.location="check_quiz_exam.php";},3000);
				}else{
					$("#success").hide();
					$("#error").show();
					$("#error").text("Some thing went wrong");
				}
			}
		});
	});
</script>