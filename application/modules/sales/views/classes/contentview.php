
<section class="content">
        <div class="container-fluid">
            <!-- Custom Content -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>CONTENT</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                            	<?php if(!empty($data)){ ?>
                            		<?php $types = array('V'=>'video.png','A'=>'audio.png','T'=>'txt.png','P'=>'pdf.png', 'WD'=>'word.png','E'=>'excel.png','C'=>'csv.png'); ?>
                            		<?php $types1 = array('V','A','T','P','WD','E','C'); ?>
                            		<?php foreach ($data as $dk => $dv) { ?>
		                                <div class="col-sm-6 col-md-3">
		                                    <div class="thumbnail">
		                                    	<?php if(in_array($dv['content_type'], $types1)) { ?>
		                                        	<img src="<?php echo config_item('assets_dir');?>images/<?php echo $types[$dv['content_type']];?>" />
		                                    	<?php } else { ?>
		                                    		<img src="http://placehold.it/500x300" class="img-responsive">
		                                    	<?php } ?>
		                                        <div class="caption">
		                                            <h3><?php echo $dv['module_name'] ?></h3>
		                                            <p>
		                                                <a href="<?php echo base_url('sales/classes/content_details');?>/<?php echo $dv['module_id'] ?>" data-id="<?php echo $dv['module_id'] ?>" class="btn btn-primary waves-effect" role="button">Open</a>
		                                            </p>
		                                        </div>
		                                    </div>
		                                </div>
                            		<?php } ?>
	                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Custom Content -->
        </div>
    </section>