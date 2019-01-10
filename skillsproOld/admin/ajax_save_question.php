<?php include 'top.php';
      $topic_id=$_POST['topic_id'];
	  $course_id=$_POST['course_id'];
	  $question=$_POST['question'];
	  $question_type=$_POST['question_type'];
      $option_type=$_POST['option_type'];
	  $created_id=$_POST['created_id'];
	  $opt=$_POST['opt'];
	  $right_ans=$_POST['right-ans'];
	  $qs_likert=$_POST['qs_likert'];
	  $opt_likert_txt=$_POST['opt_likert_txt'];
	  $opt_likert_val=$_POST['opt_likert_val'];
	  $video_url=$_POST['video_url'];
	  $marks_allocated=$_POST['marks_allocated'];
	  $image_question=$_POST['image_question'];
	  $grouped_likert=$_POST['grouped_likert'];
	  if($grouped_likert=='Y')
	  {
	  	$qs_likert_arr=explode('~',$qs_likert);
	  	foreach ($qs_likert_arr as $key => $value) {
	  		q("INSERT INTO dt_question_bank SET topic_id='$topic_id',course_id='$course_id',question='".addslashes($value)."',option_type='$option_type',created_id='$created_id',created_by='P',video_url='$video_url',image_question='$image_question',marks_allocated='$marks_allocated',grouped_likert='$grouped_likert'");
	  	}
	  	
	  }else{	
		//echo "INSERT INTO dt_question_bank SET topic_id='$topic_id',course_id='$course_id',question='".addslashes($question)."',question_type='$question_type',option_type='$option_type',created_id='$created_id',created_by='P'";
	  	q("INSERT INTO dt_question_bank SET topic_id='$topic_id',course_id='$course_id',question='".addslashes($question)."',option_type='$option_type',created_id='$created_id',created_by='P',video_url='$video_url',image_question='$image_question',marks_allocated='$marks_allocated',grouped_likert='$grouped_likert'");
	  }	
	  if(!mysql_error()){
	  	$result=1;
		$question_id=iid();
		if($opt!='')
		{
			$opt_arr=explode('~',$opt);
			$right_ans_arr=explode('~',$right_ans);
			$j=0;
			for($i=0;$i<sizeof($opt_arr);$i++){
				if($opt_arr[$i]!=''){
					$j++;
					if(in_array($j,$right_ans_arr))
						$correct_ans='Y';
					else
						$correct_ans='N';	
					//echo "dt_options SET question_id='$question_id',option_val='".$opt_arr[$i]."',option_no='$j',correct_ans='$correct_ans'";	
					q("INSERT INTO dt_options SET question_id='$question_id',option_val='".$opt_arr[$i]."',option_no='$j',correct_ans='$correct_ans'");
				}	
			}
		}
		if($grouped_likert=='Y'){
			$likert_qs_arr=explode('~',$qs_likert);
			foreach($likert_qs_arr as $k=>$v){
				q("INSERT INTO dt_question_bank SET topic_id='$topic_id',course_id='$course_id',question='".addslashes($v)."',likert_group_id='$question_id',option_type='$option_type',created_id='$created_id',created_by='P'");
			
			}
		}

		if($option_type=='LIK'){
			if($opt_likert_txt!=''){
				$opt_likert_txt_arr=explode('~', $opt_likert_txt);
				$opt_likert_val_arr=explode('~',$opt_likert_val);
				foreach ($opt_likert_txt_arr as $key => $value) {
					# code...
					$j=$key+1;
					q("INSERT INTO dt_options SET question_id='$question_id',option_val='".$value."',option_no='$j',likert_option_val='".$opt_likert_val_arr[$key]."'");
				}
			}
			
		}

	  }else{
	  	$result=0;
	 }
	  $ret_arr=array('result'=>$result);

	  echo json_encode($ret_arr);