<?php include 'header_main.php';?>
<!-- banner -->
  <div class="courses_banner">
  	<div class="container">
  		<h3>Login</h3>
  		<p class="description">
             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.html">Home</a></li>
                <li class="current-page">Login</li>
            </ul>
        </div>
  	</div>
  </div>
    <!-- //banner -->
	<div class="courses_box1">
	   <div class="container">
	   	  <form class="login">
	    	<p class="lead">Welcome Back!</p>
			<p class="alert alert-danger" id="error" style="display:none"></p>
		    <div class="form-group">
			    <input autocomplete="off" type="text" name="email" id="email" class="required form-control" placeholder="Username">
		    </div>
		    <div class="form-group">
			    <input autocomplete="off" type="password" class="password required form-control" placeholder="Password" name="password" id="password">
		    </div>
		    <div class="form-group">
		    	
		    	<input type="submit" class="btn btn-primary btn-lg1 btn-block" name="submit" id="btn_submit" value="Log In">
		    </div>
	        <p>Don not have an account? <a href="register.php" title="Sign Up">Sign Up</a></p>
		 </form>
	   </div>
	</div>
  <?php include 'footer_main.php';?>
  <?php include 'phpjs/login_js.php';?>