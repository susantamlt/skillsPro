<?php include 'top.php';
   $topic_id=$_POST['topic_id'];
   $partner_id=$_POST['partner_id'];

   $sql_course="SELECT * FROM dt_courses WHERE topic_id='$topic_id' AND created_id='$partner_id'";
   $rs_course=q($sql_course);
?>
 <option value="">Select Course</option>
<?php
   while($f_course=f($rs_course)){
?>
 <option value="<?php echo $f_course['course_id'];?>"><?php echo $f_course['course_name'];?></option>	
 
<?php } ?>