<?php include 'top.php';
	  error_reporting(E_ALL);
	  $course_name=$_POST['course_name'];
	  $topic_id=$_POST['topic_id'];
	  $center_id=$_POST['center_id'];
	  $chapter_id=$_POST['chapter_id'];
	  $city_id=$_POST['city_id'];
	  $course_mode=$_POST['course_mode'];
	  $course_description=$_POST['course_description'];
	  $course_preview_video=$_POST['course_preview_video'];
	  $start_date=DateTime::createFromFormat('d/m/Y', $_POST['start_date'])->format('Y-m-d');
	  $end_date= DateTime::createFromFormat('d/m/Y', $_POST['end_date'])->format('Y-m-d');
	  $course_id=$_POST['course_id'];
	  $partner_id=$_POST['partner_id'];
	  $course_pic=$_POST['course_pic'];
	  $created_by='P';
	  //echo $course_id."course_id";die;
	  if($course_id == ''){
			$sql_course_add="INSERT INTO dt_courses SET course_name='$course_name',topic_id='$topic_id',is_online_classroom='$course_mode',chapter_id='$chapter_id',center_id='$center_id',city_id='$city_id',created_by='$created_by',created_id='$partner_id',course_description='".addslashes($course_description)."',course_preview_video='$course_preview_video',course_big_pic='$course_pic',date_from='".date('Y-m-d',strtotime($start_date))."',date_to='".date('Y-m-d',strtotime($end_date))."'";
	  }else{
			$sql_course_add="UPDATE dt_courses SET course_name='$course_name',topic_id='$topic_id',is_online_classroom='$course_mode',chapter_id='$chapter_id',center_id='$center_id',city_id='$city_id',created_by='$created_by',created_id='$partner_id',course_description='".addslashes($course_description)."',course_preview_video='$course_preview_video',course_big_pic='$course_pic',date_from='".date('Y-m-d',strtotime($start_date))."',date_to='".date('Y-m-d',strtotime($end_date))."' where course_id='".$course_id."'";	
	  }
	  
	  $rs_course_add=q($sql_course_add);
	  if(!mysql_error()){
			$result=1;
	  }else{
			$result=0;
	  }
	  $ret_arr=array('result'=>$result);
	  echo json_encode($ret_arr);