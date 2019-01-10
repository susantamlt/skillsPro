<?php include "top.php";
      $options_arr=explode('~',$_POST['option']);
      foreach($options_arr as $k=>$v){
      	$opt_arr=explode('#$',$v);
      	$option=$opt_arr[0];
      	$correct_ans=$opt_arr[1];
      	echo "INSERT INTO dt_options SET question_id='".$_POST['question_id']."',option='".stripslashes($option)."',correct_ans='$correct_ans'";
      	q("INSERT INTO dt_options SET question_id='".$_POST['question_id']."',option_val='".stripslashes($option)."',correct_ans='$correct_ans'");
      	$option_id=iid();

      }
      q("UPDATE dt_questions SET is_option_added='Y' WHERE question_id='".$_POST['question_id']."'");
      $ret_arr=array('result'=>1);
      echo json_encode($ret_arr);
