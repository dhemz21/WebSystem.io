<?php
/*
    Work by Dhemler A. Omapas
*/
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link type="text/css" rel="stylesheet" href="../style.css">
  </head>
  <body>
    <div class="edit-background">
      <div class="edit-main-view">
        <h3>Edit data</h3>
        <form method="get" action="edit-content-grades.php">
          <input type="text" name="subject_code" placeholder="Subject Code">
          <input type="text" name="units" placeholder="Number of Units">
          <input type="text" name="grade" placeholder="Grade">
          <input class="commit" type="submit" value="Commit" name="commit-change">
          <input class="cancel-commit" type="submit" value="Cancel" name="cancel-change">
        </form>
      </div>
    </div>
    <?php
    //Conditions to restrict user.
    if(isset($_GET['commit-change']) && isset($_GET['subject_code']) && isset($_GET['units']) && isset($_GET['grade'])){
      include 'server-connection.php';
      $subjectcode = $_GET['subject_code'];
      $units = $_GET['units'];
      $grade = $_GET['grade'];
      $value = $_SESSION['value'];

      if(trim($_GET['subject_code']) == ""){ //Checking if user inputs proper value.
        echo "<script>window.alert('Subject Code missing.');window.location.replace('edit-content-grades.php');</script>";
      }
      else if(!is_numeric($_GET['grade']) || $_GET['grade'] > 5 || $_GET['grade'] <= 0 || trim($_GET['grade']) == ""){ //Checking if user inputs proper value.
        echo "<script>window.alert('Grade must have its proper value.');window.location.replace('edit-content-grades.php');</script>";
      }
      else if(!is_numeric($_GET['units']) || $_GET['units'] > 4 || $_GET['units'] <= 0 || trim($_GET['units']) == ""){ //Checking if user inputs proper value.
        echo "<script>window.alert('Number of units must have its proper value.');window.location.replace('edit-content-grades.php');</script>";
      }
      else{ //Code to execute if none of the condition is true, storing data to database and redirecting user to main grade page.
        $connection = new database_connection();
        $connection -> insert_to_database("maindatabase", "UPDATE grades SET Sub_Code='$subjectcode', Units='$units', Grade='$grade' WHERE ID='$value'");
        $_SESSION['value'] = "";
        echo "<script>window.location.replace('grades.php');</script>";
      }
    }
    else if(isset($_GET['cancel-change'])){
      echo "<script>window.location.replace('grades.php');</script>";
    }
    ?>
  </body>
</html>
