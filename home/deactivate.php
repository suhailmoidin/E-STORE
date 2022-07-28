<?php
include("../config/dbcon.php");
session_start();
$userid = $_SESSION['userid'];
$sql = "DELETE FROM users where id = $userid";
$con->query($sql);
session_unset();
header("Location: ../authenticate/login.php");
?>