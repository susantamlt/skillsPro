<?php include 'header.php';
	$rs_center=q("SELECT a.*,b.partner_name,c.city_name FROM dt_centers a LEFT JOIN dt_partners b ON a.partner_id=b.partner_id LEFT JOIN dt_city c ON a.center_city=c.city_id");


?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">Basic Tables</h3>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>#</th>
								<th>Center Name</th>
								<th>Partner Name</th>
								<th>Center City</th>
								<th>Center Contact No</th>
								<th>Action</th>
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_center=f($rs_center)){?>
							  <tr>
								<th scope="row"><?php echo $i;?></th>
								<td><?php echo $f_center['center_name'];?></td>
								<td><?php echo $f_center['partner_name'];?></td>
								<td><?php echo $f_center['city_name'];?></td>
								<td><?php echo $f_center['center_contact_no'];?></td>
								<td><a href="add_centers.php?mode=edit&center_id=<?php echo $f_center['center_id'];?>">Edit</a>&nbsp;|&nbsp;<a href="list_center.php?mode=delete&center_id=<?php echo $f_center['center_id'];?>">Delete</a></td>
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

