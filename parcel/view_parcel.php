<?php

session_start();
include("includes/db.php");

?>

<!DOCTYPE html>
<html>
<head>
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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
 
  
   
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
   
}




tr:nth-child(even) {
  background-color: #7FFFD4;
}


label {
    display: block;
    font: 1rem 'Fira Sans', sans-serif;
}

input,
label {
    margin: .4rem 0;
}

.note {
    font-size: .8em;
}
</style>
</head>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="insert.php">New parcel</a></li>
  <li><a class="active" href="view_parcel.php">Record of parcel</a></li>
  <li><a href="search.php">Search parcel</a></li>
 <li style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<br></br>
<body>
<div class="form">
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<center>
  <h2> PARCEL</h2></center>
  <br></br>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>ID</strong></th><th><strong>Date</strong></th><th><strong>No Tracking</strong></th><th><strong>Owner Name</strong></th><th><strong>Number Phone</strong></th><th><strong>Status</strong></th><th><strong>Student Address</strong></th><th><strong>Penalty</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>



<tbody>
<?php
$count=1;
$sel_query="Select * from parcel_info INNER JOIN student ON parcel_info.studID = student.studId";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_array($result)) { 
?>
<tr><td align="center"><?php echo $count; ?></td>
  <td align="center"><?php echo $row["date"]; ?></td>
  <td align="center"><?php echo $row["no_track"]; ?></td>
  <td align="center"><?php echo $row["studName"]; ?></td>
  <td align="center"><?php echo $row["telPhone"]; ?></td>
  <td align="center"><?php echo $row["status"]; ?></td>
  <td align="center"><?php echo $row["stud_address"]; ?></td>
  <td align="center">
    <?php
    if($row["status"] == "pending"){
      $dateNow = date("Y-m-d");
      $startDate = date_create($row["date"]);
      $endDate = date_create($dateNow);
      $diff = date_diff($startDate, $endDate);
      
      $tDate = $diff->format("%a");
      
      if($tDate > 7){
        $penalty = $tDate - 7;
        echo "RM".$penalty;
      }
      else {
        echo "RM0";
      }
    }
    else{
      echo "-";
    }
    ?>
  </td>
  <td align="center"><a href="edit_parcel.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
  <td align="center"><a href="delete_parcel.php?id=<?php echo $row["id"]; ?>" onclick= "return confirm('Are you sure want delete?')">Delete</a></td></tr>
<?php $count++; }?>
</tbody>
</table>

<br /><br /><br /><br />

</div>
</body>
</html>

<center><div>


</div></center>
</div>
</body>
</html>
