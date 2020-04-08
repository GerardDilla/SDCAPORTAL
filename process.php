<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

$studentID = $_POST['ID'];
$password = $_POST['Password'];

$studentID = stripcslashes($studentID);
$password = stripcslashes($password);
$studentID = mysql_real_escape_string($studentID);
$password = mysql_real_escape_string($password);

mysql_connect("localhost", "root" , "");
mysql_select_db("account");

$result = mysql_query("select * from accounts where StudentID = '$studentID' and Password = '$password'") or die("Failed to connect to database".mysql_error());

$row = mysql_fetch_array($result);
if ($row['StudentID']==$studentID && $row['Password'] == $password){
	
	header("Location: user.php");
	}
	else if($studentID == false && $password == false){
		echo "No account available";
		}
	else{
		die ("No account available");
		}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connecting</title>
</head>

<body>
</body>
</html>