<?php include 'top.php';
      session_start(); 
	  $partner_email=$_POST['partner_email'];
	  $partner_pass=$_POST['partner_pass'];
	  //echo md5($admin_pass);
      $sql_user="SELECT partner_id,partner_name FROM dt_partners WHERE partner_email='$partner_email'";
	  $result_user=q($sql_user);
	  if(nr($result_user)>0){
	  	$f_user=f($result_user);
		$partner_id=$f_user['partner_id'];
		$partner_email=$f_user['partner_email'];
		
		$sql_check_pass="SELECT partner_id FROM dt_partners WHERE partner_pass='".md5($partner_pass)."' and partner_id='$partner_id'";
		$result_check_pass=q($sql_check_pass);
		if(nr($result_check_pass)>0){
			$_SESSION['partner_id']=$partner_id;
			$_SESSION['partner_name']=$f_user['partner_name'];
			
			$ret_arr=array('result'=>1);
		}else{
			$ret_arr=array('result'=>0);
		}
		
		
	  }else{
	  	$ret_arr=array('result'=>0);
	  }
	   echo json_encode($ret_arr);
 