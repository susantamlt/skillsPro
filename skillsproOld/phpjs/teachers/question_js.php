<script type="text/javascript">
$(document).on('click','.plus_s',function(){
    var $parent = $(this).parent().parent();
    $parent.clone().appendTo(".cls_likert_qs");
    var i=parseInt($(".cls_likert_qs").children('.form-group').length);
    var obj=$(".cls_likert_qs").children(":last").children().eq(0);
    var obj1=$(".cls_likert_qs").children(":last").children().eq(1).children();
    var obj2=$(".cls_likert_qs").children(":last").children().eq(2);
    $(".cls_likert_qs").children(":last").attr('id','grouped_likert_qs_'+i);
    obj.text('Likert Question '+i);
    obj1.attr('id','likeart_qs_'+i);
    obj1.attr('name','likeart_qs_'+i);
    obj1.attr('placeholder','Likert Group Question '+i);

    obj2.children().attr('data-v',i);
    obj2.children().eq(1).remove();
    var html='<a href="javascript:" data-v="'+i+'" class="minus_s" style="font-size:30px;font-weight:bold" >-</a>'
    obj2.append(html);

});  
$(document).on('click','.plus_s_lik',function(){
    var $parent = $(this).parent().parent();
    $parent.clone().appendTo(".opt_likert_cls");
    var i=parseInt($(".opt_likert_cls").children('.form-group').length);
    var obj=$(".opt_likert_cls").children(":last").children().eq(1).children();
    var obj1=$(".opt_likert_cls").children(":last").children().eq(2).children();
    var obj2=$(".opt_likert_cls").children(":last").children().eq(3);
   
    obj.attr('id','option_likeart_'+i);
    obj.attr('name','option_likeart_'+i);
    obj.attr('data-vt',i);
    
    obj1.attr('id','option_likeart_val_'+i);
    obj1.attr('name','option_likeart_val_'+i);
    obj1.attr('data-vv',i);
   

    obj2.children().attr('data-v',i);
    obj2.children().eq(1).remove();
    var html='<a href="javascript:" data-v="'+i+'" class="minus_s_lik" style="font-size:30px;font-weight:bold" >-</a>'
    obj2.append(html);

});  
$(document).on('click','.minus_s',function(){
  var v= $(this).data('v');
  $("#grouped_likert_qs_"+v).remove();

}); 
$(document).on('click','.minus_s_lik',function(){
  var v= $(this).data('v');
  $("#grouped_likert_qs_"+v).remove();

});  
$("#topic_id").change(function(){
      var topic_id=$(this).val();
      $.ajax({
        type:"POST",
        url:"ajax_course_by_topic.php",
        data:{'topic_id':topic_id,'partner_id':$("#partner_id").val()},
        success:function(data){
          $("#course_id").html(data);
        }
      });
  });
function add(obj){
	$("#opt_"+obj).show();
}  
function subt(obj){
	$("#opt_"+obj).hide();
}
function add_img(obj){
  $("#opt_img_"+obj).show();
}  
function subt_img(obj){
  $("#opt_img_"+obj).hide();
}
$("#btn_submit").click(function(e){
	var topic_id=$("#topic_id").val();
	var course_id=$("#course_id").val();;
	var question=$("#question").val();
	var question_type='';
  var option_type='';
	var partner_id=$("#partner_id").val();
  var video_url=$("#video_url").val();
  var image_question=$("#image_question").val();
  var grouped_likert='';
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
  if(option_type=='MCS' || option_type=='MCSI' || option_type=='MCM' || option_type=='MCMI' || option_type=='VID' || option_type=='IMG'){
     if(option_type=='MCS' || option_type=='MCM' || option_type=='VID' || option_type=='IMG'){
          $(".opt_class").each(function(){
              	if($(this).val()!=''){
            		if(opt=='')
            			opt+=$(this).val();
            		else
            			opt+='~'+$(this).val();
            		alert($(this).data('v'))

            		
            		if($("#right_ans_"+	$(this).data('v')).is(":checked")){
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
                alert(opt);
                alert($(this).attr('id'));
              if(opt=='')
                opt+=$(this).val();
              else
                opt+='~'+$(this).val();
              alert($(this).attr('id')+'-'+opt);

              
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
    		url:"<?php echo WEBDIR.ROOT;?>partners/ajax_save_question.php",
    		data:{"topic_id":topic_id,"course_id":course_id,"question":question,"question_type":question_type,"option_type":option_type,'created_by':'P','created_id':partner_id,"opt":opt,"right-ans":right,"qs_likert":qs_likert,"opt_likert_txt":opt_likert_txt,"opt_likert_val":opt_likert_val,"video_url":video_url,"image_question":image_question,"grouped_likert":grouped_likert},
    		dataType:"json",
    		success:function(data){
          if(data.result==1){
    				$("#error").hide();
    				$("#success").show();
    				$("#success").text("Question saved successfully");
    			}else{
    				$("#success").hide();
    				$("#error").show();
            $("#error").text("Some problem occured");
    			}
    		}
    	});
    }
	
	e.preventDefault();
});	


$("input[name='option_type']").click(function(){
 
  if($(this).val()=='MCS' || $(this).val()=='MCM'){
    $(".optcls").show();
    $(".optcls_lik").hide();
    $(".mcsm").show();
    $(".mcsmi").hide();
    $(".cls_video_url").hide();
    $(".image_upload").hide();
    $(".likeart").hide();
  }
  if($(this).val()=='MCSI' || $(this).val()=='MCMI'){
    $(".optcls").show();
    $(".optcls_lik").hide();
    $(".mcsmi").show();
    $(".mcsm").hide();
     $(".cls_video_url").hide();
    $(".image_upload").hide();
    $(".likeart").hide();
  }
  if($(this).val()=='TXT' ){
    $(".optcls").hide();
    $(".optcls_lik").hide();
    $(".mcsmi").hide();
    $(".mcsm").hide();
     $(".cls_video_url").hide();
    $(".image_upload").hide();
    $(".likeart").hide();
  }
  if($(this).val()=='VID' ){
    $(".optcls").show();
    $(".optcls_lik").hide();
    $(".mcsmi").hide();
    $(".mcsm").show();
     $(".cls_video_url").show();
    $(".image_upload").hide();
    $(".likeart").hide();
  }
  if($(this).val()=='IMG' ){
    $(".optcls").show();
    $(".optcls_lik").hide();
    $(".mcsmi").hide();
    $(".mcsm").show();
     $(".cls_video_url").hide();
    $(".image_upload").show();
    $(".likeart").hide();
  }

  if($(this).val()=='LIK' ){
    $(".optcls").hide();
    $(".optcls_lik").show();
    $(".mcsmi").hide();
    $(".mcsm").hide();
    $(".cls_video_url").hide();
    $(".image_upload").hide();
    $(".likeart").show();
  }

});
</script>