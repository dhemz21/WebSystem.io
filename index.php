<?php
/*
    Work by Dhemler A. Omapas
*/
session_start(); //Start session to store and retrieve data from server and user's device.

if(isset($_SESSION['user'])){ //Checks if user session has not ended and user profile is already set, if true it redirects to statistical-data.php.
  echo "<script>window.location.replace('No-1-Chart/statistical-data.php');</script>";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title></title>
  </head>
  <body>

    <?php
    include 'side-nav.html'; //Including files to make functions and others accessible.
    ?>

    <div class="main-content-page">
      <span class="choose"><h3>CHOOSE YOUR PC</h3></span>
      <div class="users">
        <form method="post" action="index.php">
          <button id="buttonone" name="user" value="user-1"><img src="user-1.png" alt="Icon of user-1"></button><!-- User-1 -->
          <button id="buttontwo" name="user" value="user-2"><img src="user-2.png" alt="Icon of user-2"></button><!-- User-2 -->
        </form>
        <?php
          if(isset($_POST['user'])){
            if($_POST['user'] == 'user-1'){ //Code to execute if user chooses user-1.
              $_SESSION['user'] = 'user-1';
              echo '<h3>You choose Mac and wait for 2 seconds.</h3>';
              echo "<script>setTimeout(function(){window.location.replace('No-2-ActiveBadge/active-badge.php')}, 2000);</script>";
            }
            else{ //Code to execute if user chooses user-2.
              $_SESSION['user'] = 'user-2';
              echo '<h3>You choose Windows and wait for 2 seconds.</h3>';
              echo "<script>setTimeout(function(){window.location.replace('No-2-ActiveBadge/active-badge.php')}, 2000);</script>";
            }
          }
        ?>
      </div>
    </div>
  </body>
</html>
