<?php  
 session_start();  
      include("../includes/config.php");
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["id"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM admin_tbl WHERE id = :id AND password = :password";  
                $statement = $conn->prepare($query);  
                $statement->execute(  
                     array(  
                          'id'     =>     $_POST["id"],  
                          'password'     =>    $_POST['password']
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {   
                     $_SESSION["id"] = $_POST["id"];  
                     $message = '<label>Log in Success</label>'; 
                     echo "success"; 
                     header("location:admin.php");  
                     
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
    
     <link rel="stylesheet" type="text/css" href="../css/style.css" > 
     <link rel="stylesheet" type="text/css" href="../css/form.css" > 
      <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

      <!--Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet">

      </head>
        <body style="color:white">
        <div class="signupFormContainer logInFormContainer">
        <div class="signupWrapper logInWrapper">
        <form  method="post">
	    <input type="text"  placeholder="Admin id" name="id" >	
      	<input type="password"  placeholder="Password" name="password" >	
		<input type="submit" name="login" id="submit" value="LOG IN">
        </form>
        </div>
        </div>
     </body>
     </html>