<?php
require 'PHP/Dbconnect.php';

function getUserData($userID){
	
	 $array = array();
	 $userquery = mysql_query("SELECT * FROM accounts WHERE StudentID='.$userID'");
	 while($row = mysql_fetch_assoc($userquery)){
		 
		  $_SESSION['Name'] = $row['Name'];
		 
	 }
}
?>