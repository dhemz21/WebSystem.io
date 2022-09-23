<?php
/*
    Work by Dhemler A. Omapas
*/

/*
    The code below updates the Status column value to "read" before going in to chat-box.php to reset notification-badge counts to 0.
*/
session_start();
?>

<script>
  function redirect(){ //Function to call for directing user to chat box.php.
    window.location.replace("chat-box.php");
  }
</script>

<?php

include 'chat-connection.php'; //Including files to make functions accessible.

if(isset($_SESSION['user'])){ //Checks the user profile to determine who is the opposite user profile for marking message with read "status".
  if($_SESSION['user'] == 'user-1'){
    $user = 'user-2';
  }
  else if($_SESSION['user'] == 'user-2'){
    $user = 'user-1';
  }
  else{
    $user = 'not read';
  }
}

$query = "UPDATE con_exchange SET status='read' WHERE Name='$user' AND status='not-read'";
//Checks for Status column with a value of "not-read" and then update it to "read".

if($connection->query($query) !== TRUE){
echo "Error updating notification";
}
else{
  echo "<script>redirect();</script>"; //If query is successful, user is redirected to chat-box.php.
}

?>
