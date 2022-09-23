<?php
/*
    Work by Dhemler A. Omapas
*/
session_start();  //Checks if the user already choose a user profile, if true redirects to index.php which contains the user profile.
if(!isset($_SESSION['user'])){
  echo "<script>window.alert('Notification cannot be shown if user is not set');window.location.replace('../index.php');</script>";
}
?>

<!DOCTYPE html>
<!--HTML code for the front structure of the page-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="../style.css">
    <title>Final Activity | Number 2</title>
  </head>
  <body>
    <?php include 'side-nav.html'; //Including files to make functions accessible. ?>
    <script>
      function redirect(){  //Function to be called on an onclick event using the button tag, this redirects to update-notification.php.
        window.location.replace("../No-3-ChatBox/update-notification.php");
      }
    </script>
    <script type="text/javascript" src="../JSFiles/jquery.min.js">
    </script>
    <div class="content-2">
      <div class="notification-image">
        <button class="button-container">
          <div class="button-image" onclick="redirect()">
            <img alt="Notification bell icon." src="notification-bell.png">
            <span id="bellrefer" class="active"></span>
          </div>
        </button>
      </div>
    </div>
    <script>
      function ajax(){ //use for updating data from the server asynchronously for the number of unread message be updated.
        $.ajax({url: "active-badge-display.php", success: function(result){
          $('#bellrefer').html(result);
        }});
      }
      setInterval(function(){ajax();},1000);
    </script>
  </body>
</html>
