<?php 
session_start();
error_reporting(0);

include_once("includes/config.php");
?>
<!Doctype html>
<html>
  <title> RestroX </title>
 
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" type="text/css" href="css/style.css" >
    <link rel="stylesheet" type="text/css" href="css/animation.css" >

    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
    
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300&display=swap" rel="stylesheet">
   </head>
      <body>
    
      

        <?php include("includes/header.php");?>
        <?php include("includes/menu.php");?>
        <?php include("includes/featuredItem.php");?>
        <?php include("includes/offers.php");?>
        <?php include("includes/parallex.php");?>
        <?php include("includes/aboutUs.php");?>
        <?php include("includes/contact.php");?>
        <?php include("includes/footer.php");?>

        <script type="text/javascript" src="allFunction.js">
        /*
        window.onscroll = function() {scrollFunction()};

        function scrollFunction(){

          var navIcon= document.getElementById("brandLogo");
          var navLists = document.getElementById("navUl");
          var logoContainer = document.getElementById("navLogo");
          if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
          
           console.log(navLists);
           navIcon.style.width = "85px";
           navIcon.style.margin = "0px";
           navLists.style.padding = "0 70px 0 10px";
           logoContainer.style.margin = "5px 0 0 45px";

          // navIcon.style.padding-left = "30px";
          
          } else {
            navIcon.style.width = "125px";
            navLists.style.padding = "15px 70px 15px 10px";
            logoContainer.style.margin = "10px 0 10px 45px;";

          }

        }
                */
        </script>

    </body>
   
</html>