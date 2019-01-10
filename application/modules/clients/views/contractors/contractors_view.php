<section class="content">
			<input type="hidden" name="page" id="page" value="contractors" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>View Constractors</h2>
							</div>
							<div class="body">
								<fieldset>
									<legend> Contractor Information </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Contractor Name: </label>
										<div class="col-md-4"><?php echo $contractors[0]['contractor_name']; ?></div>
										
										<label class="col-md-2"> Contractors created Date: </label>
										<div class="col-md-4"><?php echo date('jS M Y',strtotime($contractors[0]['cons_date'])); ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Requirments Name: </label>
										<div class="col-md-4"><?php echo $contractors[0]['prospect_title']; ?></div>
										
										<label class="col-md-2"> Source: </label>
										<div class="col-md-4"><?php echo $contractors[0]['prospect_source']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Primary Email-ID: </label>
										<div class="col-md-4"><?php echo $contractors[0]['prospect_email_1']; ?></div>
										
										<label class="col-md-2"> Secoundary Email-ID: </label>
										<div class="col-md-4"><?php echo $contractors[0]['prospect_email_2']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Phone No 1: </label>
										<div class="col-md-4"><?php echo $contractors[0]['prospect_phone_1']; ?></div>
										
										<label class="col-md-2"> Phone No 2: </label>
										<div class="col-md-4"><?php echo $contractors[0]['prospect_phone_2']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Phone No 3: </label>
										<div class="col-md-4"><?php echo $contractors[0]['prospect_phone_3']; ?></div>
										<label class="col-md-2"> Expected Date of Close: </label>
										<div class="col-md-4"><?php echo $contractors[0]['expected_date_of_closure']; ?></div>

									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> No of Requirement Fullfilled: </label>
										<div class="col-md-4"><?php echo $contractors[0]['no_requirement_fullfilled']; ?></div>
										<label class="col-md-2"> Interview Date: </label>
										<div class="col-md-4"><?php echo $contractors[0]['interview_date']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Interview Time: </label>
										<div class="col-md-4"><?php echo $contractors[0]['interview_time']; ?></div>
									</div>
								</fieldset>
								<fieldset>
									<legend> Contractor Timesheet </legend>
									<div class="">
										<table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
		                                  <thead>
		                                    <tr>
		                                      <th style="width:18px" class="sorting-disabled">
		                                        <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
		                                        <label for="checkbox-1-0"></label>
		                                      </th>
		                                      <th title="Name"> Day </th>
		                                      <th title="Name"> Date </th>
		                                      <th title="Date"> Working Hours </th>
		                                      <th title="Action"> <a href="<?php echo base_url('clients/contractors/contractors_timesheet_add'); ?>" title="Add Record" data-toggle="tooltip"><i class="glyphicon glyphicon-plus"></i></a> </th>
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
									</div>
								</fieldset>
								<div class="form-group" style="clear:both;">
									<div class="col-md-12">
					                    <input type="hidden" name="contractor_id" id="contractor_id" value="<?php echo $contractors[0]['contractor_id'];?>">
					                    <input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo $contractors[0]['requirement_id'];?>">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['clients_user_id']; ?>">
										<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['clients_org_id']; ?>">
										<?php $ndata = array('requirement_id'=>$contractors[0]['requirement_id'],'contractor_id'=>$contractors[0]['contractor_id']); $this->session->set_userdata($ndata); ?>
										<a href="<?php echo site_url('clients/contractors/') ?>" class="btn btn-default" >Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<style type="text/css">
			#dataManual thead th, #dataManual thead td {vertical-align:middle;}
		</style>
		<script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
		<!-- page script -->
		<script type="text/javascript">
		  $(function () {
		    $('#dataManual').DataTable({
		      "bProcessing": true,
        	  "bServerSide": true,
		      "sAjaxSource": "<?php echo site_url('clients/contractors/contractors_timesheet_list'); ?>",
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
		          "sName": "Name",
		          "sClass": "text-center",
		          "bSearchable": false,
		          "bSortable": true,
		          "fnRender": function (oObj) {
		              return oObj;
		          }
		        },
		        {
		          "sName": "Name",
		          "sClass": "text-center",
		          "bSearchable": false,
		          "bSortable": true,
		          "fnRender": function (oObj) {
		              return oObj;
		          }
		        },
		        {
		          "sName": "Name",
		          "sClass": "text-center",
		          "bSearchable": false,
		          "bSortable": true,
		          "fnRender": function (oObj) {
		              return oObj;
		          }
		        },
		        {
		          "sName": "Action",
		          "sClass": "text-center",
		          "bSearchable": false,
		          "bSortable": false,
		          "fnRender": function (oObj) {
		            return oObj;
		          }
		        }
		      ]
		    });
		  });
		</script>