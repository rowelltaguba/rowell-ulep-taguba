<?php
?>

<?php
session_start();
if(!isset($_SESSION["studentID"])){
header("Location: userlogin.php");
exit(); }
?>
