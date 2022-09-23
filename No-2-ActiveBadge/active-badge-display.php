<?php
/*
   Work by Dhemler A. Omapas
*/

/*
    The code below counts how many number of rows with a Status value of not read in the database to be counted.
    The count determines how many message that is not yet read by the user.
    The database name is maindatabase, datas are stored in con_exchange table with 5 columns namely: ID, Message, Date, Name, and Status.
*/

  session_start();
  require '../No-3-ChatBox/chat-connection.php'; //Requiring files to make functions accessible.

    $notification_count = 0;

    $query = "SELECT name, status FROM con_exchange ORDER BY id ASC";
    $query_run = mysqli_query($connection,$query);

    while($query_row = mysqli_fetch_assoc($query_run)):?>

    <?php
      if($query_row['status'] == 'not-read' && $_SESSION['user'] != $query_row['name']){
        $notification_count = $notification_count + 1;
       }
    ?>

  <?php endwhile; ?>

  <?php
    echo $notification_count;
   ?>
