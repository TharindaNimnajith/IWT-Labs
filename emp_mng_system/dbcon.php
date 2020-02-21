<?php
$host="localhost";
$username="root";
$password="";
$conn=mysqli_connect($host,$username,$password) or die("unable to create connection. ".mysqli_error($conn));
mysqli_select_db($conn,"employee") or 
die("Cannot connect to database".mysqli_error($conn));

?>