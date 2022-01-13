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





<html>
<form method="POST" action="search2.php">

<body style=background-image:url(.jpg)>


<center>
<form><table>
<h2 style="color:#795e4b;text-align:center">Parcel </h2>

<select name="searchtype">
<option name="parcel_info.no_track" value="parcel_info.no_track">No Tracking</option>
<option name="student.studName" value="student.studName"> Name</option>

</select>&nbsp;
<input type="text" name="searchvalue" rows="10"  size="20">
<br>
<br>
<input type="submit" value="search">&nbsp;<input type="reset" value="Reset">
</form>
<br>
<br>
<br>
<br><br>
</form>

</center>

</body>
</html>