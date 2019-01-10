		<section class="content">
			<input type="hidden" name="page" id="page" value="questions" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Question View</h2>
							</div>
							<div class="body">
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Course Name: </label>
									<div class="col-md-4"><?php echo $ljp_data[0]['course_name']; ?></div>
									<label class="col-md-2"> Question: </label>
									<div class="col-md-4"><?php echo $ljp_data[0]['question']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<?php $question_type = array(''=>'','E'=>'Easy','M'=>'Medium','H'=>'Hard'); ?>
									<label class="col-md-2"> Question Lavel: </label>
									<div class="col-md-4"><?php echo $question_type[$ljp_data[0]['question_level']]; ?></div>
                                    <?php $question = array('' =>'','MCQ'=>'Radio','DESC'=>'Paragraph','MCQ2'=>'Multi Select','Text'=>'Single Line','DrDw'=>'Drop Down','Or'=>'Yes/No','Video'=>'Video Questions','Image'=>'Image Questions','Matrix'=>'Matrix Choice'); ?>
									<label class="col-md-2"> Question Type: </label>
									<div class="col-md-4"><?php echo $question[$ljp_data[0]['question_type']]; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Allocated Marks: </label>
									<div class="col-md-4"><?php echo $ljp_data[0]['marks_allocated']; ?></div>

									<label class="col-md-2"> End Date: </label>
									<div class="col-md-4"><?php echo $ljp_data[0]['video_url']; ?></div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<a href="<?php echo site_url('admin/questions/questionslist/') ?>" class="btn btn-default">Back</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
					
						</div>
					</div>
				</div>
			</div>
		</section>