  <?php

  /*
      Work by Dhemler A. Omapas
  */

  /*
      PHP code for the connection and data request to database using MySQL.
      Credits to: Abigail Pro, website -> https://abigail.pro/code/creating-charts-with-php-and-mysql-data-without-javascript-knowledge
  */

    header('Content-Type: application/json');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mydatabase";

    $connection = new mysqli($servername, $username, $password, $database);

    if($connection->connect_error){
      die("Connection error: " . $connection->connect_error);
    }

    $query = "SELECT Name, Score FROM scores";

    $result = mysqli_query($connection, $query);
    $data = array();

    foreach($result as $row){
      $data[] = $row;
    }

    $connection->close();

    echo json_encode($data);

?>
