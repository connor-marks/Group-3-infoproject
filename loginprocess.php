<?php
    include_once("dbutils.php");
    include_once("config.php");

    // get data from fields
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // check that we have an email
    if (!$email) {
        echo "Hey, you didn't add an email. Please <a href='login.php'>try again</a>";
        exit;
    }
    
        // check that we have an email
    if (!$password) {
        echo "No password received";
		exit;
    }
    
    // get a handle to the database
    $db = connect($DBHost, $DBUser, $DBPassword, $DBName);
    
    // get hashed password based on email
    $query = "select hashedPass from Employee where email='" . $email . "'";
    $result = $db->query($query);
    if ($result) {
        $numberofrows = $result->num_rows;
        $row = $result->fetch_assoc();
        if ($numberofrows > 0) {
            $hashedPass = $row['hashedPass'];
            
            // check if the password matches the hashed version in the database
            // for version 5.5 or later we would use
            if (password_verify($password, $hashedPass)) {
	    // for versions of php under 5.5 we would use
            //if ($hashedPass == crypt($password, $hashedPass)) {
                // we have verified the password
		
		// we'd do the opposite for versions under 5.3
                if (session_start()) {
		    $_SESSION['email'] = $email;
		    header("Location: " . $baseURL . "testlogin.php");
		} else {
		    // unable to start session (works for php >= 5.3)
		    reportErrorAndDie("Unable to start session");
		}
            } else {
                // wrong password
                reportErrorAndDie("Wrong password. <a href='login.php'>Try again</a>.<p>" . $db->error, $query);
            }
        } else {
            reportErrorAndDie("Email not in our system. <a href='login.php'>Try again</a>.<p>" . $db->error, $query);
        }
    } else {
        reportErrorAndDie("Could not run authorization.<p>" . $db->error, $query);
    }
    
?>
