<?php include 'header.php';

	$rs_question=q("SELECT * from dt_question_bank a LEFT JOIN dt_topics b ON a.topic_id=b.topic_id LEFT JOIN dt_courses c ON a.course_id=c.course_id WHERE a.created_by='P' and a.created_id='".$_SESSION['partner_id']."'");


?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">List Questions

			</h3>
			
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>#</th>
								<th>Question</th>
								<th>Course</th>
								<th>Action</th>
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_question=f($rs_question)){?>
							  <tr>
								<td scope="row"><?php echo $i;?></th>
								<td style="width:45%"><?php echo stripslashes($f_question['question']);?></td>
								<td><?php echo stripslashes($f_question['course_name']);?></td>
								<td><a href="add_questions.php?mode=edit&question_id=<?php echo $f_question['question_id'];?>">Edit</a>&nbsp;|&nbsp;<a href="list_question.php?mode=delete&question_id=<?php echo $f_question['question_id'];?>">Delete</a>
							  
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
<?php include '../phpjs/admin/center_js.php';?>	  

