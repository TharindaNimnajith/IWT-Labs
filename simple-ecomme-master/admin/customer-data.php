<?php
//Include database connection details
require_once(__DIR__.'/../config.php');
$users;
//get all the categories
$sql="SELECT * FROM tbl_user where user_is_admin=0";
$res = mysqli_query($link,$sql);
while ($row = mysqli_fetch_object($res)) {
	$users[] = $row;
}
?>