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
  background-color: #d1d1e0;
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
  <li><a href="view_parcel.php">Record of parcel</a></li>
  <li><a href="search.php">Search parcel</a></li>
 <li style="float:right"><a href="logout.php">Logout</a></li>
 </ul>
<br></br>
<body><!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<div class="form">
<table id="table" class="table table-striped custab">
<center>
<h2> Records Parcel Management System</h2></center>
<br></br>
<center><label></label>

<form action="" method="GET">

<input type="text" placeholder="Type name/no tracking " name="search">&nbsp;

<input type="submit" value="search" name="btn" class="btn btn-sm btn-primary">

</form></center>
 <p></p>
 
 
<table width="100%" border="1" style="border-collapse:collapse;">

<thead>
<tr>
  <th><strong>Id</strong></th>
  <th><strong>Date</strong></th>
  <th><strong>No tracking</strong></th>
  <th><strong>Owner Name</strong></th>
  <th><strong>Phone</strong></th>
  <th><strong>Status</strong></th>
  <th><strong>Student Address</strong></th>
  <th><strong>Penalty</strong></th>
  <th><strong>Edit</strong></th>
  <th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;

$sql = "SELECT * FROM parcel_info INNER JOIN student ON parcel_info.studID = student.studId";


if( isset($_GET['search']) ){

    $o_name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));

    $sql = "SELECT * FROM parcel_info INNER JOIN student ON parcel_info.studID = student.studId WHERE student.studName LIKE '%$o_name%' OR no_track LIKE '%$o_name%'";
}

$result = $con->query($sql);



while($row = @$result->fetch_assoc()) { ?>



<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row['date']; ?></td>
<td align="center"><?php echo $row['no_track']; ?></td>
<td align="center"><?php echo $row['studName']; ?></td>
<td align="center"><?php echo $row['telPhone']; ?></td>
<td align="center"><?php echo $row['status']; ?></td>
<td align="center"><?php echo $row['stud_address']; ?></td>
<td align="center">
    <?php
    if($row['status'] == "pending"){
      $dateNow = date("Y-m-d");
      $startDate = date_create($row["date"]);
      $endDate = date_create($dateNow);
      $diff = date_diff($startDate, $endDate);
      
      $tDate = $diff->format("%a");

      if($tDate > 7){
        $penalty = ($tDate - 7) + 1;
        echo "RM".$penalty;
      }
      else {
        echo "RM0";
      }
    }
    else {
      echo "RM0";
    }
    ?>
  </td>
<td align="center"><a href="edit_parcel.php?id=<?php echo $row['id']; ?>">Edit</a></td>
<td align="center"><a href="delete_parcel.php?id=<?php echo $row['id']; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>

<br /><br /><br /><br />

</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#table').DataTable();
    
});</script>-->


</body>
</html>

<center><div>


</div></center>
</div>
</body>
</html>
