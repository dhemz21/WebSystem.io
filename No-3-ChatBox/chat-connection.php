<?php
/*
    Work by Dhemler A. Omapas
*/

/*
    Code for connecting to the server database.
*/
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "mydatabase";

  $connection = new mysqli($servername, $username, $password, $database);

  if($connection->connect_error){
    die("Connection error, details: " . $connection->connect_error);
  }
?>
