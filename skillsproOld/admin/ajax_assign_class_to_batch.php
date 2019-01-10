<?php include 'top.php';
      
      $batches=$_POST['batches'];
      $class_id=$_POST['class_id'];
      

      $batches_arr=explode('~',$batches);
      $flag=1;
      foreach($batches_arr as $k=>$v){
      	
      	$rs_stu=q("SELECT * FROM  dt_course_batch_student a INNER JOIN dt_students b ON a.student_id=b.student_id WHERE batch_id='$v'");
      	while($f_stu=f($rs_stu)){
      		q("INSERT INTO dt_student_class SET student_id='".$f_stu['student_id']."',class_id='$class_id'");
	      	if(!mysql_error()){
	      		$f_student=f(q("SELECT * FROm dt_students WHERE student_id='".$f_stu['student_id']."'"));
	      		$f_class=f(q("SELECT * FROm dt_class WHERE class_id='$class_id'");

	      		$msg="Hi ".$f_student['student_first_name']."\r\n";
	      		$msg.="\r\n";
	      		$msg.="You have been allocated class on :".$f_class['class_name']."\r\n";
	      		$msg.="Class Start Time:".$f_class['class_start_time']."\r\n";
	      		$msg.="Class End Time:".$f_class['class_end_time']."\r\n";
	      		$headers = "From: info@midclassified.com" . "\r\n" . "CC: mr.anupamroy@gmail.com";
	      		mail($f_student['student_email'],"You have been allocated a class",$msg,$headers);
	      		
	      	}else{
	      		$flag=0;
	      		break;
	      	}
	      }	

      }

      if($flag==1){
      	$result=1;
      }else{
      	$result=0;
      }

      $ret_arr=array('result'=>$result);
      echo json_encode($ret_arr);

