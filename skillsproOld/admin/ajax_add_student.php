<?php error_reporting(E_ALL);  
include 'top.php';

        $partner_id=$_POST['partner_id'];
		$student_first_name=$_POST['student_first_name'];
		$student_last_name=$_POST['student_last_name'];
		$student_email=$_POST['student_email'];
		$student_address_1=$_POST['student_address_1'];
		$student_address_2=$_POST['student_address_2'];
		$student_state=$_POST['student_state'];
		$student_zip=$_POST['student_zip'];
		$student_phone=$_POST['student_phone'];
		$student_id=$_POST['student_id'];
		$course_id=$_POST['course_id'];
		
		if($student_id=='')
			$sql_add_student="INSERT INTO dt_students SET partner_id='$partner_id',student_first_name='".addslashes($student_first_name)."',student_last_name='".addslashes($student_last_name)."',student_email='$student_email',student_address_1='".addslashes($student_address_1)."',student_address_2='".addslashes($student_address_2)."',student_state='$student_state',student_zip='$student_zip',student_phone='$student_phone',student_date_of_regsitration=now()";
		else
			$sql_add_student="UPDATE dt_students SET partner_id='$partner_id',student_first_name='".addslashes($student_first_name)."',student_last_name='".addslashes($student_last_name)."',student_email='$student_email',student_address_1='".addslashes($student_address_1)."',student_address_2='".addslashes($student_address_2)."',student_state='$student_state',student_zip='$student_zip',student_phone='$student_phone' WHERE student_id='$student_id'";
		q($sql_add_student);
		if(!mysql_error()){
			if($student_id==''){
				$student_id=iid();
				$f_partner=f(q("SELECT partner_code FROM dt_partners WHERE partner_id='$partner_id'"));
     			$partner_code=$f_partner['partner_code'];
     			
     			// $batch_code=$partner_code.'-'.$class_type.'-'.$batch_type.'-'.str_pad($batch_id, 4, "0", STR_PAD_LEFT);
				$student_code='EV/ST/'.$partner_code.'/16/'.str_pad($student_id, 6, "0", STR_PAD_LEFT);
				$pass=rand(10000,99999);
				
				$rs_course=q("SELECT * FROM dt_student_course WHERE student_id='$student_id' AND course_id='$course_id'");
				if(nr($rs_course)==0){
					$f_chapters=f(q("SELECT chapter_id FROM dt_courses WHERE course_id='$course_id'"));
					$chapters=$f_chapters['chapter_id'];
					$chapters_arr=explode('~',$chapters);
					$chapters=implode(',',$chapters_arr);
					//echo "INSERT INTO dt_student_course SET student_id='$student_id',course_id='$course_id',chapters='$chapters'";
					q("INSERT INTO dt_student_course SET student_id='$student_id',course_id='$course_id',chapters='$chapters'");
					q("UPDATE dt_students SET student_code='$student_code',student_password='".md5($pass)."' WHERE student_id='$student_id'");
					
					$msg="Hi ".$student_first_name."\r\n";
					$msg.="\r\n";
					$msg.="Thank you for registering with us :".$f_class['class_name']."\r\n";
					$msg.="Your username is your email and password is :".$pass."\r\n";
					$msg.="Please verify your email by clicking the below before logging in"."\r\n";
					$msg.=WEBDIR.ROOT.'students/verify.php?code='.base64_encode($student_email.'-'.$partner_id);
					$headers = "From: E-Vidya Admin" . "\r\n" . "CC: mr.anupamroy@gmail.com";
					mail($student_email,"Thank you for registering with Us",$msg,$headers);
				}
				
			}
			$result=1;
		}else{
			$result=0;
		}

		$ret_arr=array('result'=>$result);
		echo json_encode($ret_arr);

