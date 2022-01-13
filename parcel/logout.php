<?php
session_start();

session_destroy();



echo "<script>window.open('login2.php?logout=You Successfully Logged Out ','_self')</script>";




?>