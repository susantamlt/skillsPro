<?php include 'top.php';
      
      $students=$_POST['students'];
      $course_id=$_POST['course_id'];
      $batch_id=$_POST['batch_id'];

      $students_arr=explode('~',$students);
      $flag=1;
      foreach($students_arr as $k=>$v){
      	
      	q("INSERT INTO dt_course_batch_student SET course_id='$course_id',batch_id='$batch_id',student_id='$v'");
      	if(!mysql_error()){
      		$f_student=f(q("SELECT * FROm dt_students WHERE student_id='$v'"));
      		$f_batch=f(q("SELECT * FROM dt_batch WHERE batch_id='$batch_id'"));

      		$msg="Hi ".$f_student['student_first_name']."\r\n";
      		$msg.="\r\n";
      		$msg.="You have been allocated batch_no:".$f_batch['batch_code']."\r\n";
      		$msg.="Start Date:".$f_batch['batch_start_date']."\r\n";
      		$msg.="Batch Start Time:".$f_batch['batch_start_time']."\r\n";
      		$headers = "From: info@midclassified.com" . "\r\n" . "CC: mr.anupamroy@gmail.com";
      		mail($f_student['student_email'],"You have been allocated to a batch",$msg,$headers);
      		
      	}else{
      		$flag=0;
      		break;
      	}

      }

      if($flag==1){
      	$result=1;
      }else{
      	$result=0;
      }

      $ret_arr=array('result'=>$result);
      echo json_encode($ret_arr);

