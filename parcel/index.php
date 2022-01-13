<!DOCTYPE html>
<html>
<?php include("includes/db.php"); ?>
<style>
	body {
		margin: 0;
	}
	
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
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="insert.php">New parcel</a></li>
  <li><a href="view_parcel.php">Record of parcel</a></li>
  <li><a href="search.php">Search parcel</a></li>
 <li style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<br></br>
<center><div>
<body>

  <h1>Welcome to Parcel Management System</h1> 
  <h2></h2>
  <br>
  <div align="center" style="scroll-behavior: auto;">
    <!--<?php
    $sql = "SELECT * FROM parcel_info WHERE status = 'pending'";
    $query = mysqli_query($con, $sql);
    $num = mysqli_num_rows($query);

    if($num > 0){

    while($row = mysqli_fetch_array($query)){
      $no_track = $row["no_track"];
      ?>
      <p><?php echo $no_track; ?></p>
      <?php
    }

    }

    ?>-->

    <form action="" method="GET">

<input type="text" placeholder="Type name/no tracking " name="search">&nbsp;

<input type="submit" value="search" name="btn" class="btn btn-sm btn-primary">

</form></center>
 <p></p>
 
 
<table width="100%" border="2" style="border-collapse:collapse;">

<thead>
<tr>
  <th><strong>No tracking</strong></th>
  <th><strong>Owner Name</strong></th>
</thead>
<tbody>
<?php
$count=1;

$sql = "SELECT * FROM parcel_info INNER JOIN student ON parcel_info.studID = student.studId WHERE status = 'pending'";

if( isset($_GET['search']) ){

    $o_name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));

    $sql = "SELECT * FROM parcel_info INNER JOIN student ON parcel_info.studID = student.studId WHERE student.studName LIKE '%$o_name%' OR no_track LIKE '%$o_name%'";
}

$result = $con->query($sql);



while($row = $result->fetch_assoc()) { 

      $dateNow = date("Y-m-d");
      $startDate = date_create($row["date"]);
      $endDate = date_create($dateNow);
      $diff = date_diff($startDate, $endDate);
      
      $tDate = $diff->format("%a");
      if($tDate > 7){
        $penalty = $tDate - 7;
        $total = $penalty;
      }
      else {
        $total = 0;
      }

      $studID = $row['studID'];
      $upPenal = "UPDATE parcel_info SET penalty = $total WHERE studID = '$studID'";
      $query = $con->query($upPenal);
?>

<tr>
<td align="center"><?php echo $row['no_track']; ?></td>
<td align="center"><?php echo $row['studName']; ?></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
  </div>

</body>

</html> 
