<link rel="stylesheet" href="styles/stylesheet.css"/>
<?php //Linking the configuration file
require 'config.php';
?>

<table>
	<h1 class="title">My Time Table 2018 - Semester 2
  
   <?php 
//TODOwrite a for loop to display all 5 days (same line)
   //for($i=0;){
   //TODOWrite query to get a weekday $sql = "SELECT day FROM weekdays where id=$i";
   // $result = mysqli_query($conn,$sql);
   // $row = $result->fetch_assoc();
    //TODO get  name of the day as $day(1 line)
          ?>

     <tr>
    <th><?php echo $day; ?></th>

   <?php 
   	//TODO write query to get all the subjects on day $i(1 line)
    
    $result = mysqli_query($conn,$sql);
     $result->num_rows;
    if ($result->num_rows > 0) {
    while($row = $result->fetch_array()) {?>

    <td><?php echo $row['subject_code'];?><br>
      <div class="title"><?php echo $row['subject_name'];?></div><br>
      <?php echo $row['location'];?><br>
      <?php echo $row['lecturer'];?><br>
      <?php //TODO get time slot as the same way you got the day (4-5 lines)?>


    </td>
 
  
<?php }
}?>
 </tr>
<?php //}?>

</table>

