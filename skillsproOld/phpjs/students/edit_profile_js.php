<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_submit").click(function(e){
			var sid=$("#student_id").val();
			var fname=$("#fname").val();
			var lname=$("#lname").val();
			var email=$("#email").val();
			var address=$("#address").val();
			var address2=$("#address2").val();
			var state=$("#state").val();
			var country=$("#country").val();
			var zip=$("#zip").val();
			var phone=$("#phone").val();
			var mobile=$("#mobile").val();
			var valid=1;
			
			if(fname=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter First Name");
			}
			
			if(lname=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Last name");
			}

			if(email=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Email");
			}
			
			if(address=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter address");
			}

			if(address2=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter address 2");
			}

			if(state=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter State");
			}
			
			if(country=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Country");
			}

			if(zip=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Zip code");
			}

			if(phone=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Phne no");
			}

			if(mobile=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter mobile no");
			}

			
			if(valid==1){
				$.ajax({
					type:"POST",
					url:"<?php echo WEBDIR.ROOT;?>students/ajax_edit_profile.php",
					data:{"sid":sid,"fname":fname,"lname":lname,"email":email,"address":address,"address2":address2,"state":state,"country":country,"zip":zip,"phone":phone,"mobile":mobile},
					dataType:"json",
					success:function(data){
						if(data.result==1){
							window.location="<?php echo WEBDIR.ROOT;?>students/profile.php";
						}else{
							$("#error").text("Profile not updated");
						}
					}
				});
			}
			e.preventDefault();
		});
	});
</script>