<?php include 'top.php';
$online_test_name=$_POST['online_test_name'];
$topic_id=$_POST['topic_id'];
$course_id=$_POST['course_id'];
$number_of_questions=$_POST['number_of_questions'];
$time_duration_hours=$_POST['time_duration_hours'];
$time_duration_minutes=$_POST['time_duration_minutes'];
$online_test_type=$_POST['online_test_type'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$online_test_level=$_POST['online_test_level'];
$online_test_id=$_POST['online_test_id'];
$question_assignment = $_POST['question_assignment'];

$valid=0;

$s_arr=explode('/',$start_date);
$start_date=$s_arr[2].'-'.$s_arr[1].'-'.$s_arr[0];

$e_arr=explode('/',$end_date);
$end_date=$e_arr[2].'-'.$e_arr[1].'-'.$e_arr[0];
//echo "INSERT INTO dt_online_test SET online_test_name='$online_test_name',online_test_type='$online_test_type',course_id='$course_id',topic_id='$topic_id',number_of_questions='$number_of_questions',time_duration_hours='$time_duration_hours',time_duration_minutes='$time_duration_minutes',start_date='$start_date',end_date='$end_date',online_test_level='$online_test_level'";
if($online_test_id=='')
	q("INSERT INTO dt_online_test SET online_test_name='$online_test_name',online_test_type='$online_test_type',course_id='$course_id',topic_id='$topic_id',number_of_questions='$number_of_questions',time_duration_hours='$time_duration_hours',time_duration_minutes='$time_duration_minutes',start_date='$start_date',end_date='$end_date',online_test_level='$online_test_level',question_assignment='$question_assignment'");
else
	q("UPDATE dt_online_test SET online_test_name='$online_test_name',online_test_type='$online_test_type',course_id='$course_id',topic_id='$topic_id',number_of_questions='$number_of_questions',time_duration_hours='$time_duration_hours',time_duration_minutes='$time_duration_minutes',start_date='$start_date',end_date='$end_date',online_test_level='$online_test_level',question_assignment='$question_assignment' WHERE online_test_id='$online_test_id'");
if(!mysql_error()){
	if($online_test_id==''){
		$result=1;
		$exam_id=iid();
	} else{
		$result=1;
		$exam_id=$online_test_id;
	}
}else{
	$result=0;
}

$ret_arr=array('result'=>$result,'exam_id'=>$exam_id);

echo json_encode($ret_arr);