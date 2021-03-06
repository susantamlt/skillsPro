<section class="content">
			<input type="hidden" name="page" id="page" value="contractors" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<title>Recruiter Portal</title>
							<div class="header" style="border-bottom:none;">
								<h2>View Constractors</h2>
								 <div class="col-md-6" style="padding:0px; float:right;">
								      <a href="javascript:void(0);" type="button" class="btn btn-primary" id="shortlist" data-id="<?php echo $contractor[0]['contractor_id'] ?>" style="float:right;border-radius:6px;">Shortlist</a>
							         </div>
							     </div>
							<div class="body">
								<div id="massage"></div>
								<fieldset>
									<legend> Contractor Information </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Contractor Name: </label>
										<div class="col-md-4"><?php echo $contractor[0]['contractor_name']; ?></div>
										
										<label class="col-md-2"> Organization Name: </label>
										<div class="col-md-4"><?php echo $contractor[0]['org_name']; ?></div>

									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Address: </label>
										<div class="col-md-4"><?php echo $contractor[0]['address']; ?></div>
										
										<label class="col-md-2"> Mobile No: </label>
										<div class="col-md-4"><?php echo $contractor[0]['mobile']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Skill Set: </label>
										<div class="col-md-4"><?php echo $contractor[0]['skillset']; ?></div>
										
										<label class="col-md-2"> Experience: </label>
										<div class="col-md-4"><?php echo $contractor[0]['experience']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">  Worked With Us: </label>
										<div class="col-md-4"><?php echo $contractor[0]['worked_with_us']; ?></div>
										
										<label class="col-md-2"> Pay Rate Range: </label>
										<div class="col-md-4"><?php echo $contractor[0]['pay_rate_range']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Current Status: </label>
										<div class="col-md-4"><?php echo $contractor[0]['current_status']; ?></div>
										
										<label class="col-md-2">Future Rating: </label>
										<div class='col-md-4'>
											<div class='starrr' id='star1'></div>
											<input type="hidden" name="future_rating" id="future_rating" class="form-control" value="<?php echo $contractor[0]['future_rating']; ?>" placeholder="" />	
										</div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">  Email ID: </label>
										<div class="col-md-4"><?php echo $contractor[0]['email_id']; ?></div>
										<label class="col-md-2">  Pay Rate Rating: </label>
										<div class="col-md-4">
											<div class='starrr' id='star2'></div>
											<input type="hidden" name="pay_rate_rating" id="pay_rate_rating" class="form-control" value="<?php echo $contractor[0]['pay_rate_rating']; ?>" placeholder="" />
										</div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Created Date: </label>
										<div class="col-md-4"><?php echo date('d/m/Y',strtotime($contractor[0]['cons_date'])); ?></div>
										<label class="col-md-2"> Experiance Rating: </label>
										<div class='col-md-4'>
											<div class='starrr' id='star3'></div>
											<input type="hidden" name="experience_rating" id="experience_rating" class="form-control" value="<?php echo $contractor[0]['experience_rating']; ?>" placeholder="" />	
										</div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">  Zip/Post Code: </label>
										<div class="col-md-4"><?php echo $contractor[0]['zip_code']; ?></div>
									</div>
								</fieldset>
								<fieldset>
									<legend> Contractor History </legend>
									<table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
	                                  <thead>
	                                    <tr>
	                                      <th style="width:18px" class="sorting-disabled">
	                                        <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
	                                        <label for="checkbox-1-0"></label>
	                                      </th>
	                                      <th title="PName">Prospect Name </th>
	                                      <th title="IName">Interview Date </th>
	                                      <th title="ITName">Interview Time </th>
	                                      <th title="CName"> Current Ststus </th>
	                                    </tr>
	                                  </thead>
	                                  <tbody>
	                                    <tr>
	                                      <td colspan="5" class="text-center">
	                                        <img src="<?php echo config_item('assets_dir');?>images/small-loader.gif">
	                                      </td>
	                                    </tr>
	                                  </tbody>
	                                </table>
								</fieldset>
								<div class="form-group" style="clear:both;">
									<div class="col-md-12">
										<input type="hidden" name="contractor_id" id="contractor_id" value="<?php echo $contractor[0]['contractor_id']; ?>">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['recruiter_user_id']; ?>">
										<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['recruiter_org_id']; ?>">
									<div class="btn-group btn-group-lg">
										<a href="<?php echo base_url('recruiter/contractors') ?>" type="button" class="btn btn-danger"style="border-radius:5px"> Back</a> 
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo config_item('assets_dir');?>css/starrr.css" />
		<script src="<?php echo config_item('assets_dir');?>js/starrr.js"></script>
		<script type="text/javascript">
			$('#star1').starrr({
				change: function(e, value){
					if (value) {
						$('#future_rating').val(value);
					} else {
						$('#future_rating').val('');
					}
				}
			});
			$('#star2').starrr({
				change: function(e, value){
					if (value) {
						$('#pay_rate_rating').val(value);
					} else {
						$('#pay_rate_rating').val('');
					}
				}
			});
			$('#star3').starrr({
				change: function(e, value){
					if (value) {
						$('#experience_rating').val(value);
					} else {
						$('#experience_rating').val('');
					}
				}
			});
			$(document).ready(function(){
				var futRat = $('#future_rating').val();
				var payRat = $('#pay_rate_rating').val();
				var expRat = $('#experience_rating').val();
				if(futRat > 0){for (var i = 1; i <= futRat; i++) {$('#star1 > .star-'+i).removeClass('fa-star-o fa').addClass('fa-star fa');}}
				if(payRat > 0){for (var i = 1; i <= payRat; i++) {$('#star2 > .star-'+i).removeClass('fa-star-o fa').addClass('fa-star fa');}}
				if(expRat > 0){for (var i = 1; i <= expRat; i++) {$('#star3 > .star-'+i).removeClass('fa-star-o fa').addClass('fa-star fa');}}
			});
			$("#star1").on("mouseout",function(e){
				var futRat = $('#future_rating').val();
				$("#star1").trigger('click');
				if(futRat > 0){for (var i = 1; i <= futRat; i++) {$('#star1 > .star-'+i).removeClass('fa-star-o fa').addClass('fa-star fa');}}
			})
			$("#star2").on("mouseout",function(e){
				var payRat = $('#pay_rate_rating').val();
				
				if(payRat > 0){for (var i = 1; i <= payRat; i++) {$('#star2 > .star-'+i).removeClass('fa-star-o fa').addClass('fa-star fa');}}
				
			});
			$("#star3").on("mouseout",function(e){
				var expRat = $('#experience_rating').val();
				if(expRat > 0){for (var i = 1; i <= expRat; i++) {$('#star3 > .star-'+i).removeClass('fa-star-o fa').addClass('fa-star fa');}}
			});
		</script>
		<script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
		<!-- page script -->
		<script type="text/javascript">
		  $(function () {
		    $('#dataManual').DataTable({
		      "bServerSide": true,
		      "sAjaxSource": "<?php echo site_url('recruiter/contractors/contractors_viewList'); ?>/<?php echo $contractor[0]['contractor_id']; ?>",
		      "sServerMethod": "POST",
		      "sPaginationType": "full_numbers",
		      "iDisplayLength": 10,
		      "aoColumns": [
		        {
		          "sName": "ID",
		          "bSearchable": false,
		          "bSortable": false,
		          "fnRender": function (oObj) {
		            return oObj;
		          }
		        },
		        {
		          "sName": "PName",
		          "sClass": "text-center",
		          "bSearchable": false,
		          "bSortable": true,
		          "fnRender": function (oObj) {
		              return oObj;
		          }
		        },
		         {
		          "sName": "IName",
		          "sClass": "text-center",
		          "bSearchable": false,
		          "bSortable": true,
		          "fnRender": function (oObj) {
		              return oObj;
		          }
		        },
		         {
		          "sName": "ITName",
		          "sClass": "text-center",
		          "bSearchable": false,
		          "bSortable": true,
		          "fnRender": function (oObj) {
		              return oObj;
		          }
		        },
		        {
		          "sName": "CName",
		          "sClass": "text-center",
		          "bSearchable": false,
		          "bSortable": true,
		          "fnRender": function (oObj) {
		            return oObj;
		          }
		        }
		      ],
		      "aaSorting":[[2,'desc']]
		    });
		  });
		</script>
   <script type='text/javascript' language='javascript'>
			$(document).on('click','#shortlist',function(){
				var formData = new FormData();
				formData.append('contractor_id', $(this).attr('data-id'));
				$.ajax({
					url: "<?php echo base_url('recruiter/contractors/shortlist_contractor_save'); ?>",
					type: "POST",
					async:false,
					cache:false,
					contentType:false,
					enctype:'multipart/form-data',
					processData:false,
					data: formData,
					success: function(res) {
						var resD = $.parseJSON(res);
						if(resD.status=='1'){
							var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Contractors Shortlisted</div>';
							$('#massage').html(html);
						} else { 
							var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong>Already assign for Interview</div>';
							$('#massage').html(html);
						}
					}
				});
			});
		</script>