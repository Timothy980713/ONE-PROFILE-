<?php
require_once("../model/profile_class.php");

$Profile = new Profile();

$activity = $_GET['activity'];

if($activity=="saveProfile")
{
	$userId=$_POST["uid"];
	$newfullName=$_POST["userFullname"];
	$ic=$_POST["userIC"];
	$newPass=$_POST["userPassword"];
	$newEmail=$_POST["userEmail"];	
	$newPhone=$_POST["userPhoneNo"];	
	$newAddress=$_POST["userAddress"];	
	$userTypeId=$_POST["utype"];	
	
	//$name=addslashes($_FILES['image']['name']);
	//$image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
	
	if($userTypeId==1){
		$result=$Profile->updateProfileA($userId, $newfullName, $ic, $newPass, $newEmail, $newPhone, $newAddress);
		//$result=$Profile->updateProfileP($userId, $newfullName, $newPass, $newEmail, $newPhone, $newAddress, $name, $image);	
	}
	else if($userTypeId==2){
		$result=$Profile->updateProfileP($userId, $newfullName, $ic, $newPass, $newEmail, $newPhone, $newAddress);
		//$result=$Profile->updateProfileP($userId, $newfullName, $newPass, $newEmail, $newPhone, $newAddress, $name, $image);	
	}
	else	{
		$result=$Profile->updateProfileC($userId, $newfullName, $ic, $newPass, $newEmail, $newPhone, $newAddress);
		//$result=$Profile->updateProfileA($userId, $newfullName, $newPass, $newEmail, $newPhone, $newAddress, $name, $image);
	}
	
	if($result==true)
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('The profile is updated SUCCESSFULLY!');
		window.location.href='../home.php';</script>";  
	}
	else
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('The profile can not be updated. Try again');
		window.history.back();</script>"; 	
	}
}
?>