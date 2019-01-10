<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <title>Sign Up</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo config_item('assets_dir');?>favicon.ico" type="image/x-icon" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Core Css -->
    <link href="<?php echo config_item('assets_dir');?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <!-- Waves Effect Css -->
    <link href="<?php echo config_item('assets_dir');?>plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?php echo config_item('assets_dir');?>plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?php echo config_item('assets_dir');?>css/style.css" rel="stylesheet" />
</head>
<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>SkillsPro</b></a>
            <small>SkillsPro Portal</small>
        </div>
        <div class="card">
            <div class="body">
                    <?php echo form_open_multipart('login/registration_save', array('id' =>'sign_up','name'=>'sign_up','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                    <div class="msg" style="color: blue"><b>Register for new membership</b></div>
                    <div id="massage"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="font-size: 22px;">portrait</i>
                        </span>
                        <div class="form-line"> 
                            <div class="input-group input-group-lg" style="margin-bottom:0px;">
                                <span class="input-group-addon" style="text-align:left;height:auto;padding:0px 0px;">
                                    <input type="radio" name="type" class="ig_radio" id="type1" value="1">
                                    <label for="type1">User</label>
                                </span>
                                <span class="input-group-addon" style="text-align:left;height:auto;padding:0px 0px;">
                                    <input type="radio" name="type" class="ig_radio" id="type3" value="3">
                                    <label for="type3">Recruiters</label>
                                </span>
                                <span class="input-group-addon" style="text-align:left;height:auto;padding:0px 0px;">
                                    <input type="radio" name="type" class="ig_radio" id="type6" value="6">
                                    <label for="type6">Contractor</label>
                                </span>
                            </div>
                            <div class="input-group input-group-lg" style="margin-bottom:0px;">
                                <span class="input-group-addon" style="text-align:left;height:auto;padding:0px 0px;">
                                    <input type="radio" name="type" class="ig_radio" id="type2" value="2">
                                    <label for="type2">Sales</label>
                                </span>
                                <span class="input-group-addon" style="text-align:left;height:auto;padding:0px 0px;">
                                    <input type="radio" name="type" class="ig_radio" id="type7" value="7">
                                    <label for="type7">Client</label>
                                </span>
                                <!-- <span class="input-group-addon" style="text-align:left;height:auto;padding:0px 0px;">
                                    <input type="radio" name="type" class="ig_radio" id="type4" value="4">
                                    <label for="type4">Performance</label>
                                </span> -->
                            </div>
                            <div class="input-group input-group-lg" style="margin-bottom:0px;">
                                <!-- <span class="input-group-addon" style="text-align:left;height:auto;padding:0px 0px;">
                                    <input type="radio" name="type" class="ig_radio" id="type5" value="5">
                                    <label for="type5">Operations</label>
                                </span> -->
                            </div>
                        </div>
                        <label id="type-error" class="error" for="type" style="display:none;"></label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="font-size: 22px">person</i> </span>
                        <div class="form-line"> 
                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Name" />
                        </div>
                        <label id="user_name-error" class="error" for="user_name" style="display:none;"></label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="font-size: 22px">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" />
                        </div>
                        <label id="email-error" class="error" for="email" style="display:none;"></label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="font-size: 22px">phone_iphone</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="mobile" id="mobile" minlength="10" placeholder="Mobile No" />
                        </div>
                        <label id="mobile-error" class="error" for="mobile" style="display:none;"></label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="font-size: 22px">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                        </div>
                        <label id="password-error" class="error" for="password" style="display:none;"></label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons"style="font-size:22px">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confarm" id="confarm" minlength="5" placeholder="Confirm Password" />
                        </div>
                        <label id="confarm-error" class="error" for="confarm" style="display:none;"></label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink" style="left:4px;">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>
                        <div class="m-t-25 m-b--5 align-center">
                            <a href="<?php echo config_item('base_url');?>login/">Goto Login Page!</a>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="<?php echo config_item('assets_dir');?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?php echo config_item('assets_dir');?>plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo config_item('assets_dir');?>plugins/node-waves/waves.js"></script>
    <!-- Validation Plugin Js -->
    <script src="<?php echo config_item('assets_dir');?>plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo config_item('assets_dir');?>plugins/jquery-validation/additional-methods.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo config_item('assets_dir');?>js/admin.js"></script>
    </body>
 </html>
<script type="text/javascript">
        $(function() {
              $.validator.addMethod("regex",function(value, element, regexp) {
                    if (regexp.constructor != RegExp)
                        regexp = new RegExp(regexp);
                    else if (regexp.global)
                        regexp.lastIndex = 0;
                    return this.optional(element) || regexp.test(value);
                },"Please check your input.");
                $("form[name='sign_up']").validate({
                    rules: {
                        "user_name": {
                            required: true,
                            regex:/^[a-zA-Z ]*$/,
                        },
                        "type": {
                            required: true,
                        },
                        "email": {
                            required: true,
                            email: true,
                            regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/, 
                        },
                        "password": {
                            required: true,
                            minlength: 5,
                            maxlength:10,
                        },
                        "confarm": {
                            required: true,
                            equalTo: "#password",
                        },
                        "mobile": {
                            required: true,
                            minlength:7,
                            maxlength:10,
                            number:true,
                        },
                    },
                    messages: {
                        "user_name": {
                            required:"Please enter user name",
                            regex: "Special character and Number not allowed"
                        },
                        "type": {
                            required: "Please select your type"
                        },
                        "email": {
                            required:"Please enter email",
                            regex: "Please provide valid Email"
                        }, 
                        "password" : {
                            required:"Please enter password",
                            minlength:"The Password must be a minimum length of five",
                            maxlength:"Maximum ten character password allowed"
                        },
                        "confirm" : {
                            required:"Please enter confirm password",
                            equalTo: "Please enter the same value again."
                        },
                        "mobile" : {
                            required:"Please enter mobile no",
                            minlength:"Please enter atleast 7 digits",
                            maxlength:"Cheak number of digits you enter",
                            number:"Special charecter And Letter not allowed "
                        },

                    },
                    onfocusout: function(element) {
                        this.element(element);
                    },
                    submitHandler: function(form,event){
                        event.preventDefault();// using this page stop being refreshing
                        var formData = new FormData();
                        formData.append('user_name', $('#user_name').val());
                        formData.append('password', $('#password').val());
                        formData.append('email', $('#email').val());
                        formData.append('phone', $('#mobile').val());
                        formData.append('type', $('input[name="type"]:checked').val());
                        formData.append('org_id', '1');
                        $.ajax({
                            url: form.action,
                            type: form.method,
                            async:false,
                            cache:false,
                            contentType:false,
                            enctype:'multipart/form-data',
                            processData:false,
                            data: formData,
                            success: function(response) {
                               var res = JSON.parse(response);
                                if(res.status==1){
                                    var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Registration done successfully</strong></div>';
                                    $('#massage').html(html);
                                    var urlnew = "<?php echo site_url('login') ?>";
                                    window.location.href = urlnew;
                                }else { 
                                    var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong> This User already exists </strong></div>';
                                    $('#massage').html(html);
                                }
                            }
                        });
                    }
                });
            });
        </script>