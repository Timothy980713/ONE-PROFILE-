

 <?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once('../model/profile_class.php');
require_once('../model/database_connection.php');
require_once('../model/crypto_class.php');

if ($_SESSION['userId']=="" || $_SESSION['userName']=="" || $_SESSION['userFullname']=="")
{	
	session_destroy();
	echo "<script language='JavaScript'>alert('You have to login to access this page.');parent.location.href='../login.php';</script>";
}

//object declaration
$Profile = new Profile();
$Crypto = new Crypto();

$userId=$_GET['id'];
$userType=$_GET['type'];

$uId=$_SESSION['userId'];
$userName=$_SESSION['userName'];
$userRole=$_SESSION['userRole'];

if ($userType==1)
{
	$userData = $Profile->getAdminData($userId);
	
	if($userData)
	{	
		foreach($userData as $row)
		{	
			$id= $row["adminID"];
			$fullname= $row["adminFullname"];
			$ic= $row["adminIc"];
			$email= $row["adminEmail"];	
			$phoneNo= $row["adminPhoneNo"];	
			$address= $row["adminAddress"];
			$decryptPW = trim($Crypto->combination_decrypt($row['adminPassword']));
			$userTypeId= $row["userTypeId"];
		}
	}
	else
	{
		echo "<script language='JavaScript'>alert('Can not reach the data.');parent.location.href='../home.php';</script>";
	}
}
else if ($userType==2)
{
	$userData = $Profile->getUserData($userId);
	
	if($userData)
	{	
		foreach($userData as $row)
		{	
			$id= $row["userID"];
			$fullname= $row["userFullname"];
			$ic= $row["userIc"];
			$email= $row["userEmail"];	
			$phoneNo= $row["userPhoneNo"];	
			$address= $row["userAddress"];	
			$decryptPW = trim($Crypto->combination_decrypt($row['userPassword']));
			$status= $row["userStatus"];
			$userTypeId= $row["userTypeId"];
		}
	}
	else
	{
		echo "<script language='JavaScript'>alert('Can not reach the data.');parent.location.href='../home.php';</script>";
	}
}
else
{
	$userData = $Profile->getCoachData($userId);
	
	if($userData)
	{	
		foreach($userData as $row)
		{	
			$id= $row["coachID"];
			$fullname= $row["coachFullname"];
			$ic= $row["coachIc"];
			$email= $row["coachEmail"];	
			$phoneNo= $row["coachPhoneNo"];	
			$address= $row["coachAddress"];
			$decryptPW = trim($Crypto->combination_decrypt($row['coachPassword']));;
			$userTypeId= $row["userTypeId"];
		}
	}
	else
	{
		echo "<script language='JavaScript'>alert('Can not reach the data.');parent.location.href='../home.php';</script>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ONE</title>

</head>
<style>
body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    color: #4A4A52;
}
.bg {
    background-image: url(images/Backgrounds.jpg);
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
input[type=text], input[type=password] {
    width: 60%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button, input[class=btnLogin]{
    background-color: #70c4f1;
    color: white;
    padding: 16px 40px;
    margin: -5px 0;
    border: none;
    cursor: pointer;
    width: 15%;
    border-radius: 25px;
  }
.cancelbtn {
  background-color: #7B0703;
}
button:hover {
    opacity: 0.8;
}
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.container {
    padding: 50px;
}
span.psw {
    float: right;
    padding-top: -1000px;
}
.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; 
    border: 1px solid #888;
    width: 80%; 
}
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}
@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 10%;
    }
}
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    Color: black;
}
.centered1 {
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black;
}
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}
.cancelbtn {
  float: left;
  width: 50%;
}
.signupbtn {
  position: center;
  width: 50%;
}
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
.close1 {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
.topnav{
  text-align: center;
}
.navigation-bar {
    width: 100%;  /* i'm assuming full width */
    height: 80px; /* change it to desired width */
/* change to desired color */
}
.logo {
    display: inline-block;
    vertical-align: top;
    width: 50px;
    height: 50px;
    margin-right: 10px;
    margin-top: 15px;    /* if you want it vertically middle of the navbar. */
}
.navigation-bar > a {
    vertical-align: top;
    padding-right: 10px;
    padding-left: 10px;
    margin-right: 10px;
    margin-left: 20px;
    height: 80px;        /* if you want it to take the full height of the bar */
    line-height: 80px;    /* if you want it vertically middle of the navbar */
    color: #4A4A52;
    text-decoration: none;
    font-weight: bold;
}
.navigation-bar > a:hover{
    vertical-align: top;
    padding-right: 20px;
    padding-left: 20px;
    margin-right: 10px;
    margin-left: 20px;
    height: 80px;        /* if you want it to take the full height of the bar */
    line-height: 80px;    /* if you want it vertically middle of the navbar */
    color: #010B23;
    text-decoration: none;
    font-weight: bold;
}
.formbg {
  padding-top: 1em;
  padding-bottom: 1em;
  background-color:  #f0f5f5;
  border:2px solid #112A54;
  padding-right: 1em;
  padding-left: 1em;
}
.topheader{
  width: 100%;  /* i'm assuming full width */ /* change it to desired width */
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #70c4f1;/* change to desired color */
  color: white;
}
.footerbg{
  width: 100%;  /* i'm assuming full width */ /* change it to desired width */
  padding-top: 10px;
  padding-bottom: 10px;
  background-color: #C3C3C3;
  color: white;
}
.reset{
    width: 100%;  /* i'm assuming full width */ /* change it to desired width */
  padding-top: 10px;
  padding-bottom: 10px;
  background-color: #C3C3C3;
  color: white;
}
hr {
	border-top: 1px solid black;
}
</style>
<script language="JavaScript" type="text/javascript" src="view/js/registration.js"></script>
</head>
    <div class="topheader"><center><img src="walogo.png"></center><center><h1>KURSUS GERAK SENI MELAYU (KGSM)</h1></center>
	    <br>
	</div>
      <body bgcolor="#FBFBFB">
        <div class="container">
        <center><nav class="navigation-bar">
            <h4>Hello,&nbsp;&nbsp;<?php echo $_SESSION['userFullname'];?>!</h4>
            <a href="../home.php">HALAMAN UTAMA</a>
            <a href="viewProfile.php?id=<?php echo $_SESSION['userId']; ?>&type=<?php echo $_SESSION['userRole']; ?>" style="color:#2997C1;" >PROFIL</a>
			<a href="payment.php">PEMBAYARAN</a>
			<a href="viewClass.php">KELAS</a>
		 <?php if($userType==1){?>
			<a href="listParticipant.php">PELAJAR</a>
			<a href="report.php">LAPORAN</a>
		 <?php } else { ?>
			<a href="../contactUs.php" style="color:#2997C1;">HUBUNGI KAMI</a>
		 <?php } ?>
            <a href="../logout.php">LOG KELUAR</a>
        </nav></center>
<br><br><br>
<form class="formbg" name="editProfileForm" method="post">
<center>
      MAKLUMAT AKAUN <hr />
            <center>
      <img id="blah" src="#" alt="image" /><br><br />
        <input type="file" name="fileToUpload" id="fileToUpload"> &nbsp;
        <input type="submit" value="Upload Image" name="submit">
      </center>
      <br><br />
      <center>
        <table style="width:90%">
        <tr>
        <td width="30%">Nama Penuh:</td>
        <td width="70%"><input type="text" id="userFullname" name="userFullname" style="width:100%;" value="<?php echo $fullname;?>" required>
		<input type="hidden" id="utype" name="utype" value="<?php echo $userType; ?>">
        <input type="hidden" id="uid" name="uid" value="<?php echo $id; ?>"><br></td>
        </tr>
         
    <tr>
    <td width="30%">No Kad Pengenalan:</td>
    <td width="70%"><input type="text" id="userIC" name="userIC" style="width:100%;" value="<?php echo $ic;?>" required><br>
    </td>
    </tr>
    
    <tr>
    <td width="30%">Alamat:</td>
    <td width="70%"><input type="text" id="userAddress" name="userAddress" style="width:100%;" value="<?php echo $address;?>" required><br></td>
    </tr>

    <tr>
    <td width="30%">No Telefon:</td>
    <td width="70%"><input type="text" id="userPhoneNo" name="userPhoneNo" style="width:100%;" value="<?php echo $phoneNo;?>" required><br></td>
    </tr>
    </table>
    <br /><br />
    
    TUKAR E-MEL DAN KATA LALUAN <hr />
    <table style="width:90%">
    <tr>
    	<td width="30%">E-mel:</td>
    	<td width="70%"><input type="text" id="userEmail" name="userEmail" style="width:100%;" value="<?php echo $email;?>" required><br></td>
    </tr>
    
    <tr>
        <td width="30%">Kata Laluan Semasa:</td> 
        <td width="70%"><input type="password" id="currentPassword" name="currentPassword" style="width:100%;" value="<?php echo $decryptPW;?>" required><br></td>
    </tr>
    
    <tr>
        <td width="30%">Kata Laluan Baharu:</td> 
        <td width="70%"><input type="password" id="userPassword" name="userPassword" style="width:100%;" ><br></td>
    </tr>
    
    <tr>
        <td width="30%">Pengesahan Kata Laluan:</td> 
        <td width="70%"><input type="password" id="confirmPassword" name="confirmPassword" style="width:100%;" ><br></td>
    </tr>
    </table>
    <br /><br />

    <center><input type="submit" style="border:1px solid; background:#0E1557; height:40px; width:105px; border-radius:3px; color:#FFF;" 
    name="update" id="btnnav" value="Kemaskini" onClick="profile('saveProfile');">
    <input type="reset" style="border:1px solid; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Batal"></center>

        </form>
        </center>
      </div>
    </div>
</div>
</div>

<script language="JavaScript" type="text/javascript" src="js/profile.js"></script>
        <footer>
          <div class="footerbg">
            <center><p>HAKCIPTA TERPELIHARA &copy; 2019 | WARIS ALAM</p></center>
          </div>
        </footer>
</body>
</html