<?php
    include_once("config.php");
    
    // for php >=5.4
    session_start();
    if (session_status() === PHP_SESSION_ACTIVE) {
        if (!isset($_SESSION['email'])) {
            // if this variable is not set, then kick user back to login screen
            header("Location: " . $baseURL . "login.php");
        }
    } else {
        echo ("session not active");
		exit;
    }
?>

<html>
    <head>
        <title>Logged in</title>
    </head>
    <body>
        <p>
        Yes, you are logged in! Welcome, <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
        </p>
        
        <p>
            You can also <a href="logout.php">log out</a>.
        </p>
    </body>
</html>