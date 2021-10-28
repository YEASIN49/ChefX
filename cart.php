  <?php include_once("includes/config.php");?>

      
  <?php 
   
   
  session_start();
  error_reporting(0);
  $totalBill=0;
  if(empty($_SESSION["email"])) 
  {
    header("location:login.php"); 
  } 

  else{
  //$message = '';

  if(isset($_POST["addToCart"]))  
  {   
    $message = "wrong answer";
echo "<script type='text/javascript'>alert('$message');</script>";
       
      if(isset($_COOKIE["shoppingCart"]))
      {    
        
        /*  print_r($_COOKIE['shoppingCart']); */
          $cookie_data = stripslashes($_COOKIE['shoppingCart']);
        
          $cart_data = json_decode($cookie_data, true);

    /*  }
      else
      {
        $cart_data = array();
      } */
    
      $item_id_list = array_column($cart_data,'item_id'); //for enhanced performace cz otherwise we could $cart_data
      $item_type_list = array_column($cart_data,'item_type');
    
      if(in_array($_POST["hidden_id"], $item_id_list) && in_array($_POST["hidden_type"],$item_type_list)) //here is the bug
      {
        foreach($cart_data as $keys => $values)
        {
          if($cart_data[$keys]["item_id"] == $_POST["hidden_id"] && $cart_data[$keys]["item_type"] == $_POST["hidden_type"]) 
          {
            $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"]; 
          break;
          }
          else{
            $item_array = array(
              'item_id'     => $_POST["hidden_id"],
              'item_type'   => $_POST["hidden_type"],
              'item_name'   => $_POST["hidden_name"],
              'item_price'  => $_POST["hidden_price"],
              'item_quantity'  => $_POST["quantity"]
            );
            $cart_data[] = $item_array;
          break;
          } 
          
        }
      }
      else{
        $item_array = array(
          'item_id'     => $_POST["hidden_id"],
          'item_type'   => $_POST["hidden_type"],
          'item_name'   => $_POST["hidden_name"],
          'item_price'  => $_POST["hidden_price"],
          'item_quantity'  => $_POST["quantity"]
        );
        $cart_data[] = $item_array;
      } 
      
    }
      else          // insert on first click
      {
      $item_array = array(
        'item_id'     => $_POST["hidden_id"],
        'item_type'   => $_POST["hidden_type"],
        'item_name'   => $_POST["hidden_name"],
        'item_price'  => $_POST["hidden_price"],
        'item_quantity'  => $_POST["quantity"]
      );
      $cart_data[] = $item_array;
     }
    
      
      $item_data = json_encode($cart_data);
      setcookie('shoppingCart', $item_data, time() + (86400 * 30), "",null,null,true);
      header("location:cart.php");
    }

  if(isset($_GET["action"]))    //Cart Deletion
  {
  if($_GET["action"] == "remove")
  {
    $cookie_data = stripslashes($_COOKIE['shoppingCart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {
    if($cart_data[$keys]['id'] == $_GET["id"] && $cart_data[$keys]['type'])
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
  }   

  ?>

  <!Doctype html>
  <html>
    <title> RestroX </title>
  
      <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <link rel="stylesheet" type="text/css" href="css/style.css" >
     <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
      <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

      <!--Fonts-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet">

      </head>
        <body>
          <div>
          
        <?php include("includes/nav.php");?>
        </div>
        <div class="menuContainer">
          <div class="menuWrapper">

          <div class="menuHeader">
  
  
              <h1><span>Order</span><br class="abc"> Whatever You Like <br><i class="fas fa-wine-glass-alt"></i><span class="underline"></span></h1>
          </div> <!--menuHeader ends here-->

          <div  class="buttonContainer">
            <ul> 
              <button class="tablinks"  onclick="openTab('breakfast' , this)">Breakfast</button>
              <button class="tablinks active" onclick="openTab('meals' , this)">Meals</button>
              <button class="tablinks" onclick="openTab('snacks' , this)">Snacks</button>
              <button class="tablinks" onclick="openTab('desserts' , this)">Desserts</button>
              <button class="tablinks" onclick="openTab('drinks' , this)">Drinks</button> 
            </ul>
          </div> <!--buttonContainer ends here-->


          <div class="allItem">
          
          <div class="item" id="meals"> <!--NOTE: ID should not contain any space because if contains then we have to use space further use-->
              <ul class="menu">
              <?php 
                  $sql = "SELECT * FROM meal";
                  $query = $conn->prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount()>0){
              
                      foreach($results as $result){ 
                        ?>
                        
                              <div class="cartContainer">
                            
                                <img style="width:165px" src="images/menu/menu-1.jpg" alt="Breakfasts">
                                <h3 class="cartMenuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3>
                                <p class="font-general cartItemPrice">BDT=<?php echo htmlentities($result->menu_price);?>/-</p>
                                <p class="cartItemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p>
                                <form method="post"> 
                                <input type="text" name="quantity" value="1" class="menuInput" >
                                <input type="hidden" name="hidden_id" value="<?php echo htmlentities($result->id);?>">
                                <input type="hidden" name="hidden_name" value="<?php echo htmlentities($result->menu_title);?>">
                                <input type="hidden" name="hidden_price" value="<?php echo htmlentities($result->menu_price );?>">
                                <input type="hidden" name="hidden_type" value="<?php echo htmlentities($result->type );?>">
                                <input type="submit" name="addToCart" value="Add To Cart" class="menuInputBtn" >
                                </form> 
                          </div>
                          
              <?php }
                      } ?>    
                      
              </ul>
            </div> <!-- Meal Ends Here-->
            

            <div class="item" id="breakfast"> <!--NOTE: ID should not contain any space because if contains then we have to use space further use-->
              <ul class="menu">
              <?php 
                  $sql = "SELECT * FROM breakfast";
                  $query = $conn->prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount()>0){  ?>

              
                  
                  <?php  
                      foreach($results as $result){ 
        
                        ?>
              
                          <div class="cartContainer">
                          <img style="width:165px" src="images/menu/menu-1.jpg" alt="Breakfasts">
                          <h3 class="cartMenuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3>
                          <p class="font-general cartItemPrice">BDT=<?php echo htmlentities($result->menu_price);?>/-</p>
                          <p class="cartItemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p>
                          <form method="post"> 
                                <input type="text" name="quantity" value="1" class="menuInput" >
                                <input type="hidden" name="hidden_id" value="<?php echo htmlentities($result->id);?>">
                                <input type="hidden" name="hidden_name" value="<?php echo htmlentities($result->menu_title);?>">
                                <input type="hidden" name="hidden_price" value="<?php echo htmlentities($result->menu_price );?>">
                                <input type="hidden" name="hidden_type" value="<?php echo htmlentities($result->type );?>">
                                <input type="submit" name="addToCart" value="Add To Cart" class="menuInputBtn" >
                                </form> 
                          </div>
              <?php }
                      } ?>    
                      
              </ul>
            </div> <!-- breakfast Ends Here-->

        
            <div class="item" id="drinks"> <!--NOTE: ID should not contain any space because if contains then we have to use space further use-->
              <ul class="menu">
              <?php 
                  $sql = "SELECT * FROM drink";
                  $query = $conn->prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount()>0){
              
                      foreach($results as $result){ 
                        ?>
              
                          <div class="cartContainer">
                          <img style="width:165px" src="images/menu/menu-1.jpg" alt="drinks">
                          <h3 class="cartMenuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3>
                          <p class="font-general cartItemPrice"> BDT=<?php echo htmlentities($result->menu_price);?>/-</p>
                          <p class="cartItemDetail font-general">Item Contains : <?php echo htmlentities($result->menu_detail);?></p>
                          <form method="post"> 
                          <form method="post"> 
                                <input type="text" name="quantity" value="1" class="menuInput" >
                                <input type="hidden" name="hidden_id" value="<?php echo htmlentities($result->id);?>">
                                <input type="hidden" name="hidden_name" value="<?php echo htmlentities($result->menu_title);?>">
                                <input type="hidden" name="hidden_price" value="<?php echo htmlentities($result->menu_price );?>">
                                <input type="hidden" name="hidden_type" value="<?php echo htmlentities($result->type );?>"> 
                                <input type="submit" name="addToCart" value="Add To Cart" class="menuInputBtn" >
                                </form> 
                          </div>
              <?php }
                      } ?>    
                      
              </ul>
            </div> <!-- drink Ends Here-->


            <div class="item" id="snacks"> <!--NOTE: ID should not contain any space because if contains then we have to use space further use-->
              <ul class="menu">
              <?php 
                  $sql = "SELECT * FROM snacks";
                  $query = $conn->prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount()>0){
              
                      foreach($results as $result){ 
                        ?>
              
                          <div class="cartContainer">
                          <img style="width:165px" src="images/menu/menu-1.jpg" alt="snacks">
                          <h3 class="cartMenuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3>
                          <p class="font-general cartItemPrice"> BDT=<?php echo htmlentities($result->menu_price);?>/-</p>
                          <p class="cartItemDetail font-general">Item Contains : <?php echo htmlentities($result->menu_detail);?></p>
                          <form method="post"> 
                                <input type="text" name="quantity" value="1" class="menuInput" >
                                <input type="hidden" name="hidden_id" value="<?php echo htmlentities($result->id);?>">
                                <input type="hidden" name="hidden_name" value="<?php echo htmlentities($result->menu_title);?>">
                                <input type="hidden" name="hidden_price" value="<?php echo htmlentities($result->menu_price );?>">
                                <input type="hidden" name="hidden_type" value="<?php echo htmlentities($result->type );?>">
                                <input type="submit" name="addToCart" value="Add To Cart" class="menuInputBtn" >
                                </form> 
                          </div>
              <?php }
                      } ?>    
                      
              </ul>
            </div> <!-- snacks Ends Here-->

            <div class="item" id="desserts"> <!--NOTE: ID should not contain any space because if contains then we have to use space further use-->
              <ul class="menu">
              <?php 
                  $sql = "SELECT * FROM dessert";
                  $query = $conn->prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount()>0){
              
                      foreach($results as $result){ 
                        ?>
              
                          <div class="cartContainer">
                          <img style="width:165px" src="images/menu/menu-1.jpg" alt="dessert">
                          <h3 class="cartMenuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3>
                          <p class="font-general cartItemPrice"> BDT=<?php echo htmlentities($result->menu_price);?>/-</p>
                          <p class="cartItemDetail font-general">Item Contains : <?php echo htmlentities($result->menu_detail);?></p>
                          <form method="post"> 
                                <input type="text" name="quantity" value="1" class="menuInput" >
                                <input type="hidden" name="hidden_id" value="<?php echo htmlentities($result->id);?>">
                                <input type="hidden" name="hidden_name" value="<?php echo htmlentities($result->menu_title);?>">
                                <input type="hidden" name="hidden_price" value="<?php echo htmlentities($result->menu_price );?>">
                                <input type="hidden" name="hidden_type" value="<?php echo htmlentities($result->type);?>">
                                <input type="submit" name="addToCart" value="Add To Cart" class="menuInputBtn" >
                                </form> 
                          </div>
              <?php }
                      } ?>    
                      
              </ul>
            </div> <!-- dessert Ends Here-->

        
          

        </div> <!--allItem ends here -->

        </div>  <!--menuWrapper ends here--> 
        </div>  <!--menuContainer ends here-->
        <div><?php echo $message;?></div>

        <div class="paymentContainer">
        <h1 class="paymentTableTitle">Inventory Details</h3>
          <table class="paymentTable">
            <tr>
              <th style="color:#c1a35f;font-size:24px">Order To place</th>
              </tr>
              <tr>
                <td>Menu ID</td>
                <td>Menu Name</td>
                <td> Menu Quantity</td>
                <td>Individual Price</td>
                <td>Individual Total</td>
                <td>Cancel Item</td>
              </tr>
              
            <?php 
            
            if(isset($_COOKIE["shoppingCart"]))
            {
              echo '<div>alert("Now item in the cart");</div>';
           /*   echo '<div>'.$_COOKIE["shoppingCart"].'</div>';  */ //for testing stripslashes
                  $total = 0;
                  $cookie_data = stripcslashes($_COOKIE["shoppingCart"]);
               /*     echo '<div> AFTER STRIPSLASHES'.stripcslashes($_COOKIE["shoppingCart"]).'</div>';   */ //for testing decode
                  $cart_data = json_decode($cookie_data);
                /*  print_r ( '<div>After DECODE'.$cart_data.'</div>'); */
                  foreach($cart_data as $key => $value)
                  {  ?>
                    <tr>
                        <td><?php echo htmlentities($value->item_type) . htmlentities($value->item_id) ?></td>
                        <td><?php echo htmlentities($value->item_name) ?></td>
                        <td><?php echo htmlentities($value->item_quantity) ?></td>
                        <td><?php echo htmlentities($value->item_price) ?></td>
                        <td><?php echo number_format(($value->item_quantity) * ($value->item_price) , 2)?></td>
                        <?php $totalBill = $totalBill + number_format(($value->item_quantity) * ($value->item_price) , 2) ?>
                          <td> 
                         
                             <a href="cart.php?action=remove&id=<?php echo htmlentities($value->item_id)?>&type=<?php htmlentities($value->item_type)?>" id="cancelBtn">Remove</a>
                          </td>
                    </tr>
                  
                        
                  <?php

                  }

            }
            else
            {
                echo '<div>alert("No item in the cart");</div>';
            }   
            ?> 

              <tfoot>
                    
                    
                       <tr style="font-weight:bold ; background:grey;font-size:20px">
                         <td  colspan="4">Total Amount</td>
                         <td ><?php echo $totalBill ;?></td>
                       </tr>


                       <tr style="font-weight:bold ; background:grey;font-size:20px">
                         <td  colspan="4">Discount</td>
                         <td >
                         
                         <?php 
                             $sql = "SELECT * FROM discount";
                             $query = $conn->prepare($sql);
                             $query->execute();
                             $results=$query->fetch(PDO::FETCH_OBJ); 
                             
                             $discount = number_format($results->amount);
                             $purchase = number_format($results->min_purchase);
                             if($totalBill > $purchase)
                             {
                             echo  $discount ;
                             }
                             else{
                               $noDisc=0;
                               echo $noDisc;
                             }
              
                             ?>
                             
                         </td>
                       </tr>

                       <tr style="font-weight:bold ; background:grey;font-size:20px">
                         <td  colspan="4">Total Amount To Be Paid</td>
                         <td >
                             <?php 
                             if($totalBill > $purchase)
                             {
                                $totalPayable = $totalBill - $discount;
                                echo $totalPayable; 
                             }
                             else{
                               echo $totalBill;
                             }
                             ?>
                         </td>
                       </tr>

                    </tfoot>        

          </table>
          <div class="OrderPlaceBtn">
              <button></button>
          </div>
        </div> <!--paymentContainer ends here -->
        
          <div class="orderBtn">
            <div class="buttonContainer">
             <input type="submit" name=""></input>
            </div>
          </div>
        
    

          

              
          <script>
            
            function test(){
              console.log("works");
            }
          function openTab(menuName , activeBtn ){ 
                
              var i ;
                var tabContent=document.querySelectorAll(".item"); // NOTE : class name is written with dot
                // or use getElementsByClassName("item");
                
                // for not displaying all div before clicking
                for(i=0 ; i < tabContent.length ; ++i){
                    tabContent[i].style.display="none";
                  }
                  
                  var tabs = document.getElementsByClassName("active");
                  for(i = 0 ; i < tabs.length ; ++i){
                      tabs[i].style.color="white";
                      tabs[i].style.background="#c1a35f";
                      tabs[i].className = tabs[i].className.replace("active" , "");
                      console.log("wsad");
                  }
                  activeBtn.className += " active";
                  activeBtn.style.color="#c1a35f";
                  activeBtn.style.background="white";
                  
                  var displayingClass=document.getElementById(menuName);
                  displayingClass.style.display="block" ;
                  

          
          }
              var defaultOpenBtn = document.getElementsByClassName("active");
              defaultOpenBtn[0].click(); 
              
          </script>

  </body>
    
    </html>
        <?php }?>