<?php
	include_once('config.php');
	include_once('dbutils.php');
	include_once('hashutil.php');
?>
<html>
<head>
	<title>
		<?php echo "Input Your Hours" . $Title; ?>
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
	<h1><?php echo "Add Hours " . $Title; ?></h1>
</div>
</div>
</div>

	<!-- tell users that we added the hours to the database -->
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
    echo "\t\tThe user " . $hours . " was added to the database\n";
	echo "</div></div>\n";
	
}
?>

<!-- Form to enter new users -->
<div class="row">
<div class="col-xs-12">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<div class="form-group">
	<label for="Job"></label>
	<input type="Job" class="form-control" name="Job"/>

</div>
<!-- drop down menu for hours -->
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tutorials
  <span class="caret"></span></button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
    <li role="presentation"><a role="menuitem" href="#">HTML</a></li>
    <li role="presentation"><a role="menuitem" href="#">CSS</a></li>
    <li role="presentation"><a role="menuitem" href="#">JavaScript</a></li>
    <li role="presentation" class="divider"></li>
    <li role="presentation"><a role="menuitem" href="#">About Us</a></li>
  </ul>
</div>

<div class="form-group">
	<label for="Hours">Date</label>
	<input type="Date" class="form-control" name="date"/>
	<div class="container">
    <div class='col-md-5'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-md-5'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
</div>

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
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT email FROM Employee ORDER BY email;";
	
	// run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "\n <tr>";
		echo "<td>" . $row['email'] . "</td>";
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
