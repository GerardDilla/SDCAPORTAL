<?php

session_start();
$hostname = "localhost";
$user = "root";
$pass = "";
$db = "account";

mysql_connect($hostname, $user, $pass);
mysql_select_db($db);

if(isset($_POST['loginBtn'])){
	
	$userID = $_POST['ID'];
	$password = $_POST['Password'];
	
	$sql = "SELECT * FROM accounts WHERE StudentID='".$userID."' AND Password='".$password."' LIMIT 1";
	$result = mysql_query($sql);
	
	if (mysql_num_rows($result) == 1) {
		 header("Location: user.php");
			
		 }else{
		 header("Location: index.php");
		 
		 exit();
	 }

	 $array = array();
	 $usersql = mysql_query("SELECT * FROM accounts WHERE StudentID='".$userID."'"); 
     $row = mysql_fetch_assoc($usersql);
	
	 $_SESSION['Firstname'] = $row['Firstname'];
	 $_SESSION['Initial'] = $row['Initial'];
	 $_SESSION['Lastname'] = $row['Lastname'];
	 $_SESSION['Course'] = $row['Course'];
	 $_SESSION['Birth'] = $row['Birthday'];
	 $_SESSION['Address'] = $row['Address'];
	 $_SESSION['Email'] = $row['Email'];
	 $_SESSION['number'] = $row['Contact_number'];
	 $_SESSION['UserID'] = $row['StudentID'];
}

	

	
?>