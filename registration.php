<?php 
  
 /* $host = "localhost";
  $user = "root";
  $pass = "";
  $dbName = "restaurant_cms";
 
 
  $dsn = "mysql:host=$host;dbname=$dbName"; // no space after semicolon

  $conn=new PDO($dsn,$user,$pass);*/
  include("includes/config.php");

  if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO  user(fname,mnumber,email,password) VALUES(:fname,:mnumber,:email,:password)";
$query = $conn->prepare($sql);
$query->bindParam(':fname',$fname);
$query->bindParam(':mnumber',$mnumber);
$query->bindParam(':email',$email);
$query->bindParam(':password',$password);
$query->execute();
header('location:registration.php');
}

  
  ?>

<!--Javascript for check email availabilty-->




<!Doctype html>
  <html>
    <title> RestroX </title>
  
      <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <link rel="stylesheet" type="text/css" href="css/style.css" >
     <link rel="stylesheet" type="text/css" href="css/form.css" >
      <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

      <!--Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet">

      </head>
        <body>
        <?php include("includes/nav.php")?>
        <div class="signupFormContainer logInFormContainer">
        <div class="signupWrapper logInWrapper">
         <form action="registration.php" method="post">
            <input type="text" value="" placeholder="Full Name" name="fname" autocomplete="off" required="">
		        <input type="text" value="" placeholder="Mobile number" maxlength="11" name="mobilenumber" autocomplete="off" required="">
	          <input type="text" value="" placeholder="Email id" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
      	    <input type="password" value="" placeholder="Password" name="password" required="">	
		        <input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
          </form>
        </div>
        </div>
     </body>
     </html>