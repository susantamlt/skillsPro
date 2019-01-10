<?php include 'header.php';
$chapter_id=$_GET['chapter_id'];
$mode=$_GET['mode'];
$f_chapter=f(q("SELECT * FROM dt_chapters WHERE chapter_id='$chapter_id'"));
if($f_chapter['chapter_pic']!=''){
	$chapter_pic=explode('~',$f_chapter['chapter_pic']);

}
?>
			<div id="page-wrapper">
				<div class="graphs">
				<h3 class="blank1">Add Chapter </h3>
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						   <div class="alert alert-success" style="display:none" id="success" role="alert">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
						   <div class="alert alert-danger" id="error" style="display:none" role="alert">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
						   <form class="form-horizontal">
						   		<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>"/>
						   		<input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>"/>
							   	<input type="hidden" id="chapter_id" value="<?php echo $f_chapter['chapter_id'];?>"/>
							   	<div class="form-group">
							   		<label for="selector1" class="col-sm-2 control-label">Topic Name</label>
									<div class="col-sm-8">
									   	<select name="topic_id" id="topic_id" class="form-control1">
											<option>Select Topic</option>
											<?php 

											$rs_topic=q("SELECT topic_id,topic_name FROM dt_topics WHERE created_by='P' and created_id='".$_SESSION['partner_id']."'");
											while($f_topic=f($rs_topic)){?>
											<option value="<?php echo $f_topic['topic_id'];?>" <?php if($f_topic['topic_id']==$f_chapter['topic_id']){?>selected="selected"<?php } ?>><?php echo $f_topic['topic_name'];?></option>      
											<?php } ?>      
										</select>
									</div>
							   	</div>
							   	<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Chapter Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" id="chapter_name" name="chapter_name" value="<?php echo $f_chapter['chapter_name'];?>" placeholder="Chapter Name">
										</div>
										
								</div>
								<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Chapter Price</label>
										<div class="col-sm-6">
											<input type="text" class="form-control1" id="chapter_price" name="chapter_price" value="<?php echo $f_chapter['chapter_price'];?>" placeholder="Chapter Price">
										</div>
										<div class="col-sm-2">
											<select name="currency" id="currency" class="form-control1">
												<option value="INR" <?php if($f_chapter['currency']='INR'){?> selected="selected" <?php } ?> >INR</option>
												<option value="USD" <?php if($f_chapter['currency']='USD'){?> selected="selected" <?php } ?> >USD</option>
											</select>
										</div>
								</div>
								<div class="form-group">
										<input type="hidden" name="course_pic" id="course_pic"/>
										<label for="focusedinput" class="col-sm-2 control-label">Upload Chapter PIC </label>
										<div class="col-sm-8">
											<div id="fileuploader">Upload Course Pic</div>
											<input type="hidden" name="hid_doc_file" id="hid_doc_file" value="<?php echo $f_chapter['chapter_pic'];?>"/>
										</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"></label>
									<div class="col-sm-8">
										<img class="img-responsive" style="width:100px" src="<?php echo WEBDIR.ROOT;?>/uploads/courses/<?php echo $chapter_pic[1];?>" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-4">
										<button class="btn-success btn" id="btn_submit" style="width:50%;">Submit</button>
									</div>
								</div>
						   </form>
						</div>
					</div>
				</div>
			</div>	
<?php include 'footer.php';?>
<?php include '../phpjs/partners/chapters_js.php';?>					   