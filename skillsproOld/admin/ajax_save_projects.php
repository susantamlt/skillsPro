<?php include 'top.php';
	  //error_reporting(E_ALL);
	  $partner_id = $_POST['partner_id'];
	  $project_id = $_POST['project_id'];
	  $type = $_POST['type'];
	  $project_name=$_POST['project_name'];
	  $topic_id=$_POST['topic_id'];
      $course_id=$_POST['course_id'];
      $project_description=$_POST['project_description'];
      $project_files=$_POST['project_files'];
      $project_video_link=$_POST['project_video_link'];
      $is_video=$_POST['is_video'];
      $created_by=$_POST['created_by'];
      //echo "INSERT INTO dt_elibrary SET topic_id='$topic_id',course_id='$course_id',doc_file='$doc_file',img_file='$img_file',video_url='$video_url',created_by='$created_by',created_id='$created_id'";
	  if($project_id == ''){
			$sql_project = "INSERT INTO dt_projects SET type='$type',topic_id='$topic_id',course_id='$course_id',project_name='$project_name',project_description='".addslashes($project_description)."',project_files='$project_files',project_video_link='$project_video_link',is_video='$is_video',created_by='$created_by',created_id='$partner_id'";
	  }else{
			$sql_project = "UPDATE dt_projects SET type='$type',topic_id='$topic_id',course_id='$course_id',project_name='$project_name',project_description='$project_description',project_files='$project_files',project_video_link='$project_video_link',is_video='$is_video',created_by='$created_by',created_id='$partner_id' WHERE project_id='$project_id'";
	  }
      q($sql_project);
	  //echo mysql_error();
      if(!mysql_error()){
      	$result=1;
      }else{
      	$result=0;
      }
      $ret_arr=array('result'=>$result);
      echo json_encode($ret_arr);