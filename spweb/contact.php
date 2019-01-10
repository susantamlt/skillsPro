<?php 
$fistname = $_POST["fistname"];
$lastname = $_POST["lastname"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$message = $_POST["message"];

if($email!=''){
	// Multiple recipients
	$to = 'anupam.roy@mindtechlabs.com'; // note the comma

	// Subject
	$subject = 'Skillspro Contact';

	// Message
	$message = '
	<html>
	<head>
	<title>Skillspro Contact</title>
	</head>
	<body>
	<table>
	<tr>
	<td>Fist Name: </td><td>'.$fistname.'</td>
	</tr>
	<tr>
	<td>Last Name: </td><td>'.$lastname.'</td>
	</tr>
	<tr>
	<td>Phone: </td><td>'.$phone.'</td>
	</tr>
	<tr>
	<td>E-mail: </td><td>'.$email.'</td>
	</tr>
	<tr>
	<td>Message: </td><td>'.$message.'</td>
	</tr>
	</table>
	</body>
	</html>
	';

	// To send HTML mail, the Content-type header must be set
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';

	// Additional headers
	$headers[] = 'To: Anupam Roy <anupam.roy@mindtechlabs.com>';
	$headers[] = 'From: '.$fistname.' '.$lastname.' <'.$email.'>';
	$headers[] = 'Cc: avik.mitra@mindtechlabs.com ';
	$headers[] = 'Bcc: susantakumardas@mindtechlabs.com';

	// Mail it
	$result = mail($to, $subject, $message, implode("\r\n", $headers));
	if($result==1){
		$data = array('status' =>'1','msg'=>'E-mail sent successfully' );
	} else {
		$data = array('status' =>'0','msg'=>'E-mail send failure' );
	}
} else {
	$data = array('status' =>'0','msg'=>'E-mail send failure' );
}
echo json_encode($data);
?>