<?php  include 'top.php';

        $partner_id=$_POST['partner_id'];
        
		$teacher_first_name=$_POST['teacher_first_name'];
		$teacher_last_name=$_POST['teacher_last_name'];
		$teacher_email=$_POST['teacher_email'];
		$teacher_address_1=$_POST['teacher_address_1'];
		$teacher_address_2=$_POST['teacher_address_2'];
		$teacher_state=$_POST['teacher_state'];
		$teacher_zip=$_POST['teacher_zip'];
		$teacher_phone=$_POST['teacher_phone'];
		$teacher_id=$_POST['teacher_id'];
		$course_id=$_POST['course_id'];
		
		if($teacher_id=='')
			$sql_add_student="INSERT INTO dt_teachers SET partner_id='$partner_id',teacher_first_name='".addslashes($teacher_first_name)."',teacher_last_name='".addslashes($teacher_last_name)."',teacher_email='$teacher_email',teacher_address_1='".addslashes($teacher_address_1)."',teacher_address_2='".addslashes($teacher_address_2)."',teacher_state='$teacher_state',teacher_zip='$teacher_zip',teacher_phone='$teacher_phone',teacher_date_of_regsitration=now(),course_id='$course_id'";
		else
			$sql_add_student="UPDATE dt_teachers SET partner_id='$partner_id',teacher_first_name='".addslashes($teacher_first_name)."',teacher_last_name='".addslashes($teacher_last_name)."',teacher_email='$teacher_email',teacher_address_1='".addslashes($teacher_address_1)."',teacher_address_2='".addslashes($teacher_address_2)."',teacher_state='$teacher_state',teacher_zip='$teacher_zip',teacher_phone='$teacher_phone',course_id='$course_id' WHERE teacher_id='$teacher_id'";

		
		q($sql_add_student);
		if(!mysql_error()){
			if($teacher_id==''){
				$teacher_id=iid();
				$f_partner=f(q("SELECT partner_code FROM dt_partners WHERE partner_id='$partner_id'"));
     			$partner_code=$f_partner['partner_code'];
     			
     			// $batch_code=$partner_code.'-'.$class_type.'-'.$batch_type.'-'.str_pad($batch_id, 4, "0", STR_PAD_LEFT);
				$teacher_code='EV/ST/'.$partner_code.'/16/'.str_pad($teacher_id, 6, "0", STR_PAD_LEFT);
				$pass=rand(10000,99999);
				
				$rs_course=q("SELECT * FROM dt_teacher_course WHERE teacher_id='$teacher_id' AND course_id='$course_id'");
				if(nr($rs_course)==0){
					$f_chapters=f(q("SELECT chapter_id FROM dt_courses WHERE course_id='$course_id'"));
					$chapters=$f_chapters['chapter_id'];
					$chapters_arr=explode('~',$chapters);
					$chapters=implode(',',$chapters_arr);
					//echo "INSERT INTO dt_teacher_course SET teacher_id='$teacher_id',course_id='$course_id',chapters='$chapters'";
						
					q("UPDATE dt_teachers SET teacher_code='$teacher_code',teacher_password='".md5($pass)."' WHERE teacher_id='$teacher_id'");
					
					$msg="Hi ".$teacher_first_name."\r\n";
					$msg.="\r\n";
					$msg.="Thank you for registering with us :".$f_class['class_name']."\r\n";
					$msg.="Your username is your email and password is :".$pass."\r\n";
					$msg.="Please verify your email by clicking the below before logging in"."\r\n";
					$msg.=WEBDIR.ROOT.'teachers/verify.php?code='.base64_encode($teacher_email.'-'.$partner_id);
					$headers = "From: info@midclassified.com" . "\r\n" . "CC: mr.anupamroy@gmail.com";
					mail($teacher_email,"Thank you for registering with Us",$msg,$headers);
				}
				
			}
			$result=1;
		}else{
			$result=0;
		}

		$ret_arr=array('result'=>$result);
		echo json_encode($ret_arr);

