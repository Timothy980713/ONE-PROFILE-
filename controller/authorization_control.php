<?php
require_once("../model/authorization_class.php");

$Authorization = new Authorization();

$activity = $_GET['activity'];

if($activity=="login")
{
	$loginName=$_POST['userName'];
	$loginPass=$_POST['userPass'];
	$userType=$_POST['utype'];
	
	$Access=$Authorization->AuthenticateLogin($loginName,$loginPass, $userType);
	$getNo = $Authorization->getNo($loginName, $userType);
	if($userType=="2")
	{
		$id = 'B' . $getNo;
	}
	else if($userType=="3")
	{
		$id = 'C' . $getNo;
	}
	$saveID = $Authorization->saveID($loginName,$id, $userType);
}

if($activity=="signup")
{
	if ($email_add=="")	
	{	echo "<script language='JavaScript'>alert('No information.');window.location='../view/boundary/staff/edit_profile.php';</script>";	}
	else if ((strpos($email_add, '@') !== false) && (strpos($email_add, '.') !== false))
	{	
		$ChangeEmail=$Authorization->updateEmail($np,$email_add);
	}
}
	
if($activity=="forgot")
{
	$email=$_POST['email'];
	$to_email = "receipient@gmail.com";
	$subject = "Simple Email Test via PHP";
	$body = "Hi,nn This is test email send by PHP Script";
	$headers = "From: sender\'s email";
 
	if (mail($to_email, $subject, $body, $headers)) {
   		echo("Email successfully sent to $to_email...");
	} 
	else {
    	echo("Email sending failed...");
	}
}

if($activity=="reset")
{
	$password=$_POST['pass'];
	$password2=$_POST['repass'];
	
	//$Access=$Authorization->AuthenticateLogin($password,$password2);	
	echo "Password Telah Berjaya Diubah";
}
?>

