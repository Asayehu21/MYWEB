<?php
include_once 'connection.php';
session_start();
//destroy the session
session_destroy();
//redirect to login page
header("location: login.html");
?>