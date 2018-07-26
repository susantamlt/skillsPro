
		<section class="content">
			<input type="hidden" name="page" id="page" value="projects" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add <?php echo $urlname; ?></h2>
							</div>
							<div class="body">
								<?php echo form_open_multipart('sales/jobs/jobsearch', array('id' =>'jobs_form','name'=>'jobs_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<fieldset>
										<legend><?php echo $urlname; ?> Opening Information </legend>
										<div class="form-group">
											<label class="col-md-2"> <?php echo $urlname; ?> Type <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('lead_type',$ljp_projectType,'','class="form-control" id="lead_type"') ?>
												<label id="lead_type-error" class="error" for="lead_type"></label>
											</div>
											<label class="col-md-2"> Country <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('country_code',$ljp_country,'','class="form-control" id="country_code"') ?>
												<label id="country_code-error" class="error" for="country_code"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> State/Province <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<input type="text" name="state_code" id="state_code" class="form-control" value="" placeholder="State/Province" />
												<label id="state_code-error" class="error" for="state_code"></label>
											</div>
											<label class="col-md-2"> City <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<input type="text" name="city_id" id="city_id" class="form-control" value="" placeholder="City" />
												<label id="city_id-error" class="error" for="city_id"></label>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
												<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
												<button type="submit" class="btn btn-success"> Search </button>
												<a href="<?php echo site_url('sales/jobs/') ?>" class="btn btn-default">Cancel</a>
											</div>
										</div>
									</fieldset>
								<?php echo form_close(); ?>
								<fieldset>
									<legend>All Jobs </legend>
									<table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
										<thead>
											<tr>
												<th style="width:18px" class="sorting-disabled">
													<input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
													<label for="checkbox-1-0"></label>
												</th>
												<th title="Job Title"> Title </th>
												<th title="Company Name"> Company </th>
												<th title="Address"> Address </th>
												<th title="language"> Language </th>
												<th title="Source"> Source </th>
												<th title="Formatted Relative Time"> FRT </th>
												<th title="Date of Job"> Date </th>
												<th title="Action"> Action </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="10" class="text-center">
													<img src="<?php echo config_item('assets_dir');?>images/small-loader.gif">
												</td>
											</tr>
										</tbody>
									</table>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
			$(function () {
				$('#dataManual').DataTable({
					"bServerSide": false,
					"sAjaxSource": "<?php echo site_url('sales/jobs/jobsearch'); ?>",
					"sServerMethod": "POST",
					"sPaginationType": "full_numbers",
					"iDisplayLength": 10,
					"aoColumns": [
						{"sName": "ID","bSearchable": false,"bSortable": false,"fnRender": function (oObj) {return oObj;}},
						{"sName": "ID","bSearchable": true,"bSortable": true,"fnRender": function (oObj) {return oObj;}},
						{"sName": "ID","bSearchable": true,"bSortable": true,"fnRender": function (oObj) {return oObj;}},
						{"sName": "ID","bSearchable": true,"bSortable": true,"fnRender": function (oObj) {return oObj;}},
						{"sName": "ID","bSearchable": true,"bSortable": true,"fnRender": function (oObj) {return oObj;}},
						{"sName": "ID","bSearchable": true,"bSortable": true,"fnRender": function (oObj) {return oObj;}},
						//{"sName": "ID","bSearchable": true,"bSortable": true,"fnRender": function (oObj) {return oObj;}},
						{"sName": "ID","bSearchable": true,"bSortable": true,"fnRender": function (oObj) {return oObj;}},
						{"sName": "ID","bSearchable": true,"bSortable": true,"fnRender": function (oObj) {return oObj;}},
						{"sName": "ID","bSearchable": false,"bSortable": false,"fnRender": function (oObj) {return oObj;}},
					]
				});
				$.validator.addMethod("regex",function(value, element, regexp) {
					if (regexp.constructor != RegExp)
						regexp = new RegExp(regexp);
					else if (regexp.global)
						regexp.lastIndex = 0;
					return this.optional(element) || regexp.test(value);
				},"Please check your input.");
				$("form[name='jobs_form']").validate({
					rules: {
						lead_type: {
							required: true,
						},
						country_code: {
							required: true,
						},						
						state_code: {
							required: true,
						},
						city_id: {
							required: true,
						},   
					},
					messages: {
						lead_type: {
							required: "Please select job type"
						},
						country_code: {
							required: "Please select country"
						},      
						state_code: {
							required: "Please enter state"
						},
						city_id: {
							required: "Please enter city"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('lead_type', $("#lead_type option:selected").text());
						formData.append('country_code', $('#country_code').val());
						formData.append('state_code', $('#state_code').val());
						formData.append('city_id', $("#city_id option:selected").text());
						$.ajax({
							url: form.action,
							type: form.method,
							async:false,
							cache:false,
							contentType:false,
							enctype:'multipart/form-data',
							processData:false,
							data: formData,
							success: function(res) {
								var resD = JSON.parse(res);
								$('#dataManual').dataTable({
									destroy: true,
									sEcho: resD.sEcho,
									iTotalRecords: resD.iTotalRecords,
									iTotalDisplayRecords: resD.iTotalDisplayRecords,
									iDisplayLength: resD.iTotalDisplayRecords,
									aaData: resD.aaData,
									deferLoading:resD.sEcho
								});
							}
						});
					}
				});
			});
		</script>
		<script type="text/javascript">
			$(document).on('change','#country_code',function(){
				var country_code = $(this).val();
				var formData = new FormData();
				formData.append('country_code', country_code);
				if(country_code!=''){
					$.ajax({
						url: "<?php echo base_url('country/statelist/'); ?>",
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
								var htmlSelect = '';
								$.each(resD.state, function(k, v) {
									htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
								});
								$("#state_code").replaceWith('<select name="state_code" id="state_code" class="form-control">'+ htmlSelect +'</select>');
							} else { 
								$("#zip_code").replaceWith('<input name="state_code" id="state_code" type="text" class="form-control" value="" placeholder="State/Province" />');
							}
						}
					});
				}
			});
			$(document).on('change','#state_code',function(){
				var state_code = $(this).val();
				var formData = new FormData();
				formData.append('state_code', state_code);
				if(state_code!=''){
					$.ajax({
						url: "<?php echo base_url('country/citylist/'); ?>",
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
								var htmlSelect = '<option value="">--Select One--</option>';
								$.each(resD.city, function(k, v) {
									if(k!=''){
										htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
									}
								});
								$("#city_id").replaceWith('<select name="city_id" id="city_id" class="form-control">'+ htmlSelect +'</select>');
							} else { 
								$("#zip_code").replaceWith('<input name="city_id" id="city_id" type="text" class="form-control" value="" placeholder="City" />');
							}
						}
					});
				}
			});
		</script>