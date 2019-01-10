<section class="content">
			<input type="hidden" name="page" id="page" value="contractors" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<title>Recruiter Portal</title>
							<div class="header" style="border-bottom:none;">
								<h2>Interview Details</h2>
						    </div>
							<div class="body">
								<div id="massage"></div>
								<fieldset>
									<legend> Contractor Information </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Interview Time: </label>
										<div class="col-md-4"><?php echo date('h:s',strtotime($interview[0]['interview_time'])); ?></div>
										
										<label class="col-md-2"> Interview Date: </label>
										<div class="col-md-4"><?php echo date('d/m/Y',strtotime($interview[0]['interview_date'])); ?></div>

									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Interviewer Name: </label>
										<div class="col-md-4"><?php echo $interview[0]['interviewer_name']; ?></div>
										
										<label class="col-md-2"> Candidate Name: </label>
										<div class="col-md-4"><?php echo $interview[0]['candidate_name'];?></div>
									</div>
									<div class="form-group" style="clear: both;">
										<label class="col-md-2"> Interviewer Name: </label>
										<div class="col-md-4"><?php echo $interview[0]['location']; ?></div>
									</div>
								<!--	<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Skill Set: </label>
										<div class="col-md-4"><?php echo $contractor[0]['skillset']; ?></div>
										
										<label class="col-md-2"> Experience: </label>
										<div class="col-md-4"><?php echo $contractor[0]['experience'].' '.'Years'; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">  Worked With Us: </label>
										<div class="col-md-4"><?php echo $contractor[0]['worked_with_us']; ?></div>
										
										<label class="col-md-2"> Pay Rate Range: </label>
										<div class="col-md-4"><?php echo $contractor[0]['pay_rate_range']; ?></div>
									</div> -->
								</fieldset>
								<div class="form-group" style="clear:both;">
									<div class="col-md-12">
										<input type="hidden" name="contractor_id" id="contractor_id" value="<?php echo $interview[0]['contractor_id']; ?>">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
										<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
									<div class="btn-group btn-group-lg">
										<a href="<?php echo base_url('recruiter/interview') ?>" type="button" class="btn btn-default"style=""> Back</a> 
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
		

		