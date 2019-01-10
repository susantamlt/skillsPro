<?php include 'header.php';

?>
<div id="page-wrapper">
				<div class="grid_3 grid_5" style="margin-top:20px;">
					<h3 class="blank1">List Centers</h3>
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
								<div class="alert alert-success" style="display:none" id="success" role="alert">
												<strong>Well done!</strong> You successfully read this important alert message.
								</div>
								<div class="alert alert-danger" id="error" style="display:none" role="alert">
												<strong>Well done!</strong> You successfully read this important alert message.
								</div>
							<div class="table-responsive">
						  <table class="table">
							<thead>
							  <tr>
								<th>#</th>
								<th>Center Name</th>
								<th>Center Address</th>
								<th>Center City</th>
								<th>Center In-Charge</th>
								<th>Center Contact No.</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody>
							<?php $sql_center="SELECT * FROM dt_centers a INNER JOIN dt_city b ON a.center_city=b.city_id WHERE partner_id='".$_SESSION['partner_id']."'";
							      $rs_center=q($sql_center);
							      $i=1;
							      while($f_center=f($rs_center)){
							?>      	
							  <tr id="row_id_<?php echo $i;?>">
								<th scope="row" ><?php echo $i;?></th>
								<td><?php echo $f_center['center_name'];?></td>
								<td><?php echo $f_center['center_address'];?></td>
								<td><?php echo $f_center['city_name'];?></td>
								<td><?php echo $f_center['center_in_charge'];?></td>
								<td><?php echo $f_center['center_in_charge_contact_no'];?></td>
								<td><a href="add_centers.php?mode=edit&center_id=<?php echo $f_center['center_id'];?>">Edit</a>
								&nbsp;|&nbsp;
								<a href="javascript:void(0)" data-row_id="<?php echo $i;?>" data-center_id="<?php echo $f_center['center_id'];?>" onclick="delete_center(this,'<?php echo $f_center['center_id'];?>')">Delete</a>
								
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
					<div class="clearfix"> </div>
				</div>
			</div>
<?php include 'footer.php';?>
<?php include '../phpjs/partners/center_js.php';?>		
      