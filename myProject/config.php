<?php
$server="localhost";
$user_name="root";
$password="";
$database="timetable";

$conn=new mysqli($server,$user_name,$password,$database);

if($conn->connect_error){

die("Connection Failed : " . $conn->connect_error);
}

?>