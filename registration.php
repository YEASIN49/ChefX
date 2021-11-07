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
  <!-- <link rel="stylesheet" type="text/css" href="css/form.css" > -->
  <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet">

  </head>
  <body>
    <?php include("includes/nav.php")?>
    <div class="logInBackground">
      <div class="logInFormContainer">
        <img id="formBackgroundId" class="formBackground" src="" alt="test">
        <!-- <img class="formBackground" src="images/login/login-bg-3_medium.jpg" alt="test"> -->
        <div class="loginFormContent">
          <form class="loginForm" style="margin-top: 15px;"  method="post">
            <i class="fas fa-user loginUserIcon dynamicPositionClass"></i>     
            <input class="loginInput registrationForm" type="text" value="" placeholder="Username" name="fname" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
            <input class="loginInput registrationForm" type="email" value="" placeholder="Email" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
            <div class="labeledinput">
              <label class="formText" for="dob">Date of Birth</label>
              <input class="loginInput registrationForm dateInput" type="date" id="dob" name="dob"
              value="2018-07-22">
            </div>
            <div class="labeledinput">
              <!-- <label class="formText" for="gender">Gender</label> -->
              <span class="radioText">Male</span>
              <input class="radioInput" type="radio" name="gender"
              value="male">
              <span class="radioText">Female</span>
              <input class="radioInput" type="radio" name="gender"
              value="female">
            </div>
            <div class="labeledinput">
              <label class="formText" for="phone">phone number</label>
              <input class="loginInput registrationForm dateInput" type="tel" name="mobilenumber" > <!--pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"> -->
            </div>
            <input class="loginInput registrationForm" type="password" value="" placeholder="Password" name="password" required="">
            <input class="loginSubmitBtn" type="submit" name="submit" id="submit" value="REGISTER">
            <div class="bottomPrompt">
                  <!-- <a class="formPrompt" href="registration.php">Create New Account!</a> -->
                  <!-- <a class="formPrompt" href="">Forget Password/Username?</a> -->
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="./includes/allFunction.js"></script>
  </body>
</html>