<?php include 'top.php';
      $topic_id=$_POST['topic_id'];
      
      $sql_chapter="SELECT * FROM dt_chapters WHERE topic_id='$topic_id'";
      $rs_chapter=q($sql_chapter);
 ?>

 <?php while($f_chapter=f($rs_chapter)){?>
 <option value="<?php echo $f_chapter['chapter_id'];?>"><?php echo $f_chapter['chapter_name'];?></option>

 <?php  } ?>