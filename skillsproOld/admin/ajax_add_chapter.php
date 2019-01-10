<?php include 'top.php';
      $chapter_name=$_POST['chapter_name'];
      $partner_id=$_POST['partner_id'];
      $mode=$_POST['mode'];
      $chapter_id=$_POST['chapter_id'];
      $topic_id=$_POST['topic_id'];
      $chapter_price=$_POST['chapter_price'];
      $currency=$_POST['currency'];
      $chapter_pic=$_POST['chapter_pic'];

      if($mode=='')
      	$sql_add_chapter="INSERT INTO dt_chapters SET chapter_name='$chapter_name',chapter_pic='$chapter_pic',topic_id='$topic_id',chapter_price='$chapter_price',currency='$currency',chapter_created_by='P',created_id='$partner_id'";
      else
      	$sql_add_chapter="UPDATE dt_chapters SET chapter_name='$chapter_name',chapter_pic='$chapter_pic',topic_id='$topic_id',chapter_price='$chapter_price',currency='$currency',chapter_created_by='P',created_id='$partner_id' WHERE chapter_id='$chapter_id'";

      q($sql_add_chapter);

      if(!mysql_error()){
      	$result=1;
      }else{
      	$result=0;
      }

      $ret_arr=array('result'=>$result);
      echo json_encode($ret_arr);
