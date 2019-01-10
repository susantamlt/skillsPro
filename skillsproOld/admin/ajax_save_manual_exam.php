<?php include 'top.php';
      $exam_id=$_POST['exam_id'];
      $qs=$_POST['qs'];

      $questions_arr=explode('~',$qs);

      foreach($questions_arr as $key=>$value){
      	q("INSERT INTO dt_exam_questions SET exam_id='$exam_id',question_id='$value'");
      }

      $ret_arr=array('result'=>1);

      echo json_encode($ret_arr);
