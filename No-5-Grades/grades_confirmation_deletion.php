<?php
/*
    Work by Dhemler A. Omapas
*/
session_start(); //Starting session to store and retrieve data from the server and user device.
$_SESSION['con'] = "true"; //Sets $_SESSION['con'] value to true to confirm deletion and then redirect back to final activity.php to execute deletion.
echo "<script>window.location.replace('final-activity.php');</script>";
