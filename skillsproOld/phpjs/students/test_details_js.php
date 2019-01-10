<script type="text/javascript">
	$("#start_the_exam").click(function(e){
		$("#start_the_exam").parent().css('display','none');
		$("#next_question_btn").parent().css('display','block');
		load_question();
	});
	$("#next_question_btn").click(function(e){
		if($('#question_n').val() > 0 && load_question() == 1){
			save_question_answers();
		}
		//load_question();
		e.preventDefault();
	});
	function load_question() {
		var q_num=$("#question_n").val();
		var count = $('#question_n').val();
		var flag = 0;
		//alert($('.answers_questions').find('input.answer_field').length);
		/*if (count == 0) {
            flag = 0;
        }*/
		if ($('.answers_questions').find('input.answer_field').length != 0 && !$(".answer_field").is(":checked")) {
			//alert('onmcheck');
			$('#error').show("fast");
			$('#error').html('Please answer to the question');
			flag=1;
		}else if($('.txt_option_val').val() == ''){
			//alert('optins');
			$('#error').show("fast");
			$('#error').html('Please answer to the question');
			flag=1;
		}else{
			flag = 0;
		}
		if (flag == 0) {
			$.ajax({
				type:"POST",
				url:"ajax_test_questions_details.php",
				data:{'q_num':q_num},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						var $input = $('#question_n');
						$input.val( $input.val() + 1 );
						$("#question_n").val(q_num);
						$("#error").hide();
						$("#question_detail").html(data.response_data);
					}else{
						$('#error').html('');
						$("#next_question_btn").parent().css('display','none');
						$("#question_detail").html('<h4>Thanks for Taking exam, We`ll mail you the results shortly.</h4>');
						setTimeout(function(){window.location="my-quiz.php";},3000);
					}
				}
			});
			return 1;
        }
		$("html, body").animate({ scrollTop: 0 }, "slow");
		
    }
	function save_question_answers() {
		var allVals = [];
		var options_type_to_check = $('#options_type_to_check').val();
		if(options_type_to_check == 'MCS' || options_type_to_check == 'MCSI'){
			var option_chosen = $('input[name=option_id]:checked').val();
		}else if(options_type_to_check == 'MCM' || options_type_to_check == 'MCMI'){
			$('.option_val:checked').each(function() {
				allVals.push($(this).val());
			});
		}else if(options_type_to_check == 'LIK'){
			var option_chosen = $('input[name=option_id]:checked').val()
		}else if(options_type_to_check == 'VID'){
			var option_chosen = $('.vid_option_val').val();
		}else if(options_type_to_check == 'IMG'){
			var option_chosen = $('.img_option_val').val();
		}else if(options_type_to_check == 'TB'){
			var option_chosen_txt = $('.txt_option_val').val();
		}
		if ((option_chosen != null && option_chosen != '') || allVals != '' || option_chosen_txt != '') {
			$.ajax({
				type:"POST",
				url:"ajax_save_question_answers.php",
				data:{'options_type_to_check':options_type_to_check,"option_chosen":option_chosen,"allVals":allVals,"option_chosen_txt":option_chosen_txt},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						var $input = $('#question_n');
						$input.val( $input.val() + 1 );
						$("#question_n").val(q_num);
						$("#error").hide();
						$("#question_detail").html(data.response_data);
					}else{
						$('#error').html('');
						$("#next_question_btn").parent().css('display','none');
					}
				}
			});
		}
    }
</script>