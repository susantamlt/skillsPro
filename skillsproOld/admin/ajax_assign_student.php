<?php include 'top.php';
      $student_id=$_POST['student_id'];
      $course_id=$_POST['course_id'];
      q("INSERT INTO dt_student_course SET student_id='$student_id',course_id='$course_id'");
      if(!mysql_error()){
      	$result=1;
      }else{
      	$result=0;
      }

      $ret_arr=array('result'=>$result);
      echo json_encode($ret_arr);
