<html>
    <head>
        <title>Search Employee</title>
    </head>
    <body>
        <h3>To Retrieve Records</h3>
        <form action="find.php" method="get" name="frm2">
            <input type="text" name="des" placeholder="Enter Designation : ">
            <!--<button type="submit" name="find">Find Data</button>-->
            <input type="submit" name="submit">
        </form>
    </body>
</html>
<?php
 

    if(isset($_GET['submit'])){
        require_once("dbcon.php");
        $des=$_GET['des'];
        $qry= "SELECT * FROM `emp` WHERE emp_des LIKE '%$des%' ";
        $result=mysqli_query($conn,$qry) ;
        $n=mysqli_num_rows($result);
        
        if($n<1){
            echo "No Records Found";   
        }
        else{
            echo "<table border=1>";
            echo "<th>Name</th> <th>Salary</th>";
             while($row = mysqli_fetch_assoc($result))
            {   
                    echo "<tr><td>".$row['empname'] . "</td>" ; 
                     echo "<td>". $row['salary']."</td></tr>" ; 

            }
            echo "</table>";
        }
        echo "<br>Click Here to go Back.";
        echo "<html><body><a href='index.php'>Home</a></body></html>";  
        
    
    }
?>