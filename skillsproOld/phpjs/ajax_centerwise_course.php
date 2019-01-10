<?php include 'top.php';
	  $center_id=$_REQUEST['center_id'];
	  $created_by=$_REQUEST['partner_id'];

	  $sql_course="SELECT * FROM dt_courses WHERE center_id='$center_id' AND created_id='$created_by' AND created_by='P'";

	  $rs_course=q($sql_course);

	  while($f_course=f($rs_course)){
?>
	<option value="<?php echo $f_course['course_id'];?>"><?php echo $f_course['course_name'];?></option>
<?php	  	

	  }

