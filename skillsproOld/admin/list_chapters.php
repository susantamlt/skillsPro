<?php include 'header.php';
	$rs_chapters=q("SELECT * FROM dt_chapters a INNER JOIN dt_topics b ON a.topic_id=b.topic_id  WHERE a.chapter_created_by='P' AND a.created_id='".$_SESSION['partner_id']."' order by chapter_id desc");


?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">List Chapters </h3>
			<div class="bs-example4" data-example-id="simple-responsive-table">
			
			<?php
			 
			 while($f_chapters=f($rs_chapters)){
			 	if($f_chapters['chapter_pic']!='')
					$chapter_pic=explode('~',$f_chapters['chapter_pic']);
				else
					$chapter_pic[1]="na.gif";
			 	?>
			<div class="col-md-4 span8">
				<div class="activity_box activity_box1">
					<h3><?php echo $f_chapters['chapter_name'];?></h3>
					<br/>
					<a href="<?php echo WEBDIR.ROOT;?>partners/add_chapters.php?chapter_id=<?php echo $f_chapters['chapter_id'];?>"><img class="img-responsive" style="width: 80%!important;
    text-align: center!important;
    margin-left: auto!important;
    margin-right: auto!important;" src="<?php echo WEBDIR.ROOT;?>/uploads/courses/<?php echo $chapter_pic[1];?>">
				</div>
			</div>	
			<?php }
			?>
						  <div class="clearfix"></div>
		</div>
	  </div>
<?php include 'footer.php';?>
<?php include '../phpjs/partners/chapters_js.php';?>	  

