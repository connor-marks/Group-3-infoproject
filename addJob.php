<?php
	include_once('config.php');
	include_once('dbutils.php');
	
	if (session_start()) {
	  $email = $_SESSION['email'];
	}
?>

<?php
// check if email already in database
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPassword,$DBName);

	// set up my query
	$query = "SELECT companyID, parentCompany FROM Company ORDER BY parentCompany;";
	print($query);
	
	// run the query
	$result = queryDB($query, $db);
	
	// options for club teams
	$parentCompanyOptions= "";
	
	// go through all club teams and put together pull down menu
	while ($row = nextTuple($result)) {
		$clubTeamOptions .= "\t\t\t";
		$clubTeamOptions .= "<option value='";
		echo $row;
		$clubTeamOptions .= $row['companyID'] . "'>" . $row['parentCompany'] . ")</option>\n";
	}
?>


<html>
<head>
	<title>
		<?php echo "Add Job" . $Title; ?>
	</title>

	<!-- Following three lines are necessary for running Bootstrap -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
</head>

<body>
<div class="container">

<!-- Page header -->
<div class="row">
<div class="col-xs-12">
<div class="page-header">
	<h1><?php echo "Add Job: " . $Title; ?></h1>
</div>
</div>
</div>

<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.
if (isset($_POST['submit'])) {
	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$jobTitle = $_POST['jobTitle'];
	$parentCompany = $_POST['parentCompany'];
	$address = $_POST['address'];
	$hourlyPay = $_POST['hourlyPay'];
	

	// check if email already in database
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPassword,$DBName);
	
	echo $email;
	
	// set up my query
	$query = "SELECT email FROM Employee WHERE email='$email';";
	
	// run the query
	$result = queryDB($query, $db);

	// check if the email is there
	//if (nTuples($result) > 0) {
	   //punt("The email address $email is already in the database");
	//}
	
	// generate hashed password using the system-provided salt.
	//$hashedPass = crypt($password1);
	
	// set up my query
	$query = "INSERT INTO Job(jobTitle, hourlyPay, email) VALUES ('$jobTitle', $hourlyPay, '$email');";
	print($query);
	
	$query1 = "INSERT INTO Company(parentCompany, address) VALUES ('$parentCompany', '$address');";
	print($query1);
	
	
	// run the query
	$result = queryDB($query, $db);
	$result = queryDB($query1, $db);
	$result = queryDB($query2, $db);
	
	// tell users that we added the player to the database
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
	echo "\t\tThe user " . $email . " was added to the database\n";
	echo "</div></div>\n";
}
?>

<!-- Form to enter new users -->
<div class="row">
<div class="col-xs-12">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="form-group">
	<label for="jobTitle">Job Title:</label>
	<input type="text" class="form-control" name="jobTitle"/>
</div>

<div class="form-group">
	<label for="parentCompany">Select Company</label>
	<select class="form-control" name="parentCompany">
<?php echo $parentCompanyOptions; ?>
	</select>
</div>

<div class="form-group">
	<label for="address">Company Address:</label>
	<input type="text" class="form-control" name="address"/>
</div>

<div class="form-group">
	<label for="hourlyPay">Hourly Wage:</label>
	<input type="text" class="form-control" name="hourlyPay"/>
</div>

<button type="submit" class="btn btn-default" name="submit">Add</button>

</form>

</div>
</div>


<!-- Titles for table -->
<thead>
<tr>

</tr>
</thead>

<tbody>
<?php
	//connect to database
	$db = connectDB($DBHost,$DBUser,$DBPassword,$DBName);
	
	//set up my query
	$query = "SELECT parentCompany FROM Company ORDER BY parentCompany;";
	
	//run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "\n <tr>";
		echo "<td>" . $row['parentCompany'] . "</td>";
		echo "</tr>";
	}
?>

</tbody>
</table>
</div>
</div>

</div> <!-- closing bootstrap container -->
</body>
</html>
