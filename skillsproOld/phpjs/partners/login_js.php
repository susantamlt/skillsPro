<script type="text/javascript">
	$(document).ready(function(){
		$("#btn_submit").click(function(e){
			var partner_email=$("#partner_email").val();
			var partner_pass=$("#partner_pass").val();
			var valid=1;
			
			if(partner_email=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Username");
			}
			
			if(partner_pass=='' && valid==1){
				valid=0;
				$("#error").show();
				$("#error").text("Please enter Password");
			}
			
			if(valid==1){
				$.ajax({
					type:"POST",
					url:"<?php echo WEBDIR.ROOT;?>admin/ajax_login.php",
					data:{"partner_email":partner_email,"partner_pass":partner_pass},
					dataType:"json",
					success:function(data){
						if(data.result==1){
							window.location="<?php echo WEBDIR.ROOT;?>admin/index.php";
						}else{
							$("#error").show();
							$("#error").text("Username/Password doesn't match");
						}
					}
				});
			}
			e.preventDefault();
		});
	});
</script>