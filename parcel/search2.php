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
  background-color: #000000;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
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
  <li><a href="index_user.php">Home</a></li>
  <li><a class="active" href="search_user.php">Search parcel</a></li>
  
</ul>
<br></br>
<center><div>
</body>
</html>






<?php
session_start();
include("includes/db.php");
?>



<?php
$db="parcel";
$searchtype=$_POST['searchtype'];
$searchvalue=$_POST['searchvalue'];

mysqli_connect("localhost","root","", "parcel")or die("Could not connect to server.".mysql_error());
//mysql_select_db("parcel")or die("Could not connect to database".mysql_error());

//$query="SELECT * FROM parcel_info INNER JOIN student ON parcel_info.studID = student.studId WHERE $searchtype LIKE '%$searchvalue%'";
$result=mysqli_query($con,"SELECT * FROM parcel_info INNER JOIN student ON parcel_info.studID = student.studId WHERE $searchtype LIKE '%$searchvalue%'");
$num_rows=mysqli_num_rows($result);

if($num_rows < 1)
{
echo "<h3 align='center'>No Record Found</h3>";
}
else
{

?>
<h4 style='color:#795e4b;text-align:center'>Record Found</h4>
<h4 style='color:#000;text-align:center'>There are <u><?php echo $num_rows ?></u> records.</h4><p>
<table border='3' width='1000' bgcolor='#fff' align='center'>
<tr>
<tr bgcolor='LightGreen'>
<th><b>Date</b></th>
<th><b>No Tracking</b></th>
<th><b>Owner name</b></th>
<th><b>Number Phone</b></th>
<th><b>Status</b></th>
<th><b>Address</b></th>
<th><b>Penalty</b></th>
</tr>
<?php






while($get_info = mysqli_fetch_array($result))
{
echo "<tr>";
?>

<td><?php echo $get_info["date"]; ?></td>
<td><?php echo $get_info["no_track"]; ?></td>
<td><?php echo $get_info["studName"]; ?></td>
<td><?php echo $get_info["telPhone"]; ?></td>
<td><?php echo $get_info["status"]; ?></td>
<td><?php echo $get_info["stud_address"]; ?></td>
<td> <?php
   $dateNow = date("Y-m-d");
      $startDate = date_create($get_info["date"]);
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
    ?></td>

<?php
echo "</tr>";
}
echo "</table>";
}
?>
<br>
<br>