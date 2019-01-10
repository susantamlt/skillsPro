<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta name="viewport" content="width=device-width" /><!-- IMPORTANT -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Order Confirmed</title>
<style type="text/css">
* {margin:0;padding:0;}
* { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }
img {max-width: 100%;}
.collapse {margin:0;padding:0;}
body {-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width: 100%!important;height: 100%;}
a { color: #2BA6CB;}
.btn {text-decoration:none;color:#FFF;background-color:#666;width:80%;padding:15px 10%;font-weight:bold;text-align:center;cursor:pointer;display:inline-block;}
p.callout {padding:15px;text-align:center;background-color:#ECF8FF;margin-bottom: 15px;}
    .callout a {
        font-weight:bold;
        color: #2BA6CB;
    }
    
    .column table { width:100%;}
    .column {
        width: 300px;
        float:left;
    }
    .column tr td { padding: 15px; }
    .column-wrap { 
        padding:0!important; 
        margin:0 auto; 
        max-width:600px!important;
    }
    .columns .column {
        width: 280px;
        min-width: 279px;
        float:left;
    }
    table.columns, table.column, .columns .column tr, .columns .column td {
        padding:0;
        margin:0;
        border:0;
        border-collapse:collapse;
    }
    
    /* ------------------------------------- 
            HEADER 
    ------------------------------------- */
    table.head-wrap { width: 100%;}
    
    .header.container table td.logo { padding: 15px; }
    .header.container table td.label { padding: 15px; padding-left:0px;}
    
    
    /* ------------------------------------- 
            BODY 
    ------------------------------------- */
    table.body-wrap { width: 100%;}
    
    
    /* ------------------------------------- 
            FOOTER 
    ------------------------------------- */
    table.footer-wrap { width: 100%;    clear:both!important;
    }
    .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
    .footer-wrap .container td.content p {
        font-size:10px;
        font-weight: bold;
        
    }
    
    
    /* ------------------------------------- 
            TYPOGRAPHY 
    ------------------------------------- */
    h1,h2,h3,h4,h5,h6 {
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
    }
    h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }
    
    h1 { font-weight:200; font-size: 44px;}
    h2 { font-weight:200; font-size: 37px;}
    h3 { font-weight:500; font-size: 27px;}
    h4 { font-weight:500; font-size: 23px;}
    h5 { font-weight:900; font-size: 17px;}
    h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}
    
    .collapse { margin:0!important;}
    
    p, ul { 
        margin-bottom: 10px; 
        font-weight: normal; 
        font-size:14px; 
        line-height:1.6;
    }
    p.lead { font-size:17px; }
    p.last { margin-bottom:0px;}
    
    ul li {
        margin-left:5px;
        list-style-position: inside;
    }
    
    hr {
        border: 0;
        height: 0;
        border-top: 1px dotted rgba(0, 0, 0, 0.1);
        border-bottom: 1px dotted rgba(255, 255, 255, 0.3);
    }
    
    
    /* ------------------------------------- 
            Shopify
    ------------------------------------- */

    .products {
        width:100%;
        height:40px;
        margin:10px 0 10px 0;
    }
    .products img {
        float:left;
        height:40px;
        width:auto;
        margin-right:20px;
    }
    .products span {
        font-size:17px;
    }
    
    
    /* --------------------------------------------------- 
            RESPONSIVENESS
            Nuke it from orbit. It's the only way to be sure. 
    ------------------------------------------------------ */
    
    /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
    .container {
        display:block!important;
        max-width:600px!important;
        margin:0 auto!important; /* makes it centered */
        clear:both!important;
    }
    
    /* This should also be a block element, so that it will fill 100% of the .container */
    .content {
        padding:15px;
        max-width:600px;
        margin:0 auto;
        display:block; 
    }
    
    /* Let's make sure tables in the content area are 100% wide */
    .content table { width: 100%; }
    
    /* Be sure to place a .clear element after each set of columns, just to be safe */
    .clear { display: block; clear: both; }
    
    
    /* ------------------------------------------- 
            PHONE
            For clients that support media queries.
            Nothing fancy. 
    -------------------------------------------- */
    @media only screen and (max-width: 600px) {
        
        a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}
    
        div[class="column"] { width: auto!important; float:none!important;}
        
        table.social div[class="column"] {
            width:auto!important;
        }
    
    }
</style>

</head>
 
<body bgcolor="#FFFFFF">
<!-- BODY -->
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">
            <div class="content">
            <table>
                <tr>
                    <td><h5 class="collapse" style="text-align: center;">Best, Experienced Contractors for Hire</h5></td>
                </tr>
                <tr>
                    <td>
                        <br/>
                        <!-- <h6>Hello </h6> -->
                        <p>Hi. We found your job posting <b>"<?php echo $prospect_title; ?>"</b>. We are excited to engage with you to help you fill this position.</p>
                        <p>We’re a global, professional resource augmentation company based out of Baltimore, MD. We bring differentiated value with simplified engagement to get you the best resource through a single call. Newtonmast’s unique, state-of-the-art solution will provide contractors to your organization from our well-trained professional contractors with a quick turn-around time. Our contractors have the expertise to support your needs across various industries.</p>
                        <p>As collaborative partners, we will provide free of charge all the pre-placement steps required for the contractor to meet your expectations such as: screening as per your specific needs, coordinating interviews along with <b>Simple Paperwork &amp; Easy Payments</b>.</p>
                        <p>As part of program management we will also provide you free of the charge the following services:</p>
                        <ul style="margin-left:20px;">
                            <li>E-verification</li>
                            <li>I-9 documentation</li>
                            <li>Background screening</li>
                            <li>Payroll &amp; Taxation</li>
                        </ul>
                        <p>I think we'd be able to help you with our pool of good, experienced candidates. If you’re interested, would you like to have them interviewed if I send them over?</p>
                        <p>Please call/text: 410-881-0160 / 786-870-4399 today</p>
                        <p>Website: www.newtonmast.com</p>
                        <!-- <p style="text-align:center;">
                            <a class="btn" href="javascript:void(o)">Click Feedback</a>
                        </p> -->
                        <p style="text-align:center;">
                            If you don't want to receive further notiffications, click <a href="<?php echo base_url('feedack/unsubscribe/').$contact_email_id; ?>">Unsubscribe</a>
                        </p>
                    </td>
                </tr>
            </table>
            </div>
                                    
        </td>
        <td></td>
    </tr>
</table>
<!-- /BODY -->
</body>
</html>