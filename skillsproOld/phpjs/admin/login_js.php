<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_submit").click(function(e){
			var admin_name=$("#admin_name").val();
			var admin_pass=$("#admin_pass").val();
			var valid=1;
			
			if(admin_name=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Username");
			}
			
			if(admin_pass=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Password");
			}
			
			if(valid==1){
				$.ajax({
					type:"POST",
					url:"ajax_login.php",
					data:{"admin_name":admin_name,"admin_pass":admin_pass},
					dataType:"json",
					success:function(data){
						if(data.result==1){
							window.location="<?php echo WEBDIR.ROOT;?>admin/index.php";
						}else{
							$("#error").text("Username/admin_password doesn't match");
						}
					}
				});
			}
			e.preventDefault();
		});
	});
</script>