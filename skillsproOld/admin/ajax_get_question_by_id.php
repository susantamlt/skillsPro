<?php include 'top.php';
      $question_id=$_REQUEST['question_id'];
      $f_question=f(q("SELECT question,question_id FROM dt_question_bank WHERE question_id='$question_id'"));

 ?>
<div class="col-sm-12">
<span id="sp_<?php echo $f_question['question_id'];?>"><?php echo $f_question['question'];?></span> <a href="javascript:void(0)" class="q_cls" data-id="<?php echo $f_question['question_id'];?>">X</a>
</div>



