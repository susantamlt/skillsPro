<script type="text/javascript">
	$(function() {
		$( "#start_date" ).datepicker({
		  defaultDate: "+1w",
		  changeMonth: true,
		  numberOfMonths: 2,
		  dateFormat:"dd/mm/yy",
		  onClose: function( selectedDate ) {
			$( "#end_date" ).datepicker( "option", "minDate", selectedDate);
		  }
		});
		$( "#end_date" ).datepicker({
		  defaultDate: "+1w",
		  changeMonth: true,
		  numberOfMonths: 2,
		  dateFormat:"dd/mm/yy",
		  onClose: function( selectedDate ) {
			$( "#start_date" ).datepicker( "option", "maxDate", selectedDate );
		  }
		});
	  });
	$("#topic_id").change(function(){
		var topic_id=$(this).val();
		var partner_id=$("#partner_id").val();
		$.ajax({
			type:"POST",
			url:"ajax_course_by_topic.php",
			data:{"topic_id":topic_id,"partner_id":partner_id},
			success:function(data){
				$("#course_id").html(data);
			}
	
		});
	});

	$("#btn_submit").click(function(e){
		var online_test_name=$("#online_test_name").val();
		var topic_id=$("#topic_id").val();
		var course_id=$("#course_id").val();
		var number_of_questions=$("#number_of_questions").val();
		var time_duration_hours=$("#time_duration_hours").val();
		var time_duration_minutes=$("#time_duration_minutes").val();
		var online_test_type='';
		var start_date=$("#start_date").val();
		var end_date=$("#end_date").val();
		var online_test_level='';
		var online_test_id=$("#online_test_id").val();
		var student_assignment;
		var question_assignment;
		var valid=1;
	
		$("input[name='online_test_level']").each(function(){
			if($(this).is(":checked"))
				online_test_level=$(this).val();	
			
		});
		$("input[name='question_assignment']").each(function(){
			if($(this).is(":checked"))
				question_assignment=$(this).val();	
			
		});
		$("input[name='student_assignment']").each(function(){
			if($(this).is(":checked"))
				student_assignment=$(this).val();	
			
		});
		$("input[name='online_test_type']").each(function(){
			if($(this).is(":checked"))
				online_test_type=$(this).val();	
			
		});


		if(online_test_name=='' && valid==1){
			$("#error").show();
			$("#error").text('Please enter Test Name');
			valid=0;
		}
		if(topic_id=='' && valid==1){
			$("#error").show();
			$("#error").text('Please enter Topic');
			valid=0;
		}
		if(course_id=='' && valid==1){
			$("#error").show();
			$("#error").text('Please enter Course');
			valid=0;
		}
		if(number_of_questions=='' && valid==1){
			$("#error").show();
			$("#error").text('Please enter Number of Questions');
			valid=0;
		}
		if(online_test_type=='' && valid==1){
			$("#error").show();
			$("#error").text('Please select test type');
			valid=0;
		}
		if(online_test_level=='' && valid==1){
			$("#error").show();
			$("#error").text('Please select test level');
			valid=0;
		}

	
		if(valid==1){
			$.ajax({
				type:"POST",
				url:"ajax_save_exam.php",
				data:{"online_test_name":online_test_name,"topic_id":topic_id,"course_id":course_id,"online_test_level":online_test_level,"online_test_type":online_test_type,"start_date":start_date,"end_date":end_date,"number_of_questions":number_of_questions,"time_duration_minutes":time_duration_minutes,"time_duration_hours":time_duration_hours,"online_test_id":online_test_id,'question_assignment':question_assignment},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						if(question_assignment=='A'){
							$("#error").hide();
							$("#success").show();
							$("#success").text("Exam saved successfully");
							setTimeout(function(){ window.location.href="list_exam.php"; }, 2000);
						}else{
							window.location='<?php echo WEBDIR.ROOT;?>partners/select_questions.php?exam_id='+data.exam_id;
						}	
					}else{
						$("#error").show();
						$("#error").text("Some problem occured while saving");
					}
				}
			});
		}
		$("html, body").animate({ scrollTop: 0 }, "slow");		
		e.preventDefault();
	
	});
</script>