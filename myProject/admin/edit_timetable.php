<link rel="stylesheet" href="../styles/admin_stylesheet.css"/>
<?php //Linking the configuration file
require '../config.php';
?>
<?php
	
if(isset($_GET['id'])){
	$id=$_GET['id'];

$sql = "SELECT * FROM subjectlist where id=$id";
$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {?>
	

 mysqli_close($conn);

?>