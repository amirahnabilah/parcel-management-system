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




//form



* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
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
  <li><a href="insert.php">New parcel</a></li>
  <li><a href="view_parcel.php">Record of parcel</a></li>
 <li style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<br></br>
<center><div>
<?php

 
require('includes/db.php');

$id = $_REQUEST['id'];
$query = "SELECT * from parcel_info INNER JOIN student ON parcel_info.studID = student.studId where parcel_info.id ='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

$notrack = $row['no_track'];
$name = $row['studName'];
$telphone = $row['telPhone'];
$status = $row['status'];
$address = $row['stud_address'];
?>

<center><h1>PARCEL</h1></center>
<?php
$test = "";
if(isset($_POST['insert']))
{
$id=$_REQUEST['id'];
$status =$_REQUEST['status'];
$update="update parcel_info set status='".$status."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$test = "Record Updated Successfully. </br></br><a href='view_parcel.php'>View</a>";
echo '<p style="color:#FF0000;">'.$test.'</p>';
}else {
?>

<div class="container">
 <form action="" method="post">
    <div class="row">
 <div class="row">
      <div class="col-25">
        <label for="no_track">Number Tracking</label>
      </div>

      <div class="col-75">
        <input type="text" id="no_track" name="no_track" value="<?php echo($notrack); ?>" style="pointer-events: none" readonly>
      </div>

    </div>
    <div class="row">
      <div class="col-25">
        <label for="o_name">Owner Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="o_name" name="o_name" value="<?php echo($name); ?>" style="pointer-events: none" readonly>
      </div>
    </div>

  <div class="row">
      <div class="col-25">
        <label for="phone">Number telephone</label>
      </div>
      <div class="col-75">
        <input type="text" id="phone" name="phone" value="<?php echo($telphone); ?>" style="pointer-events: none" readonly>

      </div>
    </div>



<div class="container">
 <form action="" method="post">
  <input type="hidden" name="new" value="1" />
    <div class="row">

    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status">
          <option value="<?php echo($status); ?>" selected="selected" disabled="disabled"><?php echo(ucfirst($status)); ?></option>
          <option value="" disabled="disabled">------------</option>
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
        <textarea id="stud_address" name="stud_address" placeholder="<?php echo($address); ?>" style="height:200px;pointer-events: none" readonly></textarea>
      </div>
    </div>
    
    </div>
    <div class="row">
      <input type="submit" name="insert" value="Submit">
    </div>
  </form>
</div>

</body>
</html>






<?php } ?>

<br /><br /><br /><br />

</div>
</div>
</body>
</html>


</div></center>
</div>
</body>
</html>
