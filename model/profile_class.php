<?php
require_once('database_connection.php');
require_once('datalib.php');
require_once('crypto_class.php');
 
class Profile
{
	public function __Construct()
	{}
	
	public function getUserData($userId)
	{
		$Con = mysqli_connect('localhost','root', '', 'one');
		$sql = "SELECT *
				FROM user
				WHERE userID = '$userId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
		public function getCoachData($coachId)
	{
		$Con = mysqli_connect('localhost','root', '', 'one');
		$sql = "SELECT *
				FROM coach
				WHERE coachID = '$coachId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function getAdminData($userId)
	{
		$Con = mysqli_connect('localhost','root', '', 'one');
		$sql = "SELECT *
				FROM admin
				WHERE adminID = '$userId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function updateProfileP($userId, $newfullName, $ic, $newPass, $newEmail, $newPhone, $newAddress)	
	{		
		$Crypto = new Crypto();
		$encryptPass=$Crypto->combination_encrypt($newPass);
		
		$Con = mysqli_connect('localhost','root', '', 'one');
		$sql = "UPDATE user
				SET userFullname='$newfullName', userIc='$ic', userPassword = '$encryptPass', userEmail = '$newEmail', userPhoneNo = '$newPhone', userAddress = '$newAddress'
				WHERE userId = '$userId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ('Query Failed' . mysqli_error($Con));
		return $result;
		mysqli_close($Con);
    }
	
		public function updateProfileC($userId, $newfullName, $ic, $newPass, $newEmail, $newPhone, $newAddress)	
	{		
		$Crypto = new Crypto();
		$encryptPass=$Crypto->combination_encrypt($newPass);
		
		$Con = mysqli_connect('localhost','root', '', 'one');
		$sql = "UPDATE coach
				SET coachFullname='$newfullName', coachIc='$ic', coachPassword = '$encryptPass', coachEmail = '$newEmail', coachPhoneNo = '$newPhone', coachAddress = '$newAddress'
				WHERE coachId = '$userId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ('Query Failed' . mysqli_error($Con));
		return $result;
		mysqli_close($Con);
    }
	
	public function updateProfileA($userId, $newfullName, $ic, $newPass, $newEmail, $newPhone, $newAddress)	
	{		
		$Crypto = new Crypto();
		$encryptPass=$Crypto->combination_encrypt($newPass);
		
		$Con = mysqli_connect('localhost','root', '', 'one');
		$sql = "UPDATE admin
				SET adminFullname='$newfullName', adminIc='$ic', adminPassword = '$encryptPass', adminEmail = '$newEmail', adminPhoneNo = '$newPhone', adminAddress = '$newAddress'
				WHERE adminId = '$userId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ('Query Failed' . mysqli_error($Con));
		return $result;
		mysqli_close($Con);
    }
	
	public function displayPP($userId)
	{
		$con=mysqli_connect("localhost", "root", "", "one");
		$sql = "select * from user WHERE userID = '$userId'";
		$query = mysqli_query($con, $sql);
		$num = mysqli_num_rows($query);
	
		$result = mysqli_fetch_array($query);
		$img = $result['userImage'];
		?>
        <style>	
        .img-circle {
    	border-radius: 50%;
		}
		</style>
        <?php
		echo '<img class="img-circle" width="120" height="120" src="data: image;base64,'.$img.'">';
	
	}
	
	public function displayPC($userId)
	{
		$con=mysqli_connect("localhost", "root", "", "one");
		$sql = "select * from coach WHERE coachID = '$userId'";
		$query = mysqli_query($con, $sql);
		$num = mysqli_num_rows($query);
	
		$result = mysqli_fetch_array($query);
		$img = $result['coachImage'];
		?>
        <style>	
        .img-circle {
    	border-radius: 50%;
		}
		</style>
        <?php
		echo '<img class="img-circle" width="120" height="120" src="data: image;base64,'.$img.'">';
	}
	
	public function displayPA($userId)
	{
		$con=mysqli_connect("localhost", "root", "", "one");
		$sql = "select * from admin WHERE adminID = '$userId'";
		$query = mysqli_query($con, $sql);
		$num = mysqli_num_rows($query);
	
		$result = mysqli_fetch_array($query);
		$img = $result['userPhoto'];
		?>
        <style>	
        .img-circle {
    	border-radius: 50%;
		}
		</style>
        <?php
		echo '<img class="img-circle" width="120" height="120" src="data: image;base64,'.$img.'">';
	}
}