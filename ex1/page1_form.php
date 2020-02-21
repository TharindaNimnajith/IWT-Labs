<?php
// Session starts here.
session_start();
?><!DOCTYPE HTML>
<html>
 <head>
 <title>PHP Multi Page Form</title>
 <link rel="stylesheet" href="styles/stylesheet.css" />
 </head>
 <body>
 <div class="container">
 <div class="main">
 <h2>PHP Multi Page Form</h2>
 <span id="error">
 <!---- Initializing Session for errors --->
 <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 
 }
 ?>
 </span>
 <form action="page2_form.php" method="post">
 <label>Full Name :<span>*</span></label>
 <input name="name" type="text" placeholder="Ex-James Anderson" required>
 <label>Email :<span>*</span></label>
 <input name="email" type="email" placeholder="Ex-anderson@gmail.com" required>
 <label>Contact :<span>*</span></label>
 <input name="contact" type="text" placeholder="10-digit number" required>
 <label>Password :<span>*</span></label>
 <input name="password" type="Password" placeholder="*****" required>
 <label>Re-enter Password :<span>*</span></label>
 <input name="confirm" type="password" placeholder="*****" required>

 
<input type="reset" value="Reset" />
 <input type="submit" value="Next" />
 </form>
 </div>
 </div>
 </body>
</html>
