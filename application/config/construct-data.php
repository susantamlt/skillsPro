<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Priority Ranking
| -------------------------------------------------------------------
*/
// Lead Status
$config['ljp_status'] = array (''=>'--Select One--','1'=>'In-progress','2'=>'Waiting for approval','3'=>'On-Hold','4'=>'Filled','5'=>'Cancelled','6'=>'Declined','7'=>'Inactive');
$config['ljp_leadtype'] = array (''=>'--Select One--','1'=>'Full time','2'=>'Part time','3'=>'Temporary','4'=>'Contract','5'=>'Permanent','6'=>'Any','7'=>'Training','8'=>'Volunteer','9'=>'Seasonal','10'=>'Freelance','11'=>'Employee`s Choice');
$config['ljp_leadcat'] = array ('1'=>'Virtual Manager','2'=>'IT','3'=>'Non IT','4'=>'Profesional','5'=>'Project');
$config['ljp_leadcats'] = array ('1'=>'Virtual Manager','2'=>'IT','3'=>'Non IT','4'=>'Profesional','5'=>'Project');
$config['ljp_lead_cats'] = array (''=>'--Select One--','1'=>'Virtual Manager','2'=>'IT','3'=>'Non IT','4'=>'Profesional');
$config['ljp_typeSalary'] = array (''=>'--Select One--','1'=>'Hourly','2'=>'Daily','3'=>'Weekly','4'=>'Monthly','5'=>'Yearly');
$config['ljp_projectType'] = array (''=>'--Select One--','1'=>'Web Application','2'=>'E-commerce','3'=>'Web Designing','4'=>'Data Analytics','5'=>'Mobile Apps','6'=>'CRM','7'=>'CMS','8'=>'Digital Marketing','8'=>'Testing');
$config['ljp_projectStatus'] = array (''=>'--Select One--','1'=>'Warm','2'=>'Hot','3'=>'Cold','4'=>'Close');
$config['ljp_projectStage'] = array (''=>'--Select One--','1'=>'Contracted Sent','2'=>'Closed','3'=>'Sourcing','4'=>'Interview','5'=>'Opportunity Closed');
$config['ljp_contractType'] = array (''=>'--Select One--','1'=>'Company-to-Company','2'=>'Requirement Basis');
?>