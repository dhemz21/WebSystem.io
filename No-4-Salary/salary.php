<?php
/*
    Work by Dhemler A. Omapas
*/
session_start(); //Starting session to store data on server and client's computer.
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <title>
      Final Activity | Number 4
    </title>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="../style.css">
  </head>
  <body>

    <?php

    include 'side-nav.html'; //Including files to make functions accessible.

    ?>

    <div class="content-5">
      <div class="salary-calculation">
        <form class="calculation-data" method="get" action="salary.php">
          <span class="peso">₱<span>
          <input name="employee_salary" class="salary" step="0.01" type="number" placeholder="Monthly Salary">
          <div class="calculate-container">
            <input name="output" class="calculate" type="submit" value="calculate">
          </div>
          <span class="actual-salary">Actual Salary : </span>
          <span class="amount-peso"><?php if(!empty($_SESSION['salary'])){echo "₱ " . $_SESSION['salary'];} ?></span>
          <h3>Benefits deductions</h3>
          <hr>
          <div class="con1">
            <label for="sss">SSS : </label>
            <input id="sss" name="ss" type="number" step="0.01" value=<?php if(isset($_SESSION['sss'])){echo $_SESSION['sss'];} ?>>
            <span>%</span>
          </div>
          <div class="con2">
            <label for="philhealth">Philhealth : </label>
            <input id="philhealth" name="ph" type="number" step="0.01" value=<?php if(isset($_SESSION['philhealth'])){echo $_SESSION['philhealth'];} ?>>
            <span>%</span>
          </div>
          <div class="con3">
            <label for="gsis">GSIS : </label>
            <input id="gsis" name="gs" type="number" step="0.01" value=<?php if(isset($_SESSION['gsis'])){echo $_SESSION['gsis'];} ?>>
            <span>%</span>
          </div>
          <div class="con4">
            <label for="pagibig">Pag-Ibig : </label>
            <input id="pagibig" name="pi" type="number" step="0.01" value=<?php if(isset($_SESSION['pagibig'])){echo $_SESSION['pagibig'];} ?>>
            <span>%</span>
          </div>
          <button class="cancel" name="resetting" value="RESET">RESET</button>
          <button id="set-value" class="set" name="setting" value="SET">SET</button>
        </form>
      </div>
    </div>
    <?php
    //Conditions to restrict user from inputting invalid data and not filling all the fields with value.
    if(!empty($_GET['setting']) && (isset($_GET['ss']) && trim($_GET['ss']) != "") && (isset($_GET['gs']) && trim($_GET['gs']) != "")
      && (isset($_GET['ph']) && trim($_GET['ph']) != "") && (isset($_GET['pi']) && trim($_GET['pi']) != "")){
      $_SESSION['sss'] = $_GET['ss'];
      $_SESSION['gsis'] = $_GET['gs'];
      $_SESSION['philhealth'] = $_GET['ph'];  //Assignin value to session variables from the value inputted by the user.
      $_SESSION['pagibig'] = $_GET['pi'];
      echo "<script>window.location.replace('salary.php');</script>";
    }
    else if(!empty($_GET['resetting'])){
      $_SESSION['sss'] = null;
      $_SESSION['gsis'] = null; //Setting session value to  null after pressing reset button.
      $_SESSION['philhealth'] = null;
      $_SESSION['pagibig'] = null;
      echo "<script>window.location.replace('salary.php');</script>";
    }
    else if(isset($_SESSION['pagibig']) && isset($_SESSION['gsis']) && isset($_SESSION['philhealth']) && isset($_SESSION['sss'])){
      echo "<script>document.getElementById('sss').disabled='true';</script>";
      echo "<script>document.getElementById('philhealth').disabled='true';</script>";
      echo "<script>document.getElementById('gsis').disabled='true';</script>"; //Disabling the input field after setting value to restrict user.
      echo "<script>document.getElementById('pagibig').disabled='true';</script>";
      echo "<script>document.getElementById('set-value').disabled='true';</script>";
    }
    else if(!empty($_GET['setting']) && (trim($_GET['ss']) == "" || trim($_GET['gs']) == "" || trim($_GET['ph']) == "" || trim($_GET['pi']) == "")){
      echo "<script>alert('Fields must have the valid value');</script>";
    }

    if(!empty($_GET['employee_salary']) && !empty($_GET['output'])){
      $salary = $_GET['employee_salary'];   //Actual salary computation.
      $sss = ($_SESSION['sss'] / 100) * $salary;
      $gsis =($_SESSION['gsis'] / 100) * $salary;
      $philhealth = ($_SESSION['philhealth'] / 100) * $salary;
      $pagibig = ($_SESSION['pagibig'] / 100) * $salary;
      $_SESSION['salary'] = $salary - ($sss + $gsis + $philhealth + $pagibig);
      echo "<script>window.location.replace('salary.php');</script>";
    }
    else if(empty($_GET['employee_salary']) && !empty($_GET['output'])){
      echo "<script>alert('Please write the salary amount.');</script>";  //Reloading page if user press calculate button but does not input data to the required input fields.
    }

    ?>
  </body>
</html>
