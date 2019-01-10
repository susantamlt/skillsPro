		
    	<section class="content">
            <input type="hidden" name="page" id="page" value="dashboard" />
            <div class="container-fluid">
                <div class="block-header">
                    <h2>DASHBOARD</h2>
                </div>
                <div class="row clearfix">
                 	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                        	<div class="header" style="padding: 10px 0px;border-bottom:none;height: 60px;">
                            </div>
                            <div class="body">
                            	<div class="table-responsive">
									<table id="dataManual" class="table table-bordered table-striped table-hover dataTable js-exportable" style="width:100%;">
										<thead>
											<tr>
												<th title="">&nbsp;</th>
												<th id="date1" colspan="6" title="<?php echo date("d/m/Y") ?>"> <?php echo date("d/m/Y") ?> </th>
												<th id="date2" colspan="6" title="<?php echo date("d/m/Y") ?>"> <?php echo date("d/m/Y",strtotime('-1 days')) ?> </th>
												<th id="date3" colspan="6" title="<?php echo date("d/m/Y") ?>"> <?php echo date("d/m/Y",strtotime('-2 days')) ?> </th>
											</tr>
											<tr>
												<th title="Category">Category</th>
												<th title="With Phone">With Phone</th>
												<th title="Email">Email</th>
												<th title="With Out Phone AND Email">With Out Phone AND Email</th>
												<th title="Total">Total</th>
												<th title="p %">p %</th>
												<th title="e %">e %</th>
												<th title="With Phone">With Phone</th>
												<th title="Email">Email</th>
												<th title="With Out Phone AND Email">With Out Phone AND Email</th>
												<th title="Total">Total</th>
												<th title="p %">p %</th>
												<th title="e %">e %</th>
												<th title="With Phone">With Phone</th>
												<th title="Email">Email</th>
												<th title="With Out Phone AND Email">With Out Phone AND Email</th>
												<th title="Total">Total</th>
												<th title="p %">p %</th>
												<th title="e %">e %</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="19" class="text-center">
													<img src="<?php echo config_item('assets_dir'); ?>images/small-loader.gif">
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
        </section>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
          $(function () {
            $('#dataManual').DataTable({
				"bServerSide": true,
				"sAjaxSource": "<?php echo site_url('sales/repotrs'); ?>",
				"sServerMethod": "POST",
				"sPaginationType": "full_numbers",
				"aoColumns": [	                
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
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
	                },
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
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
	                },
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
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
	                },
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
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
	                },
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
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
	                },
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
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
	                },
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
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
	                },
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
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
	                },
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
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
	                },
	                {
						"sName": "Action",
						"sClass": "text-center",
						"bSearchable": false,
						"bSortable": false,
						"fnRender": function (oObj) {
							return oObj;
						}
	                },
              	],
              	"responsive": true,
	          	"dom": 'lfBrtip',
	          	"buttons": [
					{ extend: 'copy', className: 'copyButton', titleAttr: 'Export to Copy' },
					{ extend: 'csv', className: 'csvButton', titleAttr: 'Export to CSV' },
					{ extend: 'excel', className: 'excelButton', titleAttr: 'Export to Excel' },
					{ extend: 'pdf', className: 'pdfButton', titleAttr: 'Export to PDF' },
					{ extend: 'print', className: 'printButton', titleAttr: 'Export to Print' }
	          	],
              	"iDisplayLength": 25,
              	"aLengthMenu": [[10,25, 50, 100, 500, -1], [10,25, 50, 100, 500, "All"]],
            });
          });
        </script>
        <style type="text/css">
        	table#dataManual td, table#dataManual th {text-align:center;vertical-align:middle;}
        </style>