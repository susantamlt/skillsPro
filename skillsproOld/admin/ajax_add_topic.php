<?php include 'top.php';
      $topic_name=$_POST['topic_name'];
      $partner_id=$_POST['partner_id'];
      $mode=$_POST['mode'];
      $topic_id=$_POST['topic_id'];

      if($mode=='')
      	$sql_add_topic="INSERT INTO dt_topics SET topic_name='$topic_name',created_by='P',created_id='$partner_id'";
      else
      	$sql_add_topic="UPDATE dt_topics SET topic_name='$topic_name',created_by='P',created_id='$partner_id' WHERE topic_id='$topic_id'";

      q($sql_add_topic);

      if(!mysql_error()){
      	$result=1;
      }else{
      	$result=0;
      }

      $ret_arr=array('result'=>$result);
      echo json_encode($ret_arr);
