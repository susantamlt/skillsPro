<?php include 'header.php';
	$f_course=f(q("SELECT course_id,online_test_level FROM dt_online_test WHERE online_test_id='".$_REQUEST['exam_id']."'"));
	if($f_course['online_test_level']=='C'){
		$rs_questions=q("SELECT * FROM dt_question_bank WHERE course_id='".$f_course['course_id']."'");
	} else {
		$rs_questions=q("SELECT * FROM dt_question_bank WHERE course_id='".$f_course['course_id']."' AND question_level='".$f_course['online_test_level']."'");
	}
?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1" style="padding-top:20px;">Select Exam Questions</h3>
			<input type="hidden" name="exam_id" id="exam_id" value="<?php echo $_REQUEST['exam_id'];?>"/>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="alert alert-success" style="display:none" id="success" role="alert">
					<strong>Well done!</strong> You successfully read this important alert message.
				</div>
				<div class="alert alert-danger" id="error" style="display:none" role="alert">
					<strong>Well done!</strong> You successfully read this important alert message.
				</div>
				<div class="table-responsive">
					<div class="col-sm-6">
						<?php 
							$i=1;
							while ($f_questions=f($rs_questions)) { ?>
							<div><input type="checkbox" class="q_s" name="q_<?php echo $i;?>" id="q_<?php echo $i;?>" value="<?php echo $f_questions['question_id'];?>"/>&nbsp;<?php echo $f_questions['question']."</div>";?>

						 <?php
						 $i++;
						} ?>
						<div class="clearfix"></div>
					</div>	 
					<div class="col-sm-6" id="sel_q_div" style="background:#f2f2f2;min-height:200px;">

					</div> 

				</div>
				<button class="btn-success btn" id="btn_submit">Submit</button>	
			</div>	
		</div>
	  </div>
	  <button name="btn_force_modal" data-toggle="modal" data-target="#myModal" style="display:none"></button>
	  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  	<input type="text" name="batch_id" id="batch_id" value="">
  	<input type="text" name="course_id" id="course_id" value="">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php include 'footer.php';?>
<?php include '../phpjs/partners/selectquestion_js.php';?>	  

