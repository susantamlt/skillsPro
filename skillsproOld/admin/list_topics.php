<?php include 'header.php';
	$rs_topic=q("SELECT * FROM dt_topics WHERE created_by='P' and created_id='".$_SESSION['partner_id']."'");


?>
	<div id="page-wrapper">
	  <div class="graphs">
		  <h3 class="blank1">List Topics</h3>
		  <div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="alert alert-success" style="display:none" id="success" role="alert">
					<strong>Well done!</strong> You successfully read this important alert message.
				</div>
				<div class="alert alert-danger" id="error" style="display:none" role="alert">
					<strong>Well done!</strong> You successfully read this important alert message.
				</div>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Topic Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						 <?php 
						 $i=1;
						 while($f_topics=f($rs_topic)){?>
						  <tr id="row_id_<?php echo $i;?>">
							<th scope="row"><?php echo $i;?></th>
							<td><?php echo $f_topics['topic_name'];?></td>
							<td><a href="add_topic.php?mode=edit&topic_id=<?php echo $f_topics['topic_id'];?>">Edit</a>
							&nbsp;|&nbsp;
							<a href="javascript:void(0)" data-row_id="<?php echo $i;?>" onclick="delete_patner_topic(this,'<?php echo $f_topics['topic_id'];?>')">Delete</a></td>
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
<?php include '../phpjs/partners/topic_js.php';?>	  

