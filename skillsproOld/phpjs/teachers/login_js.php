<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_submit").click(function(e){
			var email=$("#email").val();
			var pass=$("#password").val();
			var valid=1;
			
			if(email=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Email");
			}
			
			if(pass=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Password");
			}
			
			if(valid==1){
				$.ajax({
					type:"POST",
					url:"ajax_login.php",
					data:{"email":email,"password":pass},
					dataType:"json",
					success:function(data){
						if(data.result==1){
							window.location="<?php echo WEBDIR.ROOT;?>teachers/index.php";
						}else{
							$("#error").text("Username/Password doesn't match");
						}
					}
				});
			}
			e.preventDefault();
		});
	});
</script>