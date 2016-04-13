<!-- login dialog -->
<html>

<head>
    <title>People data entry</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>    
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
    
</head>

<body>
    
<div class="container" style="width: 1024px">

<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <!-- Header -->
            <h1>Login screen</h1>
        </div>
    </div>  
</div>

<div class="row">
<div class="col-xs-12">
<form action="loginprocess.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email"/>
    </div>
    
    <div class="form-group">
        <label for="password">password</label>
        <input type="password" class="form-control" name="password" id="password"/>
    </div>  

    <button type="submit" class="btn btn-default">Login</button>
</form>
</div> <!-- close column -->
</div> <!-- close row -->
</div> <!-- container -->

</body>
</html>