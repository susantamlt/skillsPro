<!DOCTYPE html>
<html>
<head>
<title>Skills Pro Portal Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Admin Login" />

<!-- Custom Theme files -->
<link href="<?php echo config_item('asset_url');?>login/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo config_item('asset_url');?>login/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo config_item('asset_url');?>login/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- //web font -->
</head>
<body>
<h1>Skills Pro Portal Admin</h1>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<h2>Admin Login</h2>
			<div class="alert alert-danger" id="error" style="display: none"></div>
			<form action="#" method="post">
				<div class="form-sub-w3">
					<input type="text" name="Username" autocomplete="off" id="username" placeholder="Customer number or username " required="" />
				<div class="icon-w3">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
				</div>
				<div class="form-sub-w3">
					<input type="password" id="password" autocomplete="off" name="Password" placeholder="Password" required="" />
				<div class="icon-w3">
					<i class="fa fa-unlock-alt" aria-hidden="true"></i>
				</div>
				</div>
				
				
				<div class="submit-w3l">
					<input type="submit" id="btn_submit" value="Login">
				</div>
			</form>
		</div>
<!--//form-ends-here-->
</div>

<!-- copyright -->
	<div class="copyright w3-agile">
		<p> © 2018 Skills Pro All rights reserved </p>
	</div>
	<!-- //copyright --> 
	<script type="text/javascript" src="<?php echo config_item('asset_url');?>login/js/jquery-2.1.4.min.js"></script>
	<!-- pop-up-box -->  
		<script src="<?php echo config_item('asset_url');?>login/js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
	<script type="text/javascript">
		
		$("#btn_submit").click(function(e){
			var username=$("#username").val();
			var password=$("#password").val();
			var valid=1;
			if(username=='' && valid==1){
				$("#error").show();
				$("#error").text('Please enter username');
				valid=0;
			}
			if(password=='' && valid==1){
				$("#error").show();
				$("#error").text('Please enter password');
				valid=0;
			}

			if(valid==1){
				$.ajax({
					url:"<?php echo config_item('base_url');?><?php echo config_item('index_page');?>/admin/login/sign_in",
					type:"POST",
					data:{"username":username,"password":password},
					dataType:"json",
					success:function(data){
						
						if(data.result==1){

							window.location="<?php echo config_item('base_url');?><?php echo config_item('index_page');?>/admin/dashboard";
						}else{
							$("#error").text("Username/Password doesn't match");
						}
					}
				});
			}
			e.preventDefault();
			
		});
	</script>
</body>
</html>