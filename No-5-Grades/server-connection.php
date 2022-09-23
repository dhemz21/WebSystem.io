<?php
/*
    Work by Dhemler A. Omapas
*/

/*
    Below are the codes necessary for executing queries and connecting to database.
*/
class database_connection{
  const SERVER = "localhost";
  const USER = "root";
  private $PASSWORD = "";

  function insert_to_database($DATABASE, $QUERY){

    $connection = new mysqli(self::SERVER, self::USER, $this -> PASSWORD, $DATABASE);

    if($connection -> connect_error){
      die("Something gone wrong : " . $connection -> connect_error);
    }
    else{
      if(!$connection -> query($QUERY)){
        die("Something went wrong : " . $connection -> error);
      }
    }

    $connection -> close();

  }

  function select_show_describe_explain($DATABASE, $QUERY){

    $connection = new mysqli(self::SERVER, self::USER, $this -> PASSWORD, $DATABASE);

    if($connection -> connect_error){
      die("Something gone wrong : " . $connection -> connect_error);
    }

    $result = $connection -> query($QUERY);

    if(!$result){
      die("Something went wrong : " . $connection -> error);
    }
    else{
      return $result;
    }

    $result -> close();

  }
}
