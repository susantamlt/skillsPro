<?php include 'top.php';
       function _isCurl(){
    return function_exists('curl_version');
 }

 function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}
      $partner_id=$_POST['partner_id'];
      $course_id=$_POST['course_id'];
      $class_name=$_POST['class_name'];
      $class_start_date=$_POST['start_date'];
      $class_end_date=$_POST['end_date'];
      $class_start_time=$_POST['start_time'];
      $class_end_time=$_POST['end_time'];
      $is_repeat=$_POST['is_repeated'];
      $repeated_class=$_POST['repeated_class'];

      $mode=$_POST['mode'];
      $class_id=$_POST['class_id'];
      $class_code=$_POST['class_code'];

      if($mode=='edit'){
          $liveurl="https://api.braincert.com/v2/removeclass?apikey=5nbjrlSx4dTjxoQtXc8Y";   
           $data=array(
            'cid'=>$class_code,
            
          );
          // print_r($data);
          $str_del=CallAPI('POST', $liveurl, $data);
          $class_del=json_decode($str_del); 

          if($class_del->status=='ok'){

            q("DELETE FROM dt_class WHERE class_id='$class_id'");
          }
          //exit();
      }

      $class_start_date_arr=explode('/',$class_start_date);

      $class_start_date=$class_start_date_arr[2].'-'.$class_start_date_arr[1].'-'.$class_start_date_arr[0];

      $class_end_date_arr=explode('/',$class_end_date);

      $class_end_date=$class_end_date_arr[2].'-'.$class_end_date_arr[1].'-'.$class_end_date_arr[0];

      $class_start_time=date("g:i a", strtotime($class_start_time));
      $class_end_time=date("g:i a", strtotime($class_end_time));
      /*India*/
      $timezone='33';

      q("INSERT INTO dt_class SET partner_id='$partner_id',course_id='$course_id',class_name='".addslashes($class_name)."',class_start_date='$class_start_date',class_end_date='$class_end_date',class_start_time='$class_start_time',class_end_time='$class_end_time',is_repeat='$is_repeat',repeated_on='$repeated_class'");


      if(!mysql_error()){
      	$class_id=iid();

	if(_isCurl()){

	 //$liveurl="https://api.braincert.com/v1/schedule?apikey=E53b2WzD1zTNvlB5IFig"; //Create a live class

		// //$liveurl="https://api.braincert.com/v1/getclass?apikey=E53b2WzD1zTNvlB5IFig";	

	 $liveurl="https://api.braincert.com/v2/schedule?apikey=5nbjrlSx4dTjxoQtXc8Y";		
		 $data=array(
		 	'title'=>$class_name,
		 	'timezone'=>'33',
		 	'start_time'=>$class_start_time,
		 	'end_time'=>$class_end_time,
		 	'date'=>$class_start_date,
		);
		
		// //$data=array('class_id'=>'19842');
		// //[{"start_recording_auto":"0","id":"19842","user_id":"76943","title":"Demo Class","date":"2016-06-30","start_time":"01:20 PM","end_time":"01:50 PM","timezone":"33","end_date":"0000-00-00","description":"","record":"0","ispaid":"0","currency":"usd","status":"Live","repeat":"0","weekdays":"","seat_attendees":"0","end_classes_count":"0","published":"1","timezone_id":"33","timezone_country":"Asia\/Kolkata","timezone_label":"India Standard Time","difftime":"+05:30","timezone_title":"(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi","totalrecords":"0","duration":1800,"next_class":"","label":"India Standard Time","privacy":"1"}]

		// //$data=array('class_id'=>'19842','user_id'=>'76943','userName'=>'anupamroy','isTeacher'=>1,'lessonName'=>'Demo Lesson','courseName'=>'Demo Course');
		
		 $str=CallAPI('POST', $liveurl, $data);
     
		//print_r($str);
		 $class=json_decode($str);

			if($class->class_id!=''){

			

			 q("UPDATE dt_class SET class_code='".$class->class_id."' WHERE class_id='$class_id'");
			 if(!mysql_error()){
				 $ret_array=array('result'=>1);

				 echo json_encode($ret_array);
			 }	 
           }

		//[{"id":"9490","user_id":"76943","title":"Test Class","date":"2015-10-29","start_time":"09:30 AM","end_time":"10:00 AM","timezone":"33","end_date":"0000-00-00","description":"","record":"0","ispaid":"0","currency":"usd","status":"Upcoming","duration":"1800","repeat":"0","seat_attendees":"0","end_classes_count":"0","published":"1","label":"India Standard Time","privacy":"1"}]
		

      }

    }  