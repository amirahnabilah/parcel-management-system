<?php
session_start();
include("includes/db.php");
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}


	body {
		margin: 0;
	}



* {
  box-sizing: border-box;
}

input[type=text], input[type=tel], select, textarea {
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
	padding: 12px 12px 12px 0;
  	display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
   float: right;
 
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a class="active" href="insert.php">New parcel</a></li>
  <li><a href="view_parcel.php">Record of parcel</a></li>
  <li><a href="search.php">Search parcel</a></li>
 <li style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<br></br>
<center><div>
<body>

<h1>Tracking Parcel Form</h1>

<div class="container">
 <form action="" method="post">
    <div class="row">
 <div class="row">
      <div class="col-25">
        <label for="no_track">Number Tracking</label>
      </div>

      <div class="col-75">
        <input type="text" id="no_track" name="no_track" placeholder="Number tracking is" required>
      </div>

    </div>
    <div class="row">
      <div class="col-25">
        <label for="o_name">Owner Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="o_name" name="o_name" placeholder="Owner name.." pattern="[A-Za-z]{4,}" required>
      </div>
    </div>

  <div class="row">
      <div class="col-25">
        <label for="phone">Number telephone</label>
      </div>
      <div class="col-75">
        <input type="tel" id="phone" name="phone" placeholder="number telephone" pattern="[0-9]{3}[0-9]{4}[0-9]{3,}" required>

      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status" required>
          <option value="pending">Pending</option>
          <option value="received">Received</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="stud_address">Student Address</label>
      </div>
      <div class="col-75">
        <textarea id="stud_address" name="stud_address" placeholder="Please write student address here" style="height:200px" required></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" name="insert" value="Submit">
    </div>
  </form>
</div>

</body>
</html>

<?php

if(isset($_POST['insert'])){

    
    $date = date("Y-m-d H:i:s");
    $no_track = $_POST ['no_track'];
    $studid = "MAS".rand();
    $o_name = $_POST ['o_name'];
    $phone = $_POST ['phone'];
    $status = $_POST ['status'];
    $stud_address = $_POST ['stud_address'];

    $select = "SELECT * FROM parcel_info WHERE no_track = '$no_track'";
    $query = mysqli_query($con,$select);
    $numval = mysqli_num_rows($query);

    if($numval > 0){
      echo"<script> alert('No. tracking is already exist')</script>";
      echo "<script>window.open('insert.php','_self')</script>)";
    }
    else {
      $insert_stud = "INSERT INTO student (studId, studName, telPhone)
      VALUES ('$studid', '$o_name', '$phone')"; 

      $insert_report= "INSERT INTO `parcel_info` (studID,`date`,`no_track`,`status`,`stud_address`) 
      VALUES ('$studid', '$date', '$no_track', '$status', '$stud_address')";
      
      $insert1 = mysqli_query($con,$insert_stud);
      $insert2 = mysqli_query($con,$insert_report);

      //var_dump($date);
      //var_dump($insert2, $insert_report, mysqli_error($con));

      if($insert1 && $insert2){    
        echo "<script>alert ('Parcel Succesfully Added')</script>";
        echo "<script>window.open('view_parcel.php','_self')</script>)";
      }
      else
      {
        $error = mysqli_error($con);
        echo"<script> alert('".$error."')</script>";
      } 
    }    
  }
?>
