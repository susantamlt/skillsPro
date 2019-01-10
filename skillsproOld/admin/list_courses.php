<?php include 'header.php';
	$rs_chapters=q("SELECT * FROM dt_courses a INNER JOIN dt_topics b ON a.topic_id=b.topic_id INNER JOIN dt_centers c ON a.center_id=c.center_id  WHERE a.created_by='P' AND a.created_id='".$_SESSION['partner_id']."'");


?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">List Courses </h3>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>#</th>
								<th>Course Name</th>
								<th>Topic Name</th>
								<th>Center Name</th>
								<th>Action</th>
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_chapters=f($rs_chapters)){?>
							  <tr id="row_id_<?php echo $i;?>">
								<th scope="row"><?php echo $i;?></th>
								<td><?php echo $f_chapters['course_name'];?></td>
								<td><?php echo $f_chapters['topic_name'];?></td>
								<td><?php echo $f_chapters['center_name'];?></td>
								<td><a href="add_course.php?mode=edit&course_id=<?php echo $f_chapters['course_id'];?>">Edit</a>
								&nbsp;|&nbsp;
								<a href="javascript:void(0)" data-row_id="<?php echo $i;?>" onclick="delete_partner_course(this,'<?php echo $f_chapters['course_id'];?>')">Delete</a></td>
							  </tr>
							  <?php 
							  $i++;
							  } ?>
							</tbody>
						  </table>
						</div>
			</div>	
		</div>
	  </div>
<?php include 'footer.php';?>
<?php include '../phpjs/partners/course_js.php';?>	  

