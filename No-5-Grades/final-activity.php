<?php
/*
    Work by Dhemler A. Omapas
*/
session_start(); //Start session to store data to serve and client's computer.
?>

<script>
  function confirmation_1(){
    if(confirm("Are you sure you want to proceed?")){
      window.location.replace("grades_confirmation_deletion.php");
    }
    else{
        window.location.replace("grades.php");
    }
  }
  function confirmation_2(){
    if(confirm("Are you sure you want to proceed?")){
      window.location.replace("edit-content-grades.php");
    }
    else{
      window.location.replace("grades.php");
    }
  }
</script>

<?php

if(isset($_GET['button_1'])){ //Checks if the user press the correct button for the right action.
  $_SESSION['value'] = $_GET['button_1'];
  echo "<script>confirmation_1();</script>"; //Redirects user to grades_confirmation_deletion.php for deletion confirmation.
}

if(isset($_GET['button_2'])){ //Checks if the user press the correct button for the right action.
  $_SESSION['value'] = $_GET['button_2'];
  echo "<script>confirmation_2();</script>";
}

if(!empty($_SESSION['con']) && $_SESSION['con'] == "true"){ //Deletes row with the specified ID from database if the condition is true.
  include 'server-connection.php';
  $connection = new database_connection();
  $value = $_SESSION['value'];
  $connection -> insert_to_database("mydatabase", "DELETE FROM grades WHERE ID = '$value'");
  $_SESSION['con'] = "false";
  echo "<script>window.location.replace('grades.php');</script>";
}

function table_1(){ //Function for displaying the data requested from database to HTML tables the same with table_2, table_3, table_4, table_5, table_6, table_7, and table_8 below.
  $connection = new database_connection();
  $result = $connection -> select_show_describe_explain("mydatabase", "SELECT * FROM grades");
  if($result -> num_rows == 0){
    echo("No data stored.");
  }
  else{
    while($data = $result -> fetch_assoc()){
      if($data['Year'] == 1 && $data['Sem'] == 1){
?>
        <tr>
          <td><?php echo $data['Sub_Code']; ?></td>
          <td><?php echo $data['Units']; ?></td>
          <td><?php echo $data['Grade']; ?></td>
          <td>
            <form method="get" action="final-activity.php">
              <button value= <?php echo $data['ID']; ?> name="button_1" ><img src="trash.png" alt="Trash icon."></button>
              <button value= <?php echo $data['ID']; ?> name="button_2"><img src="pen.png" alt="Pen icon."></button>
            </form>
          </td>
        </tr>
<?php
      }
    }
  }
}
?>

<?php
function table_2(){
  $connection = new database_connection();
  $result = $connection -> select_show_describe_explain("mydatabase", "SELECT * FROM grades");
  if($result -> num_rows == 0){
    echo("No data stored.");
  }
  else{
    while($data = $result -> fetch_assoc()){
      if($data['Year'] == 1 && $data['Sem'] == 2){
?>
        <tr>
          <td><?php echo $data['Sub_Code']; ?></td>
          <td><?php echo $data['Units']; ?></td>
          <td><?php echo $data['Grade']; ?></td>
          <td>
            <form method="get" action="final-activity.php">
              <button value= <?php echo $data['ID']; ?> name="button_1" ><img src="trash.png" alt="Trash icon."></button>
              <button value= <?php echo $data['ID']; ?> name="button_2" ><img src="pen.png" alt="Pen icon."></button>
            </form>
          </td>
        </tr>
<?php
      }
    }
  }
}
?>

<?php
function table_3(){
  $connection = new database_connection();
  $result = $connection -> select_show_describe_explain("mydatabase", "SELECT * FROM grades");
  if($result -> num_rows == 0){
    echo "No data stored.";
  }
  else{
    while($data = $result -> fetch_assoc()){
      if($data['Year'] == 2 && $data['Sem'] == 1){
?>
        <tr>
          <td><?php echo $data['Sub_Code']; ?></td>
          <td><?php echo $data['Units']; ?></td>
          <td><?php echo $data['Grade']; ?></td>
          <td>
            <form method="get" action="final-activity.php">
              <button value= <?php echo $data['ID']; ?> name="button_1" ><img src="trash.png" alt="Trash icon."></button>
              <button value= <?php echo $data['ID']; ?> name="button_2" ><img src="pen.png" alt="Pen icon."></button>
            </form>
          </td>
        </tr>
<?php
      }
    }
  }
}
?>

<?php
function table_4(){
  $connection = new database_connection();
  $result = $connection -> select_show_describe_explain("mydatabase", "SELECT * FROM grades");
  if($result -> num_rows == 0){
    echo "No data stored.";
  }
  else{
    while($data = $result -> fetch_assoc()){
      if($data['Year'] == 2 && $data['Sem'] == 2){
?>
        <tr>
          <td><?php echo $data['Sub_Code']; ?></td>
          <td><?php echo $data['Units']; ?></td>
          <td><?php echo $data['Grade']; ?></td>
          <td>
            <form method="get" action="final-activity.php">
              <button value= <?php echo $data['ID']; ?> name="button_1" ><img src="trash.png" alt="Trash icon."></button>
              <button value= <?php echo $data['ID']; ?> name="button_2" ><img src="pen.png" alt="Pen icon."></button>
            </form>
          </td>
        </tr>
<?php
      }
    }
  }
}
?>

<?php
function table_5(){
  $connection = new database_connection();
  $result = $connection -> select_show_describe_explain("mydatabase", "SELECT * FROM grades");
  if($result -> num_rows == 0){
    echo "No data stored.";
  }
  else{
    while($data = $result -> fetch_assoc()){
      if($data['Year'] == 3 && $data['Sem'] == 1){
?>
        <tr>
          <td><?php echo $data['Sub_Code']; ?></td>
          <td><?php echo $data['Units']; ?></td>
          <td><?php echo $data['Grade']; ?></td>
          <td>
            <form method="get" action="final-activity.php">
              <button value= <?php echo $data['ID']; ?> name="button_1" ><img src="trash.png" alt="Trash icon."></button>
              <button value= <?php echo $data['ID']; ?> name="button_2" ><img src="pen.png" alt="Pen icon."></button>
            </form>
          </td>
        </tr>
<?php
      }
    }
  }
}
?>

<?php
function table_6(){
  $connection = new database_connection();
  $result = $connection -> select_show_describe_explain("mydatabase", "SELECT * FROM grades");
  if($result -> num_rows == 0){
    echo "No data stored.";
  }
  else{
    while($data = $result -> fetch_assoc()){
      if($data['Year'] == 3 && $data['Sem'] == 2){
?>
        <tr>
          <td><?php echo $data['Sub_Code']; ?></td>
          <td><?php echo $data['Units']; ?></td>
          <td><?php echo $data['Grade']; ?></td>
          <td>
            <form method="get" action="final-activity.php">
              <button value= <?php echo $data['ID']; ?> name="button_1" ><img src="trash.png" alt="Trash icon."></button>
              <button value= <?php echo $data['ID']; ?> name="button_2" ><img src="pen.png" alt="Pen icon."></button>
            </form>
          </td>
        </tr>
<?php
      }
    }
  }
}
?>

<?php
function table_7(){
  $connection = new database_connection();
  $result = $connection -> select_show_describe_explain("mydatabase", "SELECT * FROM grades");
  if($result -> num_rows == 0){
    echo "No data stored.";
  }
  else{
    while($data = $result -> fetch_assoc()){
      if($data['Year'] == 4 && $data['Sem'] == 1){
?>
        <tr>
          <td><?php echo $data['Sub_Code']; ?></td>
          <td><?php echo $data['Units']; ?></td>
          <td><?php echo $data['Grade']; ?></td>
          <td>
            <form method="get" action="final-activity.php">
              <button value= <?php echo $data['ID']; ?> name="button_1" ><img src="trash.png" alt="Trash icon."></button>
              <button value= <?php echo $data['ID']; ?> name="button_2" ><img src="pen.png" alt="Pen icon."></button>
            </form>
          </td>
        </tr>
<?php
      }
    }
  }
}
?>

<?php
function table_8(){
  $connection = new database_connection();
  $result = $connection -> select_show_describe_explain("mydatabase", "SELECT * FROM grades");
  if($result -> num_rows == 0){
    echo "No data stored.";
  }
  else{
    while($data = $result -> fetch_assoc()){
      if($data['Year'] == 4 && $data['Sem'] == 2){
?>
        <tr>
          <td><?php echo $data['Sub_Code']; ?></td>
          <td><?php echo $data['Units']; ?></td>
          <td><?php echo $data['Grade']; ?></td>
          <td>
            <form method="get" action="final-activity.php">
              <button value= <?php echo $data['ID']; ?> name="button_1" ><img src="trash.png" alt="Trash icon."></button>
              <button value= <?php echo $data['ID']; ?> name="button_2" ><img src="pen.png" alt="Pen icon."></button>
            </form>
          </td>
        </tr>
<?php
      }
    }
  }
}

function computation(){ //Grade computer for GPA.
  $grade_unit_total = 0;
  $unit_total = 0;
  $connection = new database_connection();
  $result = $connection -> select_show_describe_explain("mydatabase", "SELECT units, grade FROM grades");
  if($result -> num_rows == 0){
    echo "No data to be computed.";
  }
  else{
    while($data = $result -> fetch_assoc()){
      $product = $data['grade'] * $data['units'];
      $grade_unit_total += $product;
      $unit_total += $data['units'];
    }
    $total = $grade_unit_total / $unit_total;
    echo "<h2> GPA : $total </h2>";
  }
}
