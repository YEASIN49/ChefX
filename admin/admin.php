<?php include_once("../includes/config.php");?>
      
      <?php 
       
      session_start();
      if(isset($_SESSION["id"])) 
      {
     
    
     /* if(isset($_POST["addToCart"]))
      {
          if(isset($_COOKIE["shoppingCart"]))
          {
              $cookie_data = stripslashes($_COOKIE['shoppingCart']);
            
              $cart_data = json_decode($cookie_data, true);
          }
          else
          {
            $cart_data = array();
          }
        
          $item_id_list = array_column($cart_data, 'id');
        
          if(in_array($_POST["hidden_id"], $item_id_list))
          {
            foreach($cart_data as $keys => $values)
            {
              if($cart_data[$keys]["id"] == $_POST["hidden_id"])
              {
                $cart_data[$keys]["quantity"] = $cart_data[$keys]["quantity"] + $_POST["quantity"]; 
              } 
            }
          }
          else
          {
          $item_array = array(
            'item_id'   => $_POST["hidden_id"],
            'item_name'   => $_POST["hidden_name"],
            'item_price'  => $_POST["hidden_price"],
            'item_quantity'  => $_POST["quantity"]
          );
          $cart_data[] = $item_array;
          }
        
          
          $item_data = json_encode($cart_data);
          setcookie('shoppingCart', $item_data, time() + (86400 * 30));
          header("location:cart.php?success=1");
        }
    
      if(isset($_GET["action"]))
      {
      if($_GET["action"] == "delete")
      {
        $cookie_data = stripslashes($_COOKIE['shoppingCart']);
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $keys => $values)
        {
        if($cart_data[$keys]['mealID'] == $_GET["mealID"])
        {
          unset($cart_data[$keys]);
          $item_data = json_encode($cart_data);
          setcookie("shoppingCart", $item_data, time() + (86400 * 30));
          header("location:index.php?remove=1");
        }
        }
      }
      if($_GET["action"] == "clear")
      {
        setcookie("shoppingCart", "", time() - 3600);
        header("location:index.php?clearall=1");
      }
      }  */
    
      ?>
    
      <!Doctype html>
      <html>
        <title> RestroX </title>
      
          <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1">
             
               <link rel="stylesheet" type="text/css" href="../css/adminStyle.css" >
               <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
               <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
         
               <!--Fonts-->
               <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
               <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet">
    
          </head>
    <body>
        <div class="container">
              <div class="wrapper">
                  <div class="nav">
                  <h1 class="alterColor">THE CHEF<span style="color:#c1a35f ; font-size:100px">X</span></span></h1>                 
                  </div>
                    <ul class="content">
                      <li><a href="../index.php">Home</a></li>    
                      <li><a href="">Orders</a></li>
                      <li><a href="menuUpdator.php">Menu</a></li>
                      <li><a href="offerGenerator.php">Offer Generator</a></li>
                      <li><a href="">Payment Update</a></li>
                      <li><a href="../logout.php">Log Out</a></li>
                   </ul>
              </div>
        </div>
    </body>
    </html>
      <?php } 
      
         
      
      else{
        header("location:adminAuthenticator.php"); 
      }
      ?>