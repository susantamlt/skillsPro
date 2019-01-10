<?php include 'header.php'; 
	$question_id=$_GET['question_id'];
	$sql_question="SELECT question FROM dt_question_bank WHERE question_id='$question_id' ";
	$f_question=f(q($sql_question));
?>

<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">Add Options</h3>	
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal">
					<div class="alert alert-success" role="alert" id="success" style="display:none">
					<strong>Well done!</strong> You successfully read this important alert message.
					</div>
					<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>" />
					<input type="hidden" name="question_id" id="question_id" value="<?php echo $_GET['question_id'];?>" />
					<div class="alert alert-danger" role="alert" id="error" style="display:none">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
					<div class="form-group offset-10">
							<label for="focusedinput" class="col-sm-2 control-label " style="text-align: left;font-weight: bold;"></label>
							<label for="focusedinput" class="col-sm-10 control-label " style="text-align: left;font-weight: bold;"><?php echo stripslashes($f_question['question']);?></label>
					</div>			   
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Option 1</label>
							<div class="col-sm-5">
								<input type="text" class="form-control1" id="option_1" name="opt" placeholder="Default Input">&nbsp;
							</div>
							<div class="col-sm-2">
								<input type="checkbox"  name="is_right" id="is_right_1"/>&nbsp;Right Answer
							</div>
							<div class="col-sm-1"><a href="javascript:" class="opt_plus" data-next="div_opt_2"><i class="fa fa-plus"></i></a></div>	
					</div>
					<div class="form-group" id="div_opt_2" style="display: none;">
							<label for="focusedinput" class="col-sm-2 control-label">Option 2</label>
							<div class="col-sm-5">
								<input type="text" class="form-control1" id="option_2" name="opt" placeholder="Default Input">&nbsp;
							</div>
							<div class="col-sm-2">
								<input type="checkbox" name="is_right" id="is_right_2"/>&nbsp;Right Answer
							</div>
							<div class="col-sm-1"><a href="javascript:" class="opt_plus" data-next="div_opt_3"><i class="fa fa-plus"></i></a>&nbsp;<a href="javascript:" class="opt_minus" data-next="div_opt_2"><i class="fa fa-minus"></i></a></div>	
					</div>
					<div class="form-group" id="div_opt_3" style="display: none;">
							<label for="focusedinput" class="col-sm-2 control-label">Option 3</label>
							<div class="col-sm-5">
								<input type="text" class="form-control1" id="option_3" name="opt" placeholder="Default Input">&nbsp;
							</div>
							<div class="col-sm-2">
								<input type="checkbox" name="is_right" id="is_right_3"/>&nbsp;Right Answer
							</div>
							<div class="col-sm-1"><a href="javascript:" class="opt_plus" data-next="div_opt_4"><i class="fa fa-plus"></i></a>&nbsp;<a href="javascript:" class="opt_minus" data-next="div_opt_3"><i class="fa fa-minus"></i></a></div>	
					</div>
					<div class="form-group" id="div_opt_4" style="display: none;">
							<label for="focusedinput" class="col-sm-2 control-label">Option 4</label>
							<div class="col-sm-5">
								<input type="text" class="form-control1" id="option_4" name="opt" placeholder="Default Input">&nbsp;
							</div>
							<div class="col-sm-2">
								<input type="checkbox" name="is_right" id="is_right_4"/>&nbsp;Right Answer
							</div>
							<div class="col-sm-1"><a href="javascript:" class="opt_plus" data-next="div_opt_5"><i class="fa fa-plus"></i></a>&nbsp;<a href="javascript:" class="opt_minus" data-next="div_opt_4"><i class="fa fa-minus"></i></a></div>	
					</div>
					<div class="form-group" id="div_opt_5" style="display: none;">
							<label for="focusedinput" class="col-sm-2 control-label">Option 5</label>
							<div class="col-sm-5">
								<input type="text" class="form-control1" id="option_5" name="opt" placeholder="Default Input">&nbsp;
							</div>
							<div class="col-sm-2">
								<input type="checkbox" name="is_right" id="is_right_5"/>&nbsp;Right Answer
							</div>
							<div class="col-sm-1"><a href="javascript:" class="opt_minus" data-next="div_opt_5"><i class="fa fa-minus"></i></a></div>	
					</div>							
					<div class="form-group offset-10" >
						<button class="btn-success btn" id="btn_submit">Submit</button>	
					</div>
					
					
				</form>	
			</div>
		</div>			
	</div>
</div>
<?php include 'footer.php';?>	
<?php include '../phpjs/partners/option_js.php';?>	