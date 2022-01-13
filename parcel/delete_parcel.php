<?php

require('includes/db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM parcel_info WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view_parcel.php"); 
?>