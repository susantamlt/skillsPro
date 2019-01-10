<script type="text/javascript">
$("#btn_submit").click(function(e){
		var partner_id=$("#partner_id").val();
		var student_first_name=$("#student_first_name").val();
		var student_last_name=$("#student_last_name").val();
		var student_email=$("#student_email").val();
		var student_phone=$("#student_phone").val();
		var student_address_1=$("#student_address_1").val();
		var student_address_2=$("#student_address_2").val();
		var student_state=$("#student_state").val();
		var student_zip=$("#student_zip").val();
		var course_id=$("#course_id").val();
		var student_id=$("#student_id").val();
		var valid=1;
		var center_id=$("#student_id").val();
		var mail_valid = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var phone_valid = /^\d{10}$/;
		
		if(student_first_name=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter First Name");
			valid=0;
		}
		if(student_last_name=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter Last Name");
			valid=0;
		}
		
		if(student_email=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter email");
			valid=0;
		}else if(student_email!='' && valid==1){
			if(!mail_valid.test(student_email)){
				$('#error').html('Please enter valid email.');
				valid = 0;
			}
		}
		
		if(student_phone=='' && valid==1){
			$("#error").show();
			$("#error").text("Please enter Phone");
			valid=0;
		}else if (student_phone != '') {
            if (!phone_valid.test(student_phone)) {
				$("#error").show();
				$("#error").text("Please enter only 10 digits Phone");
				valid=0;
			}
        }
		
        if(valid==1){
			$.ajax({
        		type:"POST",
        		url:"<?php echo WEBDIR.ROOT;?>partners/ajax_add_student.php",
        		data:{'partner_id':partner_id,'student_first_name':student_first_name,'student_last_name':student_last_name,'student_email':student_email,'student_phone':student_phone,'student_address_1':student_address_1,'student_address_2':student_address_2,'student_state':student_state,'student_zip':student_zip,'course_id':course_id,'student_id':student_id},
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

$("#btn_student").click(function(){
	window.location="<?php echo WEBDIR.ROOT;?>partners/add_student.php";
});	
</script>