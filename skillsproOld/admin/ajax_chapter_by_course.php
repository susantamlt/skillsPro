<?php include 'top.php';
      $course_id=$_POST['course_id'];

      echo $sql_chapter="SELECT chapter_id FROM dt_courses WHERE course_id='$course_id'";
      $options="<option value=''>Select Chapter</option>";

      $f_chapter=f(q($sql_chapter));
      $chapter_id_arr=explode('~',$f_chapter['chapter_id']);
      foreach ($chapter_id_arr as $key => $value) {
      	$sql_chapter="SELECT * FROM dt_chapters WHERE chapter_id='$value'";
      	$f_chapter=f(q($sql_chapter));
      	$options.="<option value='".$f_chapter['chapter_id']."'>".$f_chapter['chapter_name']."</option>";
      }

      echo $options;