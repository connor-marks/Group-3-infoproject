<?php
	include_once('config.php');
	include_once('dbutils.php');
	include_once('hashutil.php');
?>
<html>
<head>
	<title>
		<?php echo "Add Hours" . $Title; ?>
	</title>

	<!-- Following three lines are necessary for running Bootstrap -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	
	
	<link rel="stylesheet" type="text/css" href="/jquery.datetimepicker.css"/ >
	<script src="/jquery.js"></script>
	<script src="/build/jquery.datetimepicker.full.min.js"></script>
	
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


<!-- Form to enter new users -->
<div class="row">
<div class="col-xs-12">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<!-- Job form -->
<div class="form-group">
	<label for="Job">Job</label>
	<input type="Job" class="form-control" name="Job"/>
	
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jquery.spinner.js"></script>
<link href="bootstrap-spinner.css" rel="stylesheet">
<!-- input hours -->
<div class="input-append spinner" data-trigger="spinner">
<input type="text" value="1" data-rule="quantity">
<div class="add-on"> <a href="javascript:;" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a> <a href="javascript:;" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a> </div>

</div>



<!-- start to end date -->

<div class="container">
    <div class='col-md-5'>
        <div class="form-group">
            <label for="Start Date">Start Date</label>
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
            <label for="EndDate">End date</label>
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
	$db = connectDB($DBHost,$DBUser,$DBPassword,$DBName);
	
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
