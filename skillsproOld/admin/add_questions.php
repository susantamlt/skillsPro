<?php include 'header.php'; ?>
 <div id="page-wrapper">
 <div class="graphs">
    <h3 class="blank1" style="padding-top:20px;">Add Questions </h3>
    <div style="width:100%; float:left;margin-bottom:20px;">
    <button class="btn-success btn" id="btn_upload" style="width:40%;background-color:#8BC343; "onclick="window.location = 'add_bulk_upload.php';">Upload Bulk Questions</button></div>
    <script type="text/javascript">
     $(".ajax-file-upload").append('Upload Bulk Data File');
	 $("#btn_upload_bulk").uploadFile({
	 url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_file_upload.php",
     fileName:"myfile",
	 allowedTypes:"csv",
	 onSuccess:function(files,data,xhr,pd)
	{
	 var hid_file=$("#hid_doc_file_image").val();
	 var ff=$.parseJSON(data);
	 hid_file+='~'+ff.res;
	 $("#hid_doc_file_image").val(hid_file);
	}
	 });
	 </script>
    <div class="clearfix"></div>
	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	<div class="alert alert-success" style="display:none" id="success" role="alert">
	<strong>Well done!</strong> You successfully read this important alert message.
	</div>
	 <div class="alert alert-danger" id="error" style="display:none" role="alert">
	 <strong>Well done!</strong> You successfully read this important alert message.
     </div>
	<form class="form-horizontal">
	<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id']; ?>"/>
	<input type="hidden" id="online_test_id" value="<?php echo $f_exam['online_test_id']; ?>"/>
	 <div class="form-group">
	 <label for="selector1" class="col-sm-2 control-label">Topic Name</label>
	 <div class="col-sm-8">
	 <select name="topic_id" id="topic_id" class="form-control1">
  <option>Select Topic</option>
	 <?php
$rs_topic = q("SELECT * FROM dt_topics WHERE created_id='" . $_SESSION['partner_id'] .
    "'");
while ($f_topic = f($rs_topic)) { ?>
	   <option value="<?php echo $f_topic['topic_id']; ?>" <?php if ($f_exam['topic_id'] ==
$f_topic['topic_id']) { ?> selected="selected" <?php } ?>><?php echo
$f_topic['topic_name']; ?></option>
	   <?php } ?>
	   </select>
	   </div>
	   </div>
 <div class="form-group">
	 	 <label for="selector1" class="col-sm-2 control-label">Course Name</label>
 <div class="col-sm-8">
	 <select name="course_id" id="course_id" class="form-control1">
		 <option>Select Course</option>
 	<?php if ($mode == 'edit') {
    $rs_course = q("SELECT * FROM dt_courses WHERE topic_id='$topic_id' AND  created_id='" .
        $_SESSION['partner_id'] . "'");
    while ($f_course = f($rs_course)) {
?>
	  <option value="<?php echo $f_course['course_id']; ?>" <?php if ($f_course['course_id'] ==
$f_exam['course_id']) { ?> selected="selected"<?php } ?>><?php echo
$f_course['course_name']; ?></option>	
	  <?php
    }
}
?>
	</select>
 </div>
 </div>
     <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label">Question</label>
	 <div class="col-sm-8">
	   <!-- <input type="textarea" class="form-control1" id="question" name="question" placeholder="Question"> -->
	    <textarea id="question" name="question"></textarea>
	</div>
	</div>
	<div class="form-group">
	      <label for="focusedinput" class="col-sm-2 control-label">Marks Allocated for the Question</label>
    <div class="col-sm-4">
	       <input type="text" class="form-control1" id="marks_allocated" name="marks_allocated" placeholder="Allocate Marks">
	   </div>
	   </div>
	<div class="form-group">
	      <label for="focusedinput" class="col-sm-2 control-label">Option Type</label>
	<div class="col-sm-8">
	      <input type="radio"  id="option_type1" name="option_type" value="MCS"> Multiple Choice Single Answer
	      <input type="radio"  id="option_type2" name="option_type" value="MCSI"> Multiple Choice Single Answer Image
	      <input type="radio"  id="option_type3" name="option_type" value="MCM"> Multiple Choice Multiple Answer
	      <input type="radio"  id="option_type4" name="option_type" value="MCMI"> Multiple Choice Multiple Answer Image
	      <input type="radio"  id="option_type5" name="option_type" value="TXT"> Text Based
          <input type="radio"  id="option_type6" name="option_type" value="VID"> Video Questions
	      <input type="radio"  id="option_type7" name="option_type" value="IMG"> Image Questions
	      <input type="radio"  id="option_type8" name="option_type" value="MAT"> Matrix Choice
	      <input type="radio"  id="option_type8" name="option_type" value="LIK"> Likert Scale
   </div>
   </div>
	<div class="form-group">
	      <label for="focusedinput" class="col-sm-2 control-label">Question Type</label>
	<div class="col-sm-8">
	      <input type="radio"  id="question_type1" name="question_type" value="E" > Easy
	      <input type="radio"  id="question_type2" name="question_type" value="M"> Medium
	      <input type="radio"  id="question_type3" name="question_type" value="H"> Hard
	  </div>
	  </div>
	<div class="form-group cls_video_url" style="display:none">
		  <label for="focusedinput" class="col-sm-2 control-label">Video Url</label>
	<div class="col-sm-4">
		  <input type="text" class="form-control1" id="video_url" name="video_url" placeholder="Video URL">
	</div>
	</div>	
	<div class="form-group image_upload"  style="display:none">
		  <label for="focusedinput" class="col-sm-2 control-label">Image</label>
	<div class="col-sm-4">
	<div id="fileuploader_image">Upload Course Pic</div>
		 <input type="hidden" class="opt_class" name="hid_doc_file_image" id="hid_doc_file_image" value=""/>
	</div>
	<script type="text/javascript">
		 $("#fileuploader_image").uploadFile({
	     url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_file_upload.php",
	     fileName:"myfile",
	     allowedTypes:"png,jpg,jpeg,gif",
		 onSuccess:function(files,data,xhr,pd)
	   {
		 var hid_file=$("#hid_doc_file_image").val();
		 var ff=$.parseJSON(data);
	     hid_file+='~'+ff.res;
		 $("#hid_doc_file_image").val(hid_file);
       }
	   });
	</script>
	</div>
  <div class="form-group optcls" style="display:none">
	    <label for="focusedinput" class="col-sm-2 control-label">Options</label>
  </div>
		<div class="form-group mcsm" style="display:none"> 
		<div class="form-group" id="opt_1">
		<label for="focusedinput" class="col-sm-2 control-label"></label>
  <div class="col-sm-4">
		<input type="text" class="form-control1 opt_class" data-v="1" id="option_1" name="option_1" placeholder="Option 1">
  </div>
  <div class="col-sm-2">
		<input type="checkbox" class="right_class" id="right_ans_1" name="right_ans_1"> Right Answer
   </div>
  <div class="col-sm-2"><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add(2)">+</a></div>
   </div>
  <div class="form-group" id="opt_2" style="display:none">
	    <label for="focusedinput" class="col-sm-2 control-label"></label>
  <div class="col-sm-4">
		<input type="text" class="form-control1 opt_class" data-v="2" id="option_2" name="option_2" placeholder="Option 1">
  </div>
  <div class="col-sm-2">
		<input type="checkbox" class="right_class" id="right_ans_2" name="right_ans_2"> Right Answer
  </div>
 <div class="col-sm-2"><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add(3)">+</a></strong><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt(2)">-</a></strong></div>
 </div>
 <div class="form-group" id="opt_3" style="display:none">
		<label for="focusedinput" class="col-sm-2 control-label"></label>
		<div class="col-sm-4">
		<input type="text" class="form-control1 opt_class" data-v="3" id="option_3" name="option_3" placeholder="Option 1">
 </div>
 <div class="col-sm-2">
		<input type="checkbox" class="right_class" id="right_ans_3" name="right_ans_3"> Right Answer
 </div>
		<div class="col-sm-2"><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add(4)">+</a></strong><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt(3)">-</a></</strong></div>
 </div>
 <div class="form-group" id="opt_4" style="display:none">
		 <label for="focusedinput" class="col-sm-2 control-label"></label>
 <div class="col-sm-4">
		 <input type="text" class="form-control1 opt_class" data-v="4" id="option_4" name="option_4" placeholder="Option 1">
 </div>
 <div class="col-sm-2">
		 <input type="checkbox" class="right_class" id="right_ans_4" name="right_ans_4"> Right Answer
</div>
  <div class="col-sm-2"><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add(5)">+</a></strong><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt(4)">-</a></strong></div>
</div>
  <div class="form-group" id="opt_5" style="display:none">
		<label for="focusedinput" class="col-sm-2 control-label"></label>
  <div class="col-sm-4">
		<input type="text" class="form-control1 opt_class" data-v="5" id="option_5" name="option_5" placeholder="Option 1">
  </div>
  <div class="col-sm-2">
	    <input type="checkbox" class="right_class" id="right_ans_5" name="right_ans_5"> Right Answer
  </div>
 <div class="col-sm-2"><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add(6)">+</a></strong><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt(5)">-</a></strong></div>
  </div>
 <div class="form-group" id="opt_6" style="display:none">
		<label for="focusedinput" class="col-sm-2 control-label"></label>
 <div class="col-sm-4">
		<input type="text" class="form-control1 opt_class" data-v="6" id="option_6" name="option_6" placeholder="Option 1">
 </div>
 <div class="col-sm-2">
		<input type="checkbox" class="right_class" id="right_ans_6" name="right_ans_6"> Right Answer
 </div>
 <div class="col-sm-2"><a href="javascript:" style="font-size:30px;font-weight:bold" >+</a></strong><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt(6)">-</a></strong></div>
 </div>
 </div>
 <div class="form-group mcsmi" style="display:none"> 
  <div class="form-group" id="opt_img_1">
	    <label for="focusedinput" class="col-sm-2 control-label"></label>
 <div class="col-sm-4">
 <div id="fileuploader_1">Upload Course Pic</div>
		<input type="hidden" class="opt_class_img" name="hid_doc_file_1" data-v="1" id="hid_doc_file_1" value=""/>
</div>
	<div class="col-sm-2">
		 <input type="checkbox" class="right_class" id="right_ans_img_1" name="right_ans_1"> Right Answer
	</div>
    <div class="col-sm-2"><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add_img(2)">+</a></div>
		<script type="text/javascript">
		$("#fileuploader_1").uploadFile({
		url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_file_upload.php",
		fileName:"myfile",
		allowedTypes:"png,jpg,jpeg,gif",
        onSuccess:function(files,data,xhr,pd)
       {
		var hid_file=$("#hid_doc_file_1").val();
		var ff=$.parseJSON(data);
	    hid_file+='~'+ff.res;
		$("#hid_doc_file_1").val(hid_file);
	   }
	   });
		</script>
		</div>
		<div class="form-group" id="opt_img_2" style="display:none">
		<label for="focusedinput" class="col-sm-2 control-label"></label>
		<div class="col-sm-4">
		<div id="fileuploader_2">Upload Course Pic</div>
		<input type="hidden" class="opt_class_img" name="hid_doc_file_2" data-v="2" id="hid_doc_file_2" value=""/>
		</div>
		<div class="col-sm-2">
		<input type="checkbox" class="right_class_img" id="right_ans_img_2" name="right_ans_2"> Right Answer
		</div>
		<div class="col-sm-2"><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add_img(3)">+</a><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt_img(2)">-</a></strong></div>
		<script type="text/javascript" >
		$("#fileuploader_2").uploadFile({
		url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_file_upload.php",
		fileName:"myfile",
		allowedTypes:"png,jpg,jpeg,gif",
		onSuccess:function(files,data,xhr,pd)
		{ 
		var hid_file=$("#hid_doc_file_2").val();
		var ff=$.parseJSON(data);
		hid_file+='~'+ff.res;
		$("#hid_doc_file_2").val(hid_file);
		}
		});
		</script>
		</div>
		<div class="form-group" id="opt_img_3" style="display:none">
		<label for="focusedinput" class="col-sm-2 control-label"></label>
		<div class="col-sm-4">
	    <div id="fileuploader_3">Upload Course Pic</div>
		<input type="hidden" class="opt_class_img" name="hid_doc_file_3" data-v="3" id="hid_doc_file_3" value=""/>
		</div>
		<div class="col-sm-2">
		<input type="checkbox" class="right_class_img" id="right_ans_img_3" name="right_ans_3"> Right Answer
		 </div>
		<div class="col-sm-2"><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add_img(4)">+</a><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt_img(3)">-</a></strong></div>
		<script type="text/javascript">
		$("#fileuploader_3").uploadFile({
		url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_file_upload.php",
	    fileName:"myfile",
		allowedTypes:"png,jpg,jpeg,gif",
		onSuccess:function(files,data,xhr,pd)
		{
		var hid_file=$("#hid_doc_file_3").val();
		var ff=$.parseJSON(data);
		hid_file+='~'+ff.res;
		$("#hid_doc_file_3").val(hid_file);
		}
		});
		</script>
		</div>
		<div class="form-group" id="opt_img_4" style="display:none">
	    <label for="focusedinput" class="col-sm-2 control-label"></label>
		<div class="col-sm-4">
		<div id="fileuploader_4">Upload Course Pic</div>
		<input type="hidden" class="opt_class_img" name="hid_doc_file_4" data-v="4" id="hid_doc_file_4" value=""/>
		</div>
		 <div class="col-sm-2">
		 <input type="checkbox" class="right_class_img" id="right_ans_img_4" name="right_ans_4"> Right Answer
		</div>
		 <div class="col-sm-2"><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add_img(5)">+</a><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt_img(4)">-</a></strong></div>
		 <script type="text/javascript">
		 $("#fileuploader_4").uploadFile({
		 url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_file_upload.php",
		 fileName:"myfile",
		 allowedTypes:"png,jpg,jpeg,gif",
		 onSuccess:function(files,data,xhr,pd)
		{
		 var hid_file=$("#hid_doc_file_4").val();
		 var ff=$.parseJSON(data);
		 hid_file+='~'+ff.res;
		 $("#hid_doc_file_4").val(hid_file);
		}
		});
		</script>
		</div>
	    <div class="form-group" id="opt_img_5" style="display:none">
		<label for="focusedinput" class="col-sm-2 control-label"></label>
		<div class="col-sm-4">
		<div id="fileuploader_5">Upload Course Pic</div>
		<input type="hidden" class="opt_class_img" name="hid_doc_file_5" data-v="5" id="hid_doc_file_5" value=""/>
		</div>
		<div class="col-sm-2">
         <input type="checkbox" class="right_class_img" id="right_ans_img_5" name="right_ans_5"> Right Answer
		</div>
	   <div class="col-sm-2"><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add_img(6)">+</a><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt_img(5)">-</a></strong></div>
	   <script type="text/javascript">
		$("#fileuploader_5").uploadFile({
		url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_file_upload.php",
		fileName:"myfile",
		allowedTypes:"png,jpg,jpeg,gif",
		onSuccess:function(files,data,xhr,pd)
		{
		var hid_file=$("#hid_doc_file_5").val();
		var ff=$.parseJSON(data);
		hid_file+='~'+ff.res;
		$("#hid_doc_file_5").val(hid_file);
		}
		});
		</script>
		</div>
		<div class="form-group" id="opt_img_6" style="display:none">
		<label for="focusedinput" class="col-sm-2 control-label"></label>
		<div class="col-sm-4">
		<div id="fileuploader_6">Upload Course Pic</div>
		<input type="hidden" class="opt_class_img" name="hid_doc_file_6" data-v="6" id="hid_doc_file_6" value=""/>
		</div>
		<div class="col-sm-2">
		<input type="checkbox" class="right_class_img" id="right_ans_img_6" name="right_ans_6"> Right Answer
		</div>
		<div class="col-sm-2"><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="add_img(7)">+</a><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt_img(6)">-</a></strong></div>
		<script type="text/javascript">
	     $("#fileuploader_6").uploadFile({
		 url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_file_upload.php",
		 fileName:"myfile",
		 allowedTypes:"png,jpg,jpeg,gif",
		 onSuccess:function(files,data,xhr,pd)
		{
		 var hid_file=$("#hid_doc_file_6").val();
		 var ff=$.parseJSON(data);
		 hid_file+='~'+ff.res;
		 $("#hid_doc_file_6").val(hid_file);
		}
		});
		</script>
		</div>
	    <div class="form-group" id="opt_img_7" style="display:none">
		<label for="focusedinput" class="col-sm-2 control-label"></label>
		<div class="col-sm-4">
		<div id="fileuploader_7">Upload Course Pic</div>
		<input type="hidden" class="opt_class_img" name="hid_doc_file_7" id="hid_doc_file_7" value=""/>
		</div>
		<div class="col-sm-2">
		<input type="checkbox" class="right_class_img" id="right_ans_img_7" name="right_ans_7"> Right Answer
		</div>
	    <div class="col-sm-2"><strong><a href="javascript:" style="font-size:30px;font-weight:bold" onclick="subt_img(7)">-</a></strong></div>
		
	</div>
	</div>
      <div class="form-group likeart" style="display:none"> 
      <div class="form-group" >
	  <label for="focusedinput" class="col-sm-2 control-label"></label>
	  <div class="col-sm-4">
	  <input type="checkbox"  id="chk_group_likert" name="chk_group_likert">Grouped Likert
	</div>
	</div>
	  <div class="cls_likert_qs">
	  <div class="form-group" id="grouped_likert_qs_1" >
	  <label for="focusedinput" class="col-sm-2 control-label">Likert Question 1</label>
	  <div class="col-sm-4">
	  <input type="text" class="form-control1 likeart_qs_txt" id="likeart_qs_1" name="likeart_qs_1" placeholder="Likert Group Question 1">
	</div>
	  <div class="col-sm-2"><a href="javascript:" data-v="1" class="plus_s" style="font-size:30px;font-weight:bold" >+</a></div>
	</div>
	</div>		
	 <div class="form-group optcls_lik" style="display:none">
	<label for="focusedinput" class="col-sm-2 control-label">Options</label>
	</div>
     <div class="opt_likert_cls">
	 <div class="form-group" id="opt_likeart1">
	 <label for="focusedinput" class="col-sm-2 control-label"></label>
	 <div class="col-sm-4">
	 <input type="text" class="form-control1 opt_class_likeart"  data-vt="1"   id="option_likeart_1" name="option_likeart_1" placeholder="Text Value">
	</div>
	 <div class="col-sm-2">
	 <input type="text" class="form-control1 opt_class_likeart_val"  data-vv="1" id="option_likeart_val_1" name="option_likeart_val_1" value="1" placeholder="Equivalent Numeric Value">
	</div>
	 <div class="col-sm-2"><a href="javascript:" data-v="1" style="font-size:30px;font-weight:bold" class="plus_s_lik">+</a></div>
	</div>
	</div>	
	</div>	
	 <div class="form-group">
	 <div class="col-sm-8 col-sm-offset-4">
	 <button class="btn-success btn" id="btn_submit" style="width:50%;">Submit</button>
	</div>
    </div>
	</div>
	</div>		
	 <div class="clearfix"> </div>
	</div>
	</div>
    <script type="text/javascript">
        $("#fileuploader_7").uploadFile({
        url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_file_upload.php",
        fileName:"myfile",
        allowedTypes:"png,jpg,jpeg,gif",
        onSuccess:function(files,data,xhr,pd)
            {
            var hid_file=$("#fileuploader_7").val();
            var ff=$.parseJSON(data);
            hid_file+='~'+ff.res;
            $("#fileuploader_7").val(hid_file);
            }
        });
        $("#topic_id").change(function(){
        var topic_id=$(this).val();
            $.ajax({
            type:"POST",
            url:"ajax_course_by_topic.php",
            data:{'topic_id':topic_id,'course_id':$("#course_id").val()},
            success:function(data){
            //alert(data);
            $("#course_id").html(data);
            }
            });
        });
    
        $(document).on('click','#btn_submit',function(e){
        
            var topic_id=$("#topic_id").val();
            var course_id=$("#course_id").val();;
            var question=tinyMCE.get('question').getContent();
            //alert(question);
            //$("#question").val();
            var question_type=$("#question_type").val();
            var option_type=$("#option_type").val();
            var partner_id=$("#partner_id").val();
            var marks_allocated=$("#marks_allocated").val();
            
            var video_url=$("#video_url").val();
            var image_question=$("#image_question").val();
            
            var grouped_likert=$("#grouped_likert").val();
            
            $("input[name='chk_group_likert']").each(function(){
                if($(this).is(":checked"))
                    grouped_likert="Y";
                else
                    grouped_likert="N";
            });
            $("input[name='question_type']").each(function(){
                if($(this).is(":checked"))
                question_type=$(this).val();
            });
            
            $("input[name='option_type']").each(function(){
            if($(this).is(":checked"))
            option_type=$(this).val();
            
            });
            var opt='';
            var right='';
            var qs_likert='';
            var opt_likert_txt='';
            var opt_likert_val='';
            if(option_type=='MCS' || option_type=='MCSI' || option_type=='MCM' || option_type=='MCMI' || option_type=='TXT' || option_type=='VID'){
                if(option_type=='IMG' || option_type=='MAT' || option_type=='LIK'){
                $(".opt_class").each(function(){
                    if($(this).val()!=''){
                    if(opt=='')
                        opt+=$(this).val();
                    else
                        opt+='~'+$(this).val();
                    //alert($(this).data('v'))
                    if($("#right_ans_"+ $(this).data('v')).is(":checked")){
                       if(right==''){
                           right+=$(this).data('v');
                       }else{
                           right+='~'+$(this).data('v'); 
                       } 
                    } 
                    }
                });
                }else{   
                    opt='';
                    right=''; 
                    $(".opt_class_img").each(function(){
                        if($(this).val()!=''){
                            //alert($(this).attr('id'));
                            if(opt=='')
                            opt+=$(this).val();
                            else
                            opt+='~'+$(this).val();
                            //alert($(this).attr('id')+'-'+opt);
                            if($("#right_ans_img_"+ $(this).data('v')).is(":checked")){
                            if(right==''){
                            right+=$(this).data('v');
                            }else{
                            right+='~'+$(this).data('v'); 
                            } 
                            } 
                        }
                    });
                }    
            }
            if(option_type=='LIK'){
                $(".likeart_qs_txt").each(function(){
                if(qs_likert=='')
                qs_likert=$(this).val();
                else
                qs_likert+='~'+$(this).val();
                });
            
                $(".opt_class_likeart").each(function(){
                    if(opt_likert_txt==''){
                        opt_likert_txt=$(this).val();
                    }else{
                        opt_likert_txt+='~'+$(this).val()
                    }
                    var vt=$(this).data('vt');
                    var val=$("#option_likeart_val_"+vt).val();
                    if(opt_likert_val==''){
                        opt_likert_val=val;
                    }else{
                        opt_likert_val+='~'+val;
                    }
                });
            }
            var valid=1;
            if(topic_id=='' && valid==1){
                valid=0;
                $("#error").show();
                $("#error").text("Please select topic");
            }
            if(course_id=='' && valid==1){
                valid=0;
                $("#error").show();
                $("#error").text("Please select Course");
            }
            if(question=='' && valid==1){
                valid=0;
                $("#error").show();
                $("#error").text('Please enter question');
            }
            if(question=='' && valid==1){
                valid=0;
                $("#error").show();
                $("#error").text('Please enter question');
            }
            if(valid==1){
                $.ajax({
                    type:"POST",
                    url:"<?php echo WEBDIR . ROOT; ?>partners/ajax_save_question.php",
                    data:{"topic_id":topic_id,"course_id":course_id,"question":question,"question_type":question_type,"option_type":option_type,'created_by':'P','created_id':partner_id,"opt":opt,"right-ans":right,"qs_likert":qs_likert,"opt_likert_txt":opt_likert_txt,"opt_likert_val":opt_likert_val,"video_url":video_url,"image_question":image_question,"marks_allocated":marks_allocated,"grouped_likert":grouped_likert},
                    dataType:"json",
                    success:function(data){
                        if(data.result==1){
                            $("#error").hide();
                            $("#success").show();
                            $("#success").text("Question saved successfully");
                            setTimeout(function(){ window.location.href="list_question.php"; }, 1500); 
                        }else{
                            $("#success").hide();
                            $("#error").show();
                            $("#error").text("Some problem occured");
                        }
                    }
                });
            }
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            e.preventDefault();
        });
    
    </script>
<?php include '../phpjs/partners/question_js.php'; ?>			
<?php include 'footer.php'; ?>    