<?php
include_once("dbutils.php");
    include_once("config.php");

//Connect to database
    $db = connect($DBHost, $DBUser, $DBPassword, $DBName);

//Query database
    $query = "SELECT name, email, phoneNumber, address FROM Employee";

//Count returned rows
if($query->num_rows != 0) { 
//Put results in array
	while($rows = $query->fetch_assoc())
	{
		$name = $rows['name'];
		$email = $rows['email'];
		$phoneNumber = $rows['phoneNumber'];
		$address = $rows['address'];

		echo "<p>Name: $name <br> email: $email</p>"
		header("Location: empAccount.php");
	}
//Display the results
} else {
	echo "N/A"
}
?>
