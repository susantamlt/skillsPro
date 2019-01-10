		    <section class="content">
            <input type="hidden" name="page" id="page" value="jobs" />
            <div class="container-fluid">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#nosuspiciousDiv" data-toggle="tab">PROSPECTIVE</a></li>
                                    <li role="presentation"><a href="#suspiciousDiv" data-toggle="tab">SUSPICIOUS</a></li>
                                    <li role="presentation"><a href="#ClassiFiedads" data-toggle="tab">ClASSIFIEDADS</a></li>
                                    <?php if($this->session->userdata('sales_state_role')==''){ ?>
                                    <li role="presentation"><a href="#IndeedNewList" data-toggle="tab">INDEED</a></li>
                                    <?php } ?>
                                    <li role="presentation"><a href="#manually" data-toggle="tab">MANUALLY</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="nosuspiciousDiv">
                                      <div class="header" style="padding: 10px 0px;text-align:right;">
                                          <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                        </div>
                                        <div class="header" style="padding: 10px 0px;border-bottom:none;">
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('state_codens',$ljp_state,'','class="form-control filterDataNoSuspicious" id="state_codens"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('city_idns',$ljp_citys,'','class="form-control filterDataNoSuspicious" id="city_idns"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('prospect_type_idns',$ljp_industry,'','class="form-control filterDataNoSuspicious" id="prospect_type_idns"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <select name="phonens" class="form-control filterDataNoSuspicious" id="phonens">
                                              <option value="">--Select Phone--</option>
                                              <option value="yes">Yes</option>
                                              <option value="no">No</option>
                                            </select>
                                          </div>
                                          <div class="col-md-2">
                                            <select name="emailns" class="form-control filterDataNoSuspicious" id="emailns">
                                              <option value="">--Select Email--</option>
                                              <option value="yes">Yes</option>
                                              <option value="no">No</option>
                                            </select>
                                          </div>
                                          <div class="col-md-2 demo-masked-input">
                                            <input type="text"  name="date_of_prospectns" id="date_of_prospectns" class="form-control date btimeNoSuspicious" placeholder="Ex: dd/mm/yyyy">
                                          </div>
                                          <span style="clear:both;"></span>
                                        </div>
                                        <div class="table-responsive" style="width: 100%;">
                                          <table id="nosuspicious" class="table table-bordered table-striped" style="width:100%;">
                                            <thead>
                                              <tr>
                                                <th style="width:18px" class="sorting-disabled">
                                                  <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                                                  <label for="checkbox-1-0"></label>
                                                </th>
                                                <th title="Prospect Title"> Title </th>
                                                <th title="Prospect Type"> Type </th>
                                                <th title="Phone Number"> Phone </th>
                                                <th title="E-mail"> E-mail </th>
                                                <th title="Prospect Source"> Source </th>
                                                <th title="Prospect City"> City </th>
                                                <th title="Prospect State"> State </th>
                                                <th title="Publish Date"> Publish Date </th>
                                                <th title="Action"> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td colspan="10" class="text-center">
                                                  <img src="<?php echo config_item('assets_dir');?>/images/small-loader.gif">
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="suspiciousDiv">
                                      <div class="header" style="padding: 10px 0px;text-align:right;">
                                          <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                        </div>
                                        <div class="header" style="padding: 10px 0px;border-bottom:none;">
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('state_codes',$ljp_state,'','class="form-control filterDataSuspicious" id="state_codes"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('city_ids',$ljp_citys,'','class="form-control filterDataSuspicious" id="city_ids"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('prospect_type_ids',$ljp_industry,'','class="form-control filterDataSuspicious" id="prospect_type_ids"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <select name="phones" class="form-control filterDataSuspicious" id="phones">
                                              <option value="">--Select Phone--</option>
                                              <option value="yes">Yes</option>
                                              <option value="no">No</option>
                                            </select>
                                          </div>
                                          <div class="col-md-2">
                                            <select name="emails" class="form-control filterDataSuspicious" id="emails">
                                              <option value="">--Select Email--</option>
                                              <option value="yes">Yes</option>
                                              <option value="no">No</option>
                                            </select>
                                          </div>
                                          <div class="col-md-2 demo-masked-input">
                                            <input type="text"  name="date_of_prospects" id="date_of_prospects" class="form-control date btimeSuspicious" placeholder="Ex: dd/mm/yyyy">
                                          </div>
                                          <span style="clear:both;"></span>
                                        </div>
                                        <div class="table-responsive" style="width: 100%;">
                                          <table id="suspicious" class="table table-bordered table-striped" style="width:100%;">
                                            <thead>
                                              <tr>
                                                <th style="width:18px" class="sorting-disabled">
                                                  <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                                                  <label for="checkbox-1-0"></label>
                                                </th>
                                                <th title="Prospect Title"> Title </th>
                                                <th title="Prospect Type"> Type </th>
                                                <th title="Phone Number"> Phone </th>
                                                <th title="E-mail"> E-mail </th>
                                                <th title="Prospect Source"> Source </th>
                                                <th title="Prospect City"> City </th>
                                                <th title="Prospect State"> State </th>
                                                <th title="Publish Date"> Publish Date </th>
                                                <th title="Action"> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td colspan="10" class="text-center">
                                                  <img src="<?php echo config_item('assets_dir');?>/images/small-loader.gif">
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="ClassiFiedads">
                                      <div class="header" style="padding: 10px 0px;text-align:right;">
                                          <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                        </div>
                                        <div class="header" style="padding: 10px 0px;border-bottom:none;">
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('state_codeCL',$ljp_state,'','class="form-control filterDataClassiFiedads" id="state_codeCL"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('city_idCL',$ljp_citys,'','class="form-control filterDataClassiFiedads" id="city_idCL"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('prospect_type_idCL',$ljp_industry,'','class="form-control filterDataClassiFiedads" id="prospect_type_idCL"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <select name="phoneCL" class="form-control filterDataClassiFiedads" id="phoneCL">
                                              <option value="">--Select Phone--</option>
                                              <option value="yes">Yes</option>
                                              <option value="no">No</option>
                                            </select>
                                          </div>
                                          <div class="col-md-2">
                                            <select name="emailCL" class="form-control filterDataClassiFiedads" id="emailCL">
                                              <option value="">--Select Email--</option>
                                              <option value="yes">Yes</option>
                                              <option value="no">No</option>
                                            </select>
                                          </div>
                                          <div class="col-md-2 demo-masked-input">
                                            <input type="text"  name="date_of_prospectCL" id="date_of_prospectCL" class="form-control date btimeSuspicious" placeholder="Ex: dd/mm/yyyy">
                                          </div>
                                          <span style="clear:both;"></span>
                                        </div>
                                        <div class="table-responsive" style="width: 100%;">
                                          <table id="ClassiFiedad" class="table table-bordered table-striped" style="width:100%;">
                                            <thead>
                                              <tr>
                                                <th style="width:18px" class="sorting-disabled">
                                                  <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                                                  <label for="checkbox-1-0"></label>
                                                </th>
                                                <th title="Prospect Title"> Title </th>
                                                <th title="Prospect Type"> Type </th>
                                                <th title="Phone Number"> Phone </th>
                                                <th title="E-mail"> E-mail </th>
                                                <th title="Prospect Source"> Source </th>
                                                <th title="Prospect City"> City </th>
                                                <th title="Prospect State"> State </th>
                                                <th title="Publish Date"> Publish Date </th>
                                                <th title="Action"> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td colspan="10" class="text-center">
                                                  <img src="<?php echo config_item('assets_dir');?>/images/small-loader.gif">
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                                    <?php if($this->session->userdata('sales_state_role')==''){ ?>
                                    <div role="tabpanel" class="tab-pane fade" id="IndeedNewList">
                                      <div class="header" style="padding: 10px 0px;text-align:right;">
                                          <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                        </div>
                                        <div class="header" style="padding: 10px 0px;border-bottom:none;">
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('state_codeIndeed',$ljp_state,'','class="form-control filterDataIndeed" id="state_codeIndeed"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('city_idIndeed',$ljp_citys,'','class="form-control filterDataIndeed" id="city_idIndeed"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <?php echo form_dropdown('prospect_type_idIndeed',$ljp_industry,'','class="form-control filterDataIndeed" id="prospect_type_idIndeed"') ?>
                                          </div>
                                          <div class="col-md-2">
                                            <select name="phoneIndeed" class="form-control filterDataIndeed" id="phoneIndeed">
                                              <option value="">--Select Phone--</option>
                                              <option value="yes">Yes</option>
                                              <option value="no">No</option>
                                            </select>
                                          </div>
                                          <div class="col-md-2">
                                            <select name="emailIndeed" class="form-control filterDataIndeed" id="emailIndeed">
                                              <option value="">--Select Email--</option>
                                              <option value="yes">Yes</option>
                                              <option value="no">No</option>
                                            </select>
                                          </div>
                                          <div class="col-md-2 demo-masked-input">
                                            <input type="text"  name="date_of_prospectIndeed" id="date_of_prospectIndeed" class="form-control date btimeSuspicious" placeholder="Ex: dd/mm/yyyy">
                                          </div>
                                          <span style="clear:both;"></span>
                                        </div>
                                        <div class="table-responsive" style="width: 100%;">
                                          <table id="indeedList" class="table table-bordered table-striped" style="width:100%;">
                                            <thead>
                                              <tr>
                                                <th style="width:18px" class="sorting-disabled">
                                                  <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                                                  <label for="checkbox-1-0"></label>
                                                </th>
                                                <th title="Prospect Title"> Title </th>
                                                <th title="Prospect Type"> Type </th>
                                                <th title="Phone Number"> Phone </th>
                                                <th title="E-mail"> E-mail </th>
                                                <th title="Prospect Source"> Source </th>
                                                <th title="Prospect City"> City </th>
                                                <th title="Prospect State"> State </th>
                                                <th title="Publish Date"> Publish Date </th>
                                                <th title="Action"> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td colspan="10" class="text-center">
                                                  <img src="<?php echo config_item('assets_dir');?>/images/small-loader.gif">
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div role="tabpanel" class="tab-pane fade" id="manually">
                                        <div class="header" style="padding: 10px 0px;border-bottom:none;text-align:right;">
                                          <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                          <a href="<?php echo site_url('sales/jobs/jobs_add') ?>" data-toggle="tooltip" title="Add New Record" class="btn btn-success btn-background"><i class="glyphicon glyphicon-plus"></i></a>
                                          <a href="<?php echo site_url('sales/jobs/jobs_search') ?>" data-toggle="tooltip" title="Search Jobs" class="btn btn-success btn-background"><i class="glyphicon glyphicon-search"></i></a>
                                        </div>
                                        <table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
                                          <thead>
                                            <tr>
                                              <th style="width:18px" class="sorting-disabled">
                                                <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                                                <label for="checkbox-1-0"></label>
                                              </th>
                                              <th title="Prospect Title"> Title </th>
                                              <th title="Prospect Type"> Type </th>
                                              <th title="Phone Number"> Phone </th>
                                              <th title="E-mail"> E-mail </th>
                                              <th title="Prospect Source"> Source </th>
                                              <th title="Prospect City"> City </th>
                                              <th title="Prospect State"> State </th>
                                              <th title="Publish Date"> Publish Date </th>
                                              <th title="Action"> Action </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td colspan="10" class="text-center">
                                                <img src="<?php echo config_item('assets_dir');?>/images/small-loader.gif">
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
        </section>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
          $(function () {
            $('#dataManual').DataTable({
              "bServerSide": true,
              "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_m'); ?>",
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
                  "sName": "E-mail",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Type",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Gender",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Country",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "State",
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
              'aaSorting':[[8,'desc']]
            });
          });
          $(function (){
            $('#nosuspicious').DataTable({
              "bServerSide": true,
              "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_ns'); ?>",
              "sServerMethod": "POST",
              "fnServerParams": function (aoData) {
                aoData.push(
                  { "name": "email", "value": $('#emailns').val() },
                  { "name": "state_code", "value": $('#state_codens').val() },
                  { "name": "city_id", "value": $('#city_idns').val() },
                  { "name": "prospect_type_id", "value": $('#prospect_type_idns').val() },
                  { "name": "phone", "value": $('#phonens').val() },
                  { "name": "date_of_prospect", "value": $('#date_of_prospectns').val() }
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
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Type",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Gender",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Country",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "State",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Actions",
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
              'aaSorting':[[8,'desc']]
            });
          });
          $(function (){
            $('#suspicious').DataTable({
              "bServerSide": true,
              "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_s'); ?>",
              "sServerMethod": "POST",
              "fnServerParams": function (aoData) {
                aoData.push(
                  { "name": "email", "value": $('#emails').val() },
                  { "name": "state_code", "value": $('#state_codes').val() },
                  { "name": "city_id", "value": $('#city_ids').val() },
                  { "name": "prospect_type_id", "value": $('#prospect_type_ids').val() },
                  { "name": "phone", "value": $('#phones').val() },
                  { "name": "date_of_prospect", "value": $('#date_of_prospects').val() }
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
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Type",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Gender",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Country",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "State",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Actions",
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
              'aaSorting':[[8,'desc']]
            });
          });
          $(function (){
            $('#ClassiFiedad').DataTable({
              "bServerSide": true,
              "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_CL'); ?>",
              "sServerMethod": "POST",
              "fnServerParams": function (aoData) {
                aoData.push(
                  { "name": "email", "value": $('#emailCL').val() },
                  { "name": "state_code", "value": $('#state_codeCL').val() },
                  { "name": "city_id", "value": $('#city_idCL').val() },
                  { "name": "prospect_type_id", "value": $('#prospect_type_idCL').val() },
                  { "name": "phone", "value": $('#phoneCL').val() },
                  { "name": "date_of_prospect", "value": $('#date_of_prospectCL').val() }
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
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Type",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Gender",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Country",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "State",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Actions",
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
              'aaSorting':[[8,'desc']]
            });
          });
          <?php if($this->session->userdata('sales_state_role')==''){ ?>
            $(function (){
              $('#indeedList').DataTable({
                "bServerSide": true,
                "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_indeed'); ?>",
                "sServerMethod": "POST",
                "fnServerParams": function (aoData) {
                  aoData.push(
                    { "name": "email", "value": $('#emailIndeed').val() },
                    { "name": "state_code", "value": $('#state_codeIndeed').val() },
                    { "name": "city_id", "value": $('#city_idIndeed').val() },
                    { "name": "prospect_type_id", "value": $('#prospect_type_idIndeed').val() },
                    { "name": "phone", "value": $('#phoneIndeed').val() },
                    { "name": "date_of_prospect", "value": $('#date_of_prospectIndeed').val() }
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
                    "sName": "Moile",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Moile",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Image",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Type",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Gender",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Country",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "State",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Actions",
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
                'aaSorting':[[8,'desc']]
              });
            });
          <?php } ?>
          $(document).on('change','.filterDataNoSuspicious',function(){
            $('#nosuspicious').DataTable().destroy();
            $('#nosuspicious').DataTable({
              "bServerSide": true,
              "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_ns'); ?>",
              "sServerMethod": "POST",
              "fnServerParams": function (aoData) {
                aoData.push(
                  { "name": "email", "value": $('#emailns').val() },
                  { "name": "state_code", "value": $('#state_codens').val() },
                  { "name": "city_id", "value": $('#city_idns').val() },
                  { "name": "prospect_type_id", "value": $('#prospect_type_idns').val() },
                  { "name": "phone", "value": $('#phonens').val() },
                  { "name": "date_of_prospect", "value": $('#date_of_prospectns').val() }
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
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Type",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Gender",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Country",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "State",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Actions",
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
              'aaSorting':[[8,'desc']]
            });
          });
          $(document).on('change','.filterDataSuspicious',function(){
            $('#suspicious').DataTable().destroy();
            $('#suspicious').DataTable({
              "bServerSide": true,
              "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_s'); ?>",
              "sServerMethod": "POST",
              "fnServerParams": function (aoData) {
                aoData.push(
                  { "name": "email", "value": $('#emails').val() },
                  { "name": "state_code", "value": $('#state_codes').val() },
                  { "name": "city_id", "value": $('#city_ids').val() },
                  { "name": "prospect_type_id", "value": $('#prospect_type_ids').val() },
                  { "name": "phone", "value": $('#phones').val() },
                  { "name": "date_of_prospect", "value": $('#date_of_prospects').val() }
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
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Type",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Gender",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Country",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "State",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Actions",
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
              'aaSorting':[[8,'desc']]
            });
          });
          $(document).on('change','.filterDataClassiFiedads',function(){
            $('#ClassiFiedad').DataTable().destroy();
            $('#ClassiFiedad').DataTable({
              "bServerSide": true,
              "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_CL'); ?>",
              "sServerMethod": "POST",
              "fnServerParams": function (aoData) {
                aoData.push(
                  { "name": "email", "value": $('#emailCL').val() },
                  { "name": "state_code", "value": $('#state_codeCL').val() },
                  { "name": "city_id", "value": $('#city_idCL').val() },
                  { "name": "prospect_type_id", "value": $('#prospect_type_idCL').val() },
                  { "name": "phone", "value": $('#phoneCL').val() },
                  { "name": "date_of_prospect", "value": $('#date_of_prospectCL').val() }
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
                  "sName": "Moile",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Image",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Type",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Gender",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Country",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "State",
                  "sClass": "text-center",
                  "bSearchable": false,
                  "bSortable": true,
                  "fnRender": function (oObj) {
                    return oObj;
                  }
                },
                {
                  "sName": "Actions",
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
              'aaSorting':[[8,'desc']]
            });
          });
          <?php if($this->session->userdata('sales_state_role')==''){ ?>
            $(document).on('change','.filterDataIndeed',function(){
              $('#indeedList').DataTable().destroy();
              $('#indeedList').DataTable({
                "bServerSide": true,
                "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_indeed'); ?>",
                "sServerMethod": "POST",
                "fnServerParams": function (aoData) {
                  aoData.push(
                    { "name": "email", "value": $('#emailIndeed').val() },
                    { "name": "state_code", "value": $('#state_codeIndeed').val() },
                    { "name": "city_id", "value": $('#city_idIndeed').val() },
                    { "name": "prospect_type_id", "value": $('#prospect_type_idIndeed').val() },
                    { "name": "phone", "value": $('#phoneIndeed').val() },
                    { "name": "date_of_prospect", "value": $('#date_of_prospectIndeed').val() }
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
                    "sName": "Moile",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Moile",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Image",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Type",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Gender",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Country",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "State",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Actions",
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
                'aaSorting':[[8,'desc']]
              });
            });
          <?php } ?>
        </script>
        <style type="text/css">
          #dataManual > thead > tr > th {vertical-align:middle;padding:0px 10px;}
          #dataAuto > thead > tr > th {vertical-align:middle;padding:0px 10px;}
        </style>
        <!-- Input Mask Plugin Js -->
        <!-- <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script> -->
        <link rel="stylesheet" href="<?php echo config_item('assets_dir');?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" />
        <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
        <script src="<?php echo config_item('assets_dir');?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <script type="text/javascript">
          //var $demoMaskedInput = $('.demo-masked-input');
          //Date
          //$demoMaskedInput.find('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
          //Time
          //$demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:__ _m', alias: 'time12', hourFormat: '12' });
          $(document).ready(function(){
            $('#date_of_prospectns').bootstrapMaterialDatePicker({ 
              format : 'DD/MM/YYYY',time: false,shortTime : false, maxDate : new Date() 
            }).on('change', function(e, date) {
              $('#date-end').bootstrapMaterialDatePicker('setMaxDate', date);
              $('#nosuspicious').DataTable().destroy();
              $('#nosuspicious').DataTable({
                "bServerSide": true,
                "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_ns'); ?>",
                "sServerMethod": "POST",
                "fnServerParams": function (aoData) {
                  aoData.push(
                    { "name": "email", "value": $('#emailns').val() },
                    { "name": "state_code", "value": $('#state_codens').val() },
                    { "name": "city_id", "value": $('#city_idns').val() },
                    { "name": "prospect_type_id", "value": $('#prospect_type_idns').val() },
                    { "name": "phone", "value": $('#phonens').val() },
                    { "name": "date_of_prospect", "value": $('#date_of_prospectns').val() }
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
                    "sName": "Moile",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Image",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Image",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Type",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Gender",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Country",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "State",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Actions",
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
                'aaSorting':[[8,'desc']]
              });
            });
            $('#date_of_prospects').bootstrapMaterialDatePicker({ 
              format : 'DD/MM/YYYY',time: false,shortTime : false, maxDate : new Date() 
            }).on('change', function(e, date) {
              $('#date-end').bootstrapMaterialDatePicker('setMaxDate', date);
              $('#suspicious').DataTable().destroy();
              $('#suspicious').DataTable({
                "bServerSide": true,
                "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_s'); ?>",
                "sServerMethod": "POST",
                "fnServerParams": function (aoData) {
                  aoData.push(
                    { "name": "email", "value": $('#emails').val() },
                    { "name": "state_code", "value": $('#state_codes').val() },
                    { "name": "city_id", "value": $('#city_ids').val() },
                    { "name": "prospect_type_id", "value": $('#prospect_type_ids').val() },
                    { "name": "phone", "value": $('#phones').val() },
                    { "name": "date_of_prospect", "value": $('#date_of_prospects').val() }
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
                    "sName": "Moile",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Image",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Image",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Type",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Gender",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Country",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "State",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Actions",
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
                'aaSorting':[[8,'desc']]
              });
            });
            $('#date_of_prospectCL').bootstrapMaterialDatePicker({ 
              format : 'DD/MM/YYYY',time: false,shortTime : false, maxDate : new Date() 
            }).on('change', function(e, date) {
              $('#date-end').bootstrapMaterialDatePicker('setMaxDate', date);
              $('#ClassiFiedad').DataTable().destroy();
              $('#ClassiFiedad').DataTable({
                "bServerSide": true,
                "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_CL'); ?>",
                "sServerMethod": "POST",
                "fnServerParams": function (aoData) {
                  aoData.push(
                    { "name": "email", "value": $('#emailCL').val() },
                    { "name": "state_code", "value": $('#state_codeCL').val() },
                    { "name": "city_id", "value": $('#city_idCL').val() },
                    { "name": "prospect_type_id", "value": $('#prospect_type_idCL').val() },
                    { "name": "phone", "value": $('#phones').val() },
                    { "name": "date_of_prospect", "value": $('#date_of_prospectCL').val() }
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
                    "sName": "Moile",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Image",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Image",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Type",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Gender",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Country",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "State",
                    "sClass": "text-center",
                    "bSearchable": false,
                    "bSortable": true,
                    "fnRender": function (oObj) {
                      return oObj;
                    }
                  },
                  {
                    "sName": "Actions",
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
                'aaSorting':[[8,'desc']]
              });
            });
            <?php if($this->session->userdata('sales_state_role')==''){ ?>
              $('#date_of_prospectIndeed').bootstrapMaterialDatePicker({ 
                format : 'DD/MM/YYYY',time: false,shortTime : false, maxDate : new Date() 
              }).on('change', function(e, date) {
                $('#date-end').bootstrapMaterialDatePicker('setMaxDate', date);
                $('#indeedList').DataTable().destroy();
                $('#indeedList').DataTable({
                  "bServerSide": true,
                  "sAjaxSource": "<?php echo site_url('sales/jobs/jobs_list_indeed'); ?>",
                  "sServerMethod": "POST",
                  "fnServerParams": function (aoData) {
                    aoData.push(
                      { "name": "email", "value": $('#emailIndeed').val() },
                      { "name": "state_code", "value": $('#state_codeIndeed').val() },
                      { "name": "city_id", "value": $('#city_idIndeed').val() },
                      { "name": "prospect_type_id", "value": $('#prospect_type_idIndeed').val() },
                      { "name": "phone", "value": $('#phoneIndeed').val() },
                      { "name": "date_of_prospect", "value": $('#date_of_prospectIndeed').val() }
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
                      "sName": "Moile",
                      "sClass": "text-center",
                      "bSearchable": false,
                      "bSortable": true,
                      "fnRender": function (oObj) {
                        return oObj;
                      }
                    },
                    {
                      "sName": "Moile",
                      "sClass": "text-center",
                      "bSearchable": false,
                      "bSortable": true,
                      "fnRender": function (oObj) {
                        return oObj;
                      }
                    },
                    {
                      "sName": "Image",
                      "sClass": "text-center",
                      "bSearchable": false,
                      "bSortable": true,
                      "fnRender": function (oObj) {
                        return oObj;
                      }
                    },
                    {
                      "sName": "Type",
                      "sClass": "text-center",
                      "bSearchable": false,
                      "bSortable": true,
                      "fnRender": function (oObj) {
                        return oObj;
                      }
                    },
                    {
                      "sName": "Gender",
                      "sClass": "text-center",
                      "bSearchable": false,
                      "bSortable": true,
                      "fnRender": function (oObj) {
                        return oObj;
                      }
                    },
                    {
                      "sName": "Country",
                      "sClass": "text-center",
                      "bSearchable": false,
                      "bSortable": true,
                      "fnRender": function (oObj) {
                        return oObj;
                      }
                    },
                    {
                      "sName": "State",
                      "sClass": "text-center",
                      "bSearchable": false,
                      "bSortable": true,
                      "fnRender": function (oObj) {
                        return oObj;
                      }
                    },
                    {
                      "sName": "Actions",
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
                  'aaSorting':[[8,'desc']]
                });
              });
            <?php } ?>
          });
        </script>
        <script type="text/javascript">          
          $(document).on('change','#state_code',function(){
            var state_code = $(this).val();
            var formData = new FormData();
            formData.append('state_code', state_code);
            if(state_code!=''){
              $.ajax({
                url: "<?php echo base_url('country/citylist'); ?>",
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
                    var htmlSelect = '<option value="">--Select City--</option>';
                    $.each(resD.city, function(k, v) {
                      if(k!=''){
                        htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
                      }
                    });
                    $("#city_id").html(htmlSelect);
                  } else { 
                    $("#city_id").html('<option value="">--Select City--</option>');
                  }
                }
              });
            }
          });
          $(document).on('change','#state_codens',function(){
            var state_code = $(this).val();
            var formData = new FormData();
            formData.append('state_code', state_code);
            if(state_code!=''){
              $.ajax({
                url: "<?php echo base_url('country/citylist'); ?>",
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
                    var htmlSelect = '<option value="">--Select City--</option>';
                    $.each(resD.city, function(k, v) {
                      if(k!=''){
                        htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
                      }
                    });
                    $("#city_idns").html(htmlSelect);
                  } else { 
                    $("#city_idns").html('<option value="">--Select City--</option>');
                  }
                }
              });
            }
          });
          $(document).on('change','#state_codes',function(){
            var state_code = $(this).val();
            var formData = new FormData();
            formData.append('state_code', state_code);
            if(state_code!=''){
              $.ajax({
                url: "<?php echo base_url('country/citylist'); ?>",
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
                    var htmlSelect = '<option value="">--Select City--</option>';
                    $.each(resD.city, function(k, v) {
                      if(k!=''){
                        htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
                      }
                    });
                    $("#city_ids").html(htmlSelect);
                  } else { 
                    $("#city_ids").html('<option value="">--Select City--</option>');
                  }
                }
              });
            }
          });
          $(document).on('change','#state_codeCL',function(){
            var state_code = $(this).val();
            var formData = new FormData();
            formData.append('state_code', state_code);
            if(state_code!=''){
              $.ajax({
                url: "<?php echo base_url('country/citylist'); ?>",
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
                    var htmlSelect = '<option value="">--Select City--</option>';
                    $.each(resD.city, function(k, v) {
                      if(k!=''){
                        htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
                      }
                    });
                    $("#city_idCL").html(htmlSelect);
                  } else { 
                    $("#city_idCL").html('<option value="">--Select City--</option>');
                  }
                }
              });
            }
          });
          <?php if($this->session->userdata('sales_state_role')==''){ ?>
            $(document).on('change','#state_codeIndeed',function(){
              var state_code = $(this).val();
              var formData = new FormData();
              formData.append('state_code', state_code);
              if(state_code!=''){
                $.ajax({
                  url: "<?php echo base_url('country/citylist'); ?>",
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
                      var htmlSelect = '<option value="">--Select City--</option>';
                      $.each(resD.city, function(k, v) {
                        if(k!=''){
                          htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
                        }
                      });
                      $("#city_idIndeed").html(htmlSelect);
                    } else { 
                      $("#city_idIndeed").html('<option value="">--Select City--</option>');
                    }
                  }
                });
              }
            });
          <?php } ?>
          $(document).on('click','.a_confirm',function(){
            var id = $(this).attr('data-id');
            if (confirm("Are you sure! you want to validate?") == true) {
              var formData = new FormData();
              formData.append('job_id', id);
              $.ajax({
                url: "<?php echo base_url('sales/jobs/verifiedChecking'); ?>",
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
                    $('#confirm-'+id).removeClass('a_confirm').addClass('v_confirm');
                    $('#confirm-i-'+id).removeClass('glyphicon-ban-circle').addClass('glyphicon-ok');
                  }
                }
              });
            }
          });
        </script>