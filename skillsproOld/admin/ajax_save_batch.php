<?php include 'top.php';
     $batch_type=$_POST['batch_type'];
     $center_id=$_POST['center_id'];
     $course_id=$_POST['course_id'];
     $batch_code_prefix=$_POST['batch_code_prefix'];
     $batch_start_time=$_POST['batch_start_time'];
     $batch_end_time=$_POST['batch_end_time'];
     $class_type=$_POST['class_type'];
     $start_date=$_POST['start_date'];
     $end_date=$_POST['end_date'];
     $partner_id=$_POST['partner_id'];

     $start_date_arr=explode('/',$start_date);
     $s_date=$start_date_arr[2].'-'.$start_date_arr[1].'-'.$start_date_arr[0];

     $end_date_arr=explode('/',$end_date);
     $e_date=$end_date_arr[2].'-'.$end_date_arr[1].'-'.$end_date_arr[0];

     //echo "INSERT INTO dt_batch SET center_id='$center_id',course_id='$course_id',partner_id='$partner_id',class_type='$class_type',batch_type='$batch_type',batch_start_date='$s_date',batch_end_date='$e_date',batch_start_time='$batch_start_time',batch_end_time='$batch_end_time'";
     q("INSERT INTO dt_batch SET center_id='$center_id',course_id='$course_id',partner_id='$partner_id',class_type='$class_type',batch_type='$batch_type',batch_start_date='$s_date',batch_end_date='$e_date',batch_start_time='$batch_start_time',batch_end_time='$batch_end_time'");
     if(!mysql_error()){
     	$batch_id=iid();
     	$f_partner=f(q("SELECT partner_code FROM dt_partners WHERE partner_id='$partner_id'"));
     	$partner_code=$f_partner['partner_code'];
     	$batch_code=$partner_code.'-'.$class_type.'-'.$batch_type.'-'.str_pad($batch_id, 4, "0", STR_PAD_LEFT);
     	q("UPDATE dt_batch SET batch_code='$batch_code' WHERE batch_id='$batch_id'");
     	$ret_arr=array('result'=>1);
     }else{
     	$ret_arr=array('result'=>0);
     }

     echo json_encode($ret_arr);