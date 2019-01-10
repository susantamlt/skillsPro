<script type="text/javascript">
	$("#btn_submit").click(function(e){
		var stu_name=$("#stu_name").val();
		var stu_email=$("#stu_email").val();
		var stu_phone=$("#stu_mobile").val();
		var stu_exp=$("#stu_exp").val();
		var valid=1;
		if(stu_name=='' && valid==1){
			valid=0;
			$("#error").show();
			$("#error").text('Please enter your Name');
		}
		if(stu_email=='' && valid==1){
			valid=0;
			$("#error").show();
			$("#error").text('Please enter your email');
		}
		if(stu_phone=='' && valid==1){
			valid=0;
			$("#error").show();
			$("#error").text('Please enter your Mobile');
		}
		if(stu_email!='' && valid==1){
			if(!validateEmail(stu_email)){
				valid=0;
				$("#error").show();
				$("#error").text('Please enter a valid email');
		    }
		}
		if(stu_phone!='' && valid==1){
			if(stu_phone.length<10 && !isNumber(stu_phone)){
				valid=0;
				$("#error").show();
				$("#error").text('Please enter a valid phone');
			}
		}

		if(stu_exp=='' && valid==1){
			$("#error").show();
			$("#error").text("Please select your experience");
		}
		if(valid==1){
			$.ajax({
				type:"POST",
				url:"ajax_register.php",
				data:{'stu_name':stu_name,'stu_email':stu_email,'stu_phone':stu_phone,'stu_exp':stu_exp},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						$("#error").hide();
						$("#success").show();
						$("#success").text("You have been regsitered successfully");
						setTimeout(function(){location.href="asses_skill.php"},5000);
					}else if(data.result==2){
						$("#error").show();
						$("#error").text('Email already in our database');
					}else{
						$("#error").show();
						$("#error").text("Something unexpected happened. Please try again");
					}
				}
			});
		}
		e.preventDefault();

	});

	function validateEmail(sEmail) {
		var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if (filter.test(sEmail)) {
		return true;
		}
		else {
		return false;
		}
   }

   function isNumber(n) {
  	return !isNaN(parseFloat(n)) && isFinite(n);
	}


</script>