<link rel="stylesheet" href="../styles/admin_stylesheet.css"/>
<?php //Linking the configuration file
require '../config.php';
?>
  <form method="post" >
   <h1 class="title">Adding Subjects to my Timetable </h1>
    <div class="lable">Subject Code :<input type="text" name="sub_cod"><br /><br></div>
    <div class="lable"> Subject Name :<input type="text" name="sub_name"><br /><br></div>


    <?php 
    $sql = "SELECT * FROM weekdays";
    $result = mysqli_query($conn,$sql);
       if ($result->num_rows > 0) {?>
        <div class="lable">Select the date: <select name="day">

    <?php while($row = $result->fetch_assoc()) {?>
    	<option value="<?php echo $row['id']?>"><?php echo $row['day']?></option>

		<?php }?>
    </select></div>
    <?php }?>
    <br /><br>


    <?php 
    $sql = "SELECT * FROM timeslots";
    $result = mysqli_query($conn,$sql);
       if ($result->num_rows > 0) {?>
        <div class="lable">Select the time :<select name="timeslot">

    <?php while($row = $result->fetch_assoc()) {?>
      <option value="<?php echo $row['id']?>"><?php echo $row['slot']?></option>

    <?php }?>
    </select></div>
    <?php }?>
    <br /><br>
   
    <div class="lable"> Lecturer Name :<input type="text" name="lec_name"><br /><br></div>
     <div class="lable">Location :<input type="text" name="location"><br /><br></div>
   


    <input type="submit" value="Submit" name="btnSubmit" class="button">
    <input type="reset" value="Reset" class="button">
  </form>
<?php
if(isset($_POST["btnSubmit"])){
   $subjectCode = $_POST["sub_cod"];
  $subjectName = $_POST["sub_name"]; 
  $lecturer = $_POST["lec_name"];
   $location = $_POST["location"];
   $dayId=$_POST["day"];
   $timeid=$_POST["timeslot"];


  $sql= "INSERT INTO `subjectlist` (`id`, `subject_code`, `subject_name`, `day_id`,`time_id`, `lecturer`, `location`) VALUES (NULL, '$subjectCode', '$subjectName', '$dayId', '$timeid','$lecturer', '$location')";
  echo $sql;
    if(mysqli_query($conn,$sql)){
      echo "Inserted successfully";
    }
    else{
      echo "Error:". $conn->error;
    }
}



 mysqli_close($conn);
