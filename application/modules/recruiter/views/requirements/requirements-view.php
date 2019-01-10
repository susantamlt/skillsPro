
		<section class="content">
			<input type="hidden" name="page" id="page" value="requirements" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
              <div class="header" style="border-bottom:none;">
                <h2>View Requirement</h2>
                <div class="col-md-6" style="padding:0px; float:right;"></div>
              </div>
							<div class="body">
								<fieldset>
									<legend>Requirement Opening Information </legend>
                  <div class="form-group" style="clear:both;">
										<label class="col-md-2"> No of Requirements Fullfilled : </label>
										<div class="col-md-4"><?php echo $requirement[0]['no_requirement_fullfilled']; ?></div>
										<?php $status = array('FU'=>'Full Filled','PF'=>'Partially Filled','VA'=>'Vacant'); ?>
										<label class="col-md-2"> Requirment status: </label>
										<div class="col-md-4"><?php echo $status[$requirement[0]['requirement_status']]; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Prospect Title: </label>
										<div class="col-md-4"><?php echo $requirement[0]['requirement_title']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> No of Requirement: </label>
										<div class="col-md-4"><?php echo $requirement[0]['no_of_requirement']; ?></div>
										<label class="col-md-2"> No Requirement Fullfilled: </label>
										<div class="col-md-4"><?php echo $requirement[0]['no_requirement_fullfilled']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Proposed Rate: </label>
										<div class="col-md-4"><?php echo '$'.$requirement[0]['proposed_hourly_rate']; ?></div>
										<label class="col-md-2"> Final Rate: </label>
										<div class="col-md-4"><?php echo '$'.$requirement[0]['final_hourly_rate']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Final Comments on Requirement: </label>
										<div class="col-md-4"><?php echo $requirement[0]['final_comments_on_requirement']; ?></div>
                    <label class="col-md-2"> Expected Date of Closure: </label>
                    <div class="col-md-4"><?php echo date('d/m/Y',strtotime($requirement[0]['expected_date_of_closure'])); ?></div>
									</div>
									<div class="form-group" style="clear:both;">
                    <label class="col-md-2"> Final Comments on Requirement: </label>
                    <div class="col-md-4"><?php echo $requirement[0]['city_name'].','.$requirement[0]['state']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-12"> Requirement: </label>
										<div class="col-md-12"><?php echo $requirement[0]['requirement']; ?></div>
									</div>
								</fieldset>
								<div class="form-group" style="clear:both;">
									<div class="col-md-12">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['recruiter_user_id']; ?>">
										<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['recruiter_org_id']; ?>">
										<input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo $requirement[0]['requirement_id']; ?>">
										<a href="<?php echo site_url('recruiter/requirements') ?>" class="btn btn-default">Back</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header" style="border-bottom:none;">
                <h2 class="col-md-6" style="padding:0px;">Contractors List</h2>
                <div class="col-md-6" style="padding:0px; text-align:right;">
                  <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                </div>
              </div>
              <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#ManuallyContractors" data-toggle="tab">INDEED</a></li>
                    <li role="presentation"><a href="#AutoContractors" data-toggle="tab">CRAIGSLIAT</a></li>
                    <li role="presentation"><a href="#Twitters" data-toggle="tab">TWITTER</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="ManuallyContractors">
                    <div class="header" style="padding: 10px 0px;border-bottom:none;">
                      <div class="col-md-3">
                        <input type="text"  name="keywords" id="keywords" class="form-control ManuallyContractorsData" placeholder="Skills/Keywords">
                      </div>
                      <div class="col-md-3">
                        <input type="text"  name="location" id="location" class="form-control ManuallyContractorsData" placeholder="city,state,zipcode">
                      </div>
                      <div class="col-md-3">
                        <input type="text"  name="radius" id="radius" class="form-control ManuallyContractorsData" placeholder="Radius" value="50">
                      </div>
                      <div class="col-md-3">
                        <input type="text"  name="experience" id="experience" class="form-control ManuallyContractorsData" placeholder="Years of experience(1,2 etc..)">
                      </div>
                      <span style="clear:both;"></span>
                    </div>
                    <div class="table-responsive" style="width: 100%;">
                      <table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
                        <thead>
                          <tr>
                            <th style="width:18px" class="sorting-disabled">
                              <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                              <label for="checkbox-1-0"></label>
                            </th>
                            <th title="Name">Contractor Name </th>
                            <th title="Resume Key">Resume Key </th>
                            <th title="Url">Url </th>
                            <th title="Action"> Action </th>
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
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="AutoContractors">
                    <div class="header" style="padding: 10px 0px;border-bottom:none;">
                      <div class="col-md-6">
                        <input type="text"  name="keywordsc" id="keywordsc" class="form-control ManuallyContractorsDataC" placeholder="Skills/Keywords">
                      </div>
                      <div class="col-md-6">
                        <input type="text"  name="locationc" id="locationc" class="form-control ManuallyContractorsDataC" placeholder="city,state,zipcode">
                      </div>
                      <span style="clear:both;"></span>
                    </div>
                    <div class="table-responsive" style="width: 100%;">
                      <table id="dataAuto" class="table table-bordered table-striped" style="width:100%;">
                        <thead>
                          <tr>
                            <th style="width:18px" class="sorting-disabled">
                              <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                              <label for="checkbox-1-0"></label>
                            </th>
                            <th title="Name">Contractor Name </th>
                            <th title="Resume Key">Resume Key </th>
                            <th title="Name Job">Description for Job Searching</th>
                            <th title="Action"> Action </th>
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
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="Twitters">
                    <div class="header" style="padding: 10px 0px;border-bottom:none;">
                      <div class="col-md-6">
                        <input type="text"  name="keywordsT" id="keywordsT" class="form-control TwitterContractorsDataC" placeholder="Skills/Keywords">
                      </div>
                      <div class="col-md-6">
                        <input type="text"  name="locationT" id="locationT" class="form-control TwitterContractorsDataC" placeholder="city,state,zipcode">
                      </div>
                      <span style="clear:both;"></span>
                    </div>
                    <div class="table-responsive" style="width: 100%;">
                      <table id="Twitter" class="table table-bordered table-striped" style="width:100%;">
                        <thead>
                          <tr>
                            <th style="width:18px" class="sorting-disabled">
                              <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                              <label for="checkbox-1-0"></label>
                            </th>
                            <th title="Name">Contractor Name </th>
                            <th title="Resume Key">Resume Key </th>
                            <th title="Description">Description</th>
                            <th title="Location">Location</th>
                            <th title="Action"> Action </th>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
		</section>
		<script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $('#dataAuto').DataTable({
          "bServerSide": true,
          "sAjaxSource": "<?php echo site_url('recruiter/requirements/requirements_contractors'); ?>",
          "sServerMethod": "POST",
          "fnServerParams": function (aoData) {
            aoData.push(
              { "name": "locationc", "value": $('#locationc').val() },
              { "name": "keywordsc", "value": $('#keywordsc').val() },
              { "name": "requirement_id", "value": "<?php echo $requirement[0]['requirement_id']; ?>" }
            );
          },
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
              "sName": "E-mail",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "E-mail",
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
          ],
          "responsive": true,
          "iDisplayLength": 25,
          "aLengthMenu": [[10,25, 50, 100, 500, -1], [10,25, 50, 100, 500, "All"]],
          'aaSorting':[[1,'desc']]
        });
      });
      $(function () {
        $('#Twitter').DataTable({
          "bServerSide": true,
          "sAjaxSource": "<?php echo site_url('recruiter/twitter/twitterget'); ?>",
          "sServerMethod": "POST",
          "fnServerParams": function (aoData) {
            aoData.push(
              { "name": "locationT", "value": $('#locationT').val() },
              { "name": "keywordsT", "value": $('#keywordsT').val() },
              { "name": "requirement_id", "value": "<?php echo $requirement[0]['requirement_id']; ?>" }
            );
          },
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
              "sName": "E-mail",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "E-mail",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "E-mail",
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
          ],
          "responsive": true,
          "iDisplayLength": 25,
          "aLengthMenu": [[10,25, 50, 100, 500, -1], [10,25, 50, 100, 500, "All"]],
          'aaSorting':[[1,'desc']]
        });
      });
      $(function () {
        $('#dataManual').DataTable({
          "bServerSide": true,
          "sAjaxSource": "<?php echo site_url('recruiter/requirements/requirements_contractors_manually'); ?>",
          "sServerMethod": "POST",
          "fnServerParams": function (aoData) {
            aoData.push(
              { "name": "location", "value": $('#location').val() },
              { "name": "radius", "value": $('#radius').val() },
              { "name": "experience", "value": $('#experience').val() },
              { "name": "keywords", "value": $('#keywords').val() },
              { "name": "requirement_id", "value": "<?php echo $requirement[0]['requirement_id']; ?>" }
            );
          },
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
              "sName": "E-mail",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "E-mail",
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
          ],
          "responsive": true,
          "iDisplayLength": 25,
          "aLengthMenu": [[10,25, 50, 100, 500, -1], [10,25, 50, 100, 500, "All"]],
          'aaSorting':[[1,'desc']]
        });
      });
      $(document).on('focusout','.ManuallyContractorsData',function(){
        $('#dataManual').DataTable().destroy();
        $('#dataManual').DataTable({
          "bServerSide": true,
          "sAjaxSource": "<?php echo site_url('recruiter/requirements/requirements_contractors_manually'); ?>",
          "sServerMethod": "POST",
          "fnServerParams": function (aoData) {
            aoData.push(
              { "name": "location", "value": $('#location').val() },
              { "name": "radius", "value": $('#radius').val() },
              { "name": "experience", "value": $('#experience').val() },
              { "name": "keywords", "value": $('#keywords').val() },
              { "name": "requirement_id", "value": "<?php echo $requirement[0]['requirement_id']; ?>" }
            );
          },
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
              "sName": "E-mail",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "E-mail",
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
          ],
          "responsive": true,
          "iDisplayLength": 25,
          "aLengthMenu": [[10,25, 50, 100, 500, -1], [10,25, 50, 100, 500, "All"]],
          'aaSorting':[[1,'desc']]
        });
      });
      $(document).on('focusout','.ManuallyContractorsDataC',function(){
        $('#dataAuto').DataTable().destroy();
        $('#dataAuto').DataTable({
          "bServerSide": true,
          "sAjaxSource": "<?php echo site_url('recruiter/requirements/requirements_contractors'); ?>",
          "sServerMethod": "POST",
          "fnServerParams": function (aoData) {
            aoData.push(
              { "name": "locationc", "value": $('#locationc').val() },
              { "name": "keywordsc", "value": $('#keywordsc').val() },
              { "name": "requirement_id", "value": "<?php echo $requirement[0]['requirement_id']; ?>" }
            );
          },
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
              "sName": "E-mail",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "E-mail",
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
          ],
          "responsive": true,
          "iDisplayLength": 25,
          "aLengthMenu": [[10,25, 50, 100, 500, -1], [10,25, 50, 100, 500, "All"]],
          'aaSorting':[[1,'desc']]
        });
      });
      $(document).on('focusout','.TwitterContractorsDataC',function(){
        $('#Twitter').DataTable().destroy();
        $('#Twitter').DataTable({
          "bServerSide": true,
          "sAjaxSource": "<?php echo site_url('recruiter/twitter/twitterget'); ?>",
          "sServerMethod": "POST",
          "fnServerParams": function (aoData) {
            aoData.push(
              { "name": "locationT", "value": $('#locationT').val() },
              { "name": "keywordsT", "value": $('#keywordsT').val() },
              { "name": "requirement_id", "value": "<?php echo $requirement[0]['requirement_id']; ?>" }
            );
          },
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
              "sName": "E-mail",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "E-mail",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "E-mail",
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
          ],
          "responsive": true,
          "iDisplayLength": 25,
          "aLengthMenu": [[10,25, 50, 100, 500, -1], [10,25, 50, 100, 500, "All"]],
          'aaSorting':[[1,'desc']]
        });
      });
    </script>
    <style type="text/css">
      #dataManual > thead > tr > th {vertical-align:middle;padding:0px 10px;}
      #dataAuto > thead > tr > th {vertical-align:middle;padding:0px 10px;}
      .dataTables_filter,.dataTables_paginate{float:right;}
    </style>        