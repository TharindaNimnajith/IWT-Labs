<?php 
//Include database connection details
require_once(__DIR__.'/../config.php');
$user_id = $_SESSION['SESS_USER_ID'];

$res = mysqli_query($link,"SELECT * FROM tbl_user WHERE user_id=".$user_id." LIMIT 1");
$user = mysqli_fetch_assoc($res);

if(is_array($_POST) && count($_POST) > 0) {
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	if( strlen($password) < 6 ) {
		$errmsg_arr[] = 'Password is too short.';
		$errflag = true;
	}

	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ./../profile.php");
		exit();
	}
	//Create INSERT query
	$qry = "UPDATE tbl_user SET password='".md5($_POST['password'])."', updated_at='".date("Y-m-d H:i:s")."' WHERE user_id=$user_id";
	$result = @mysql_query($qry);
	//Check whether the query was successful or not
	if($result) {
		$_SESSION['MSGS'] = array('<strong>Wola!</strong> Your password was changed successfully.');
		session_write_close();
		header("location: ..\profile.php");
		exit();
	}else {
		die("Query failed: ".mysql_error());
	}
}
?>