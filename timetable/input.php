<link rel="stylesheet" href="styles/stylesheet.css"/>

<?php //Linking the configuration file
require 'config.php';
?>
  <form method="post" >
   <h1 class="title">Adding Subjects to my Timetable </h1>
    <div class="lable">Subject Code :<input type="text" name="sub_cod"><br /><br></div>
    <div class="lable"> Subject Name :<input type="text" name="sub_name"><br /><br></div>


    <?php 
     //TODO get weekdays from weekdays table and asign the results to  $result array.(2 lines)
    
      /* if ($result->num_rows > 0) {*/?>
        <div class="lable">Select the date: <select name="day">

    <?php /*while($row = $result->fetch_assoc()) {*/

        //TODO Add option value, name accordingly (same line)?>
    	<option value=""></option>

		<?php// }?>
    </select></div>
    <?php //}?>
    <br /><br>


    <?php 
    //TO DO get all the time list from timeslots table and asign to $result array(2 lines)
      // if ($result->num_rows > 0) {?>
        <div class="lable">Select the time :<select name="timeslot">

    <?//php while($row = $result->fetch_assoc()) {

      //TODO Add option value,name accordingly (same line)?>
     
      <option value=""></option>

    <?php // }?>
    </select></div>
    <?php //}?>
    <br /><br>
   
    <div class="lable"> Lecturer Name :<input type="text" name="lec_name"><br /><br></div>
     <div class="lable">Location :<input type="text" name="location"><br /><br></div>
   


    <input type="submit" value="Submit" name="btnSubmit" class="button">
    <input type="reset" value="Reset" class="button">
  </form>
<?php
if(isset($_POST["btnSubmit"])){
  // TODO :get all the post values(6 lines)
  

//TODO Complete sql query (same line)
  $sql= "INSERT INTO `subjectlist` (`id`, `subject_code`, `subject_name`, `day_id`,`time_id`, `lecturer`, `location`) VALUES ()";
  
  //TODO the insertion 
    if(true){
      echo "Inserted successfully";
    }
    else{
      echo "Error:". $conn->error;
    }
}



 mysqli_close($conn);
