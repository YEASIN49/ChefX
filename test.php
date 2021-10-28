<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["email"]))  
 {  
     header("location:cart.php"); 
 }  
 else  
 {    
      
      header("location:login.php");  
 }  
 ?>  