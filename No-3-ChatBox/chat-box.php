<?php
/*
    Work by Dhemler A. Omapas
*/
session_start();  //Function to store session data onto server and a to the client's device.
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Final-Activity | Number 3</title>
    <link type="text/css" rel="stylesheet" href="../style.css">
  </head>
  <body>
    <script>
      function readme(){ //Function to call if user wants to enter chat box without setting user profile first.
        alert("You cannot use chat if you haven\'t set user.");
        window.location.replace('../index.php');
      }
    </script>
    <?php

      include 'side-nav.html'; //Including files to make functions accessible.

      if(!isset($_SESSION['user'])){ //Checks if user already had set a profile.
        echo "<script>readme();</script>";
      }
    ?>
    <script type="text/javascript" src="../JSFiles/jquery.min.js">
    </script>
    <div id="main-content-3" class="content-3">
      <div class="main_chat_box">
        <div id="chat">
        </div>
        <form method="post" action="chat-box.php">
          <textarea name="message" id="messaging">
          </textarea>
          <button><img src="send-icon.png"></button>
        </form>
      </div>
      <?php
      //PHP code for storing data to database or storing the message information to the database.
        require 'chat-connection.php';
        if(isset($_POST['message'])){
          if(trim($_POST['message']) != ''){
            $message = trim($_POST['message']);
            $user = $_SESSION['user'];
            $query = "INSERT INTO con_exchange(Message, Name, status) value('$message', '$user', 'not-read')";
            if($connection->query($query)){
              header("Location: chat-box.php");
            }
          }
        }
      ?>
      <script src="chat-script.js">//Embeds javascript file containing ajax for the realtime data updation from server to client's device.</script>
    </div>
  </body>
</html>
