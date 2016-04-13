<?php
// Contains some common PHP db functions. Here, we always check the  
// return object/value for errors.  Uses the mysqli functional interface
// as opposed to the mysqli object interface.

// Connect to DB: config.php contains DB configuration.
function connectDB($DBhost,$DBuser,$DBPassword,$DBname) {
  $db = mysqli_connect($DBhost,$DBuser,$dbPassword,$DBname);
  if (mysqli_connect_errno() != 0)
    punt("Can't connect to MySQL server $DBhost db $DBname as user $DBuser");
  return($db);
}

// Submit a query and return a result object. This is just syntactic 
// sugar and error trapping.
function queryDB($query, $DB) {
  $result = mysqli_query($DB, $query);
  if (!$result)
    punt ('Error in queryDB()', $query, $DB);
  return ($result);
}

// How many tuples in the result? Syntactic sugar.
function nTuples($result) {
  return(mysqli_num_rows($result));
}

// Get next record as an associative array. Syntactic sugar.
function nextTuple($result) {
  return (mysqli_fetch_assoc($result));
}

// Used for debugging. If invoked with a SQL query string
// as the optional second argument, will also retrieve and
// display MySQL error information. Otherwise, if invoked
// only with one argument, will print that argument.
function punt($message, $query = '', $DB = '') {
  $lastPart = '';
  // Check to see if error resulted from a bad query
  if ($query != '')
    $lastPart = "<br><i>$query</i>\n" . '<br>[' . mysqli_errno($db) . '] ' . mysqli_error($db) . "\n";
  die("\n<br><br><b>Error: $message</b>\n" . $lastPart);
}
?>
