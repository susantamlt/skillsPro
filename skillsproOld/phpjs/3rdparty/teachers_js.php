<script type="text/javascript">
$("#btn_submit").click(function(e){
		var partner_id=$("#partner_id").val();
		var teacher_first_name=$("#teacher_first_name").val();
		var teacher_last_name=$("#teacher_last_name").val();
		var teacher_email=$("#teacher_email").val();
		var teacher_phone=$("#teacher_phone").val();
		var teacher_address_1=$("#teacher_address_1").val();
		var teacher_address_2=$("#teacher_address_2").val();
		var teacher_state=$("#teacher_state").val();
		var teacher_zip=$("#teacher_zip").val();
		var course_id=$("#course_id").val();
		var valid=1;
		var center_id=$("#teacher_id").val();
		var mail_valid = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var phone_valid = /^\d{10}$/;
		
		if(teacher_first_name=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter First Name");
			valid=0;
		}
		if(teacher_last_name=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter Last Name");
			valid=0;
		}
		
		if(teacher_email=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter email");
			valid=0;
		}else if(teacher_email!='' && valid==1){
			if(!mail_valid.test(teacher_email)){
				$('#error').html('Please enter valid email.');
				valid = 0;
			}
		}
		
		if(teacher_phone=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter Phone");
			valid=0;
		}else if (teacher_phone != '') {
            if (!phone_valid.test(teacher_phone)) {
				$("#error").show();
				$("#error").text("Please enter only 10 digits Phone");
				valid=0;
			}
        }
        
        if(valid==1){
			$.ajax({
        		type:"POST",
        		url:"<?php echo WEBDIR.ROOT;?>partners/ajax_add_teacher.php",
        		data:{'partner_id':partner_id,'teacher_first_name':teacher_first_name,'teacher_last_name':teacher_last_name,'teacher_email':teacher_email,'teacher_phone':teacher_phone,'teacher_address_1':teacher_address_1,'teacher_address_2':teacher_address_2,'teacher_state':teacher_state,'teacher_zip':teacher_zip,'course_id':course_id,'teacher_id':center_id},
        		dataType:"json",
        		success:function(data){
        			if(data.result==1){
        				$("#error").hide();
						$("#success").show();
        				$("#success").text("Student successfully added");
						setTimeout(function(){ window.location.href="list_students.php"; }, 2000);
        			}else{
        				$("#error").show();
        				$("#error").text("Some problem occured");
        			}
        		}
        	});        	
        }

		$("html, body").animate({ scrollTop: 0 }, "slow");
        e.preventDefault();
	});

$("#btn_teacher").click(function(){
	window.location="<?php echo WEBDIR.ROOT;?>partners/add_teacher.php";
});	
</script>