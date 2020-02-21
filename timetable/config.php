<?php
$server="";
$user_name="";
$password="";
$database="";

$conn=new mysqli();

if($conn->connect_error){

die("Connection Failed : " . $conn->connect_error);
}

?>