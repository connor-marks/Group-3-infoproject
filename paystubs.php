<!DOCTYPE html>
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
            <h3 class="panel-title">User Pay Stubs</h3>
        </div>
      <div class="panel-body">
        <a class="btn btn-danger" style="margin-bottom: 10px;" href="addhpaystub.php" role="button">Add Paystub</a>
        
          <div class="panel panel-default text-center">
        <div class="panel-heading">
            <h3 class="panel-title">Recent Pay Stubs Submitted</h3>
        </div>
      <div class="panel-body">
        <div class="row text-center">Uploaded: 4/8 for dates: 3/26 to 4/8</div>
        <div class="row text-center">Uploaded: 3/26 for dates: 3/18 to 3/26</div>
        <div class="row text-center">Uploaded: 3/18 for dates: 3/3 to 3/18 to</div>
        <div class="row text-center">Uploaded: 3/3 for dates: 2/23 to 3/3</div>
      </div>
    </div>
          
      </div>
    </div>
  </div>
      
   
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>