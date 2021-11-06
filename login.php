<?php  
 session_start();  
      include("includes/config.php");
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {    $hashedPass = md5($_POST["password"]);
               echo $hashedPass;
                $query = "SELECT * FROM user WHERE email = :email AND password = :password";  
                $statement = $conn->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     =>     $_POST["email"],  
                          'password'     =>  $hashedPass    //$_POST['password']
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {   
                     $_SESSION["email"] = $_POST["email"];
                    //  $_SESSION["isLogin"] = true;  
                     $message = '<label>Log in Success</label>'; 
                     echo "success"; 
                     header("location:cart.php");  
                     
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 
 ?>  
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
                              
                              <form class="loginForm"  method="post">
                                   <i class="fas fa-user loginUserIcon"></i>     
                                   <input class="loginInput" type="text" value="" placeholder="Username" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
                                   <input class="loginInput" type="password" value="" placeholder="Password" name="password" required="">
                                   	
                                   <input class="loginSubmitBtn" type="submit" name="login" id="submit" value="LOG IN">
                                   <div class="bottomPrompt">
                                        <a class="formPrompt" href="">Create New Account!</a>
                                        <a class="formPrompt" href="">Forget Password/Username?</a>
                                   </div>
                              </form>
                             
                         </div>
                    </div>
               </div>
               <script src="./includes/allFunction.js"></script>
          </body>
     </html>