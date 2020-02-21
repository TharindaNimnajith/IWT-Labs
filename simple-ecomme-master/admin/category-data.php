<?php 
if(!isset($_SESSION)) session_start();
//Include database connection details
require_once(__DIR__.'/../config.php');
$link =new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if (!$link) {
	die("Cannot access db.");
}

if($link->connect_error) {
	die("Unable to select database");
}else{
$categories;
//get all the categories
$sql="SELECT count(`tbl_product`.`cat_id`) as `product_count`,`tbl_category`.*
					FROM `tbl_category`
					LEFT JOIN `tbl_product`
					ON `tbl_product`.`cat_id`=`tbl_category`.`cat_id`
					GROUP BY `tbl_category`.`cat_id`";
$res = mysqli_query($link,$sql);
while ($row = mysqli_fetch_object($res)) {
	$categories[] = $row;
}
//handle new category request
if(is_array($_POST) && count($_POST) > 0) {
	$catname = $_POST['catname'];
	$catdesc = htmlspecialchars($_POST['catdesc']);

	if($catname == '') {
		$errmsg_arr[] = 'Category name missing';
		$errflag = true;
	}



	//Create INSERT query
	$qry = "INSERT INTO `tbl_category` ( `cat_name`, `cat_description`)
			VALUES ('".$catname."', '".$catdesc."');";
	$result = mysqli_query($link,$qry);
	//Check whether the query was successful or not
	if($result) {
		$_SESSION['MSGS'] = array('<strong>Wola!</strong> Changes were successful.');
		session_write_close();
		header("location: index.php");
		exit();
	}else {
		die("Query failed: ".mysql_error());
	}
}
//handle delete request
if(is_array($_GET) && count($_GET) > 0 && isset($_GET['delete'])) {
	$catid = $_GET['delete'];

	$qry = "DELETE FROM `tbl_category`
			WHERE cat_id=".$catid;
	$result = mysqli_query($qry);
	//Check whether the query was successful or not
	if($result) {
		$_SESSION['MSGS'] = array('<strong>Wola!</strong> Changes were successful.');
		session_write_close();
		header("location: index.php");
		exit();
	}else {
		$_SESSION['ERRMSG_ARR'] = array('<strong>Oh no!</strong> Changes didn\'t happen, make sure your database is up.');
		session_write_close();
		header("location: index.php");
		exit();
	}
}
}
?>