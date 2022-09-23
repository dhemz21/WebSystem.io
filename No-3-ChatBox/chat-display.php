<?php
/*
    Work by Dhemler A. Omapas
*/

/*
    The code below request data from the server, the message and the user that sent the message.
*/
  session_start();
  require 'chat-connection.php'; //Requiring files to make functions accessible.
  $count = 0;
  $query = "SELECT message, name FROM con_exchange ORDER BY id ASC";
  $query_run = mysqli_query($connection, $query);

  while($query_row = mysqli_fetch_assoc($query_run)):
    $count = $count + 1;
    echo $count;
    ?>
  <?php if($_SESSION['user'] == $query_row['name']){ ?>
          <span class="host-message">
            <?php echo $query_row['message'] ?>
          </span>
<?php }
        else if($_SESSION['user'] != $query_row['name']){ ?>
          <span class="user-name">
            <?php echo $query_row['name'] ?>
          </span>
          <span class="con-message">
            <?php echo $query_row['message'] ?>
          </span>
<?php } ?>
<br>
<br>
<?php endwhile; ?>
