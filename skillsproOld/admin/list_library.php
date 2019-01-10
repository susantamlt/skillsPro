<?php include 'header.php';
	
	$rs_library=q("SELECT * FROM dt_elibrary a INNER JOIN dt_objects b ON a.object_id=b.object_id WHERE created_id='".$_SESSION['partner_id']."' AND created_by='P' ");

	


?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">List Library

			</h3>
			
			<div class="clearfix"></div>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>#</th>
								<th>Document Title</th>
								<th>Document Type</th>
								<th>Action</th>
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_library=f($rs_library)){?>
							  <tr>
								<td scope="row"><?php echo $i;?></th>
								<td style="width:45%"><?php 
								if($f_library['library_file_title']!='')
									echo stripslashes($f_library['library_file_title']);
								
								?></td>
								<td><?php echo stripslashes($f_library['object_name']);?></td>
								<td><a href="add_library.php?mode=edit&library_file_id=<?php echo $f_library['library_file_id'];?>">Edit</a>&nbsp;|&nbsp;<a href="list_library.php?mode=delete&library_file_id=<?php echo $f_library['library_file_id'];?>">Delete</a>&nbsp;|&nbsp;
							   	<!--/*<a href="assign_student_to_course.php?teacher_id=<?php echo $f_library['teacher_id'];?>">Assign Course</a>*/-->
								</td>
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
<?php include '../phpjs/partners/library_js.php';?>	  

