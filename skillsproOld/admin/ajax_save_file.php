<?php include 'top.php';
      $topic_id=$_POST['topic_id'];
      $course_id=$_POST['course_id'];
      $chapter_id=$_POST['chapter_id'];
      $library_file_title=$_POST['library_file_title'];
      $object_id=$_POST['object_id'];
      $uploaded_file_name=$_POST['uploaded_file_name'];
      $url_of_the_object=$_POST['url_of_the_object'];
      if($object_id==13)
            $twitter_hashtag=$url_of_the_object;
      else
            $twitter_hashtag='';
      $minimum_time_to_spent=$_POST['minimum_time_to_spent'];
      $point_secured=$_POST['point_secured'];
	  $created_by=$_POST['created_by'];
	  $created_id=$_POST['created_id'];
      //echo "INSERT INTO dt_elibrary SET topic_id='$topic_id',course_id='$course_id',doc_file='$doc_file',img_file='$img_file',video_url='$video_url',created_by='$created_by',created_id='$created_id'";
	$library_file_id=$_POST['library_file_id'];
      $mode=$_POST['mode'];
      if($mode!='edit'){  
      mysql_query("INSERT INTO dt_elibrary SET topic_id='$topic_id',course_id='$course_id',chapter_id='$chapter_id',library_file_title='$library_file_title',uploaded_file_name='$uploaded_file_name',url_of_the_object='$url_of_the_object',minimum_time_to_spent='$minimum_time_to_spent',point_secured='$point_secured',object_id='$object_id',twitter_hashtag='$twitter_hashtag',created_by='$created_by',created_id='$created_id'");
      }else{

       mysql_query("UPDATE dt_elibrary SET topic_id='$topic_id',course_id='$course_id',chapter_id='$chapter_id',library_file_title='$library_file_title',uploaded_file_name='$uploaded_file_name',url_of_the_object='$url_of_the_object',minimum_time_to_spent='$minimum_time_to_spent',point_secured='$point_secured',object_id='$object_id',twitter_hashtag='$twitter_hashtag',created_by='$created_by',created_id='$created_id' WHERE library_file_id='$library_file_id'");     

      }
      if(!mysql_error()){
      	$result=1;
            

      }else{
      	$result=0;
      }

      $ret_arr=array('result'=>$result);
      echo json_encode($ret_arr);