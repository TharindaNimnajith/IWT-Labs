<?php
require_once("dbcon.php");

$qry="CREATE TABLE IF NOT EXISTS `emp`(
    `empid` int NOT NULL auto_increment, 
    `empname` varchar(20) NOT NULL,
    `salary` int, 
    `emp_des` text,
    PRIMARY KEY(`empid`)
)";
$run=mysqli_query($conn,$qry) or die("Cannot create table ".mysqli_error($conn));

$name=$_POST['name'];
$salary=$_POST['salary'];
$des=$_POST['des'];
$id=$_POST['id'];

$qry="INSERT INTO `emp` (`empname`,`empid`,`emp_des`,`salary`) VALUES('$name','$id','$des','$salary')";
$run=mysqli_query($conn,$qry) or die("Data Insertion Failed. ".mysqli_error($conn));

if($run)
    echo "Data Inserted Succeeded. Click Here to go Back.";
    echo "<html><body><a href='index.php'>Home</a></body></html>"
    


?>