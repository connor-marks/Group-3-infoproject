<?php
  include_once('config.php');
  include_once('dbutils.php');
  
  if (session_start()) {
    $email = $_SESSION['email'];
  }
?>


<html>
  <head>
    <meta charset="UTF-8">
    <title>Hours Page</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  </head>
  <body>
      
  <header class="container">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div>
      <ul class="nav navbar-nav col-sm-12">
        <li class="col-sm-3 text-center col-xs-3"><a href="hours.php">Hours</a></li>
        <li class="col-sm-3 text-center col-xs-3"><a href="jobs.php">Jobs</a></li>
        <li class="col-sm-3 text-center col-xs-3"><a href="paystubs.php">Pay Stubs</a></li>
        <li class="col-sm-3 text-center col-xs-3"><a href="account.php"><span class="glyphicon glyphicon-user" style="color:grey;"></span></a></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

      
  <div class="container">
    <div class="panel panel-default text-center">
        <div class="panel-heading">
            <h3 class="panel-title">User Hours</h3>
        </div>
      <div class="panel-body">
        <a class="btn btn-danger" style="margin-bottom: 10px;" href="addhours.php" role="button">Add Hours</a>
        
          <div class="panel panel-default text-center">
        <div class="panel-heading">
            <h3 class="panel-title">Recent Hour Updates</h3>
        </div>
      <div class="panel-body">
        <div class="row text-center">
          <?php
          //connect to database
          $db = connectDB($DBHost,$DBUser,$DBPassword,$DBName);
  
          //set up my query
          $query = "SELECT Hours.hoursWorked, Hours.startDate, Hours.endDate, Hours.jobID, Job.jobTitle, Job.jobID, Job.hourlyPay, Job.email FROM Hours INNER JOIN Job ON Hours.jobID = Job.jobID WHERE Job.email = '$email';";
  
          //run the query
          $result = queryDB($query, $db);
  
          while($row = nextTuple($result)) {
          echo "Paid: <b>$";
          echo ($row['hourlyPay'] * $row['hoursWorked']);
          echo "</b> for <b>" . $row['hoursWorked'] . "</b> hours worked from <b>" . $row['startDate'] . "</b> to <b>" . $row['endDate'] . "</b>  for job: <b>" . $row['jobTitle'] . "</b></br>";
          }
  ?>
        </div>
      </div>
    </div>
          
      </div>
    </div>
  </div>
      
   
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>