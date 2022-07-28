<?php
    session_start();
    session_unset();
    header("Location: ../authenticate/login.php");
?>