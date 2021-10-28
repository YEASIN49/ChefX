<?php

session_start();
error_reporting(0);
include("../includes/config.php");
if(isset($_SESSION['id'])){
  
 if(isset($_POST['insert']))
 {   echo "entered 1";
     $discountAmount = $_POST['amount']; 
     $minAmount = $_POST['minPurchase'];   
     echo "entered 2";
    // $sql="INSERT INTO discount(amount,discount_name) VALUES (:amount,:detail)";
    $sql = "UPDATE discount SET amount='$discountAmount',min_purchase='$minAmount' WHERE id=1";
     echo "entered 3";
     $query = $conn->prepare($sql);
     echo "entered 4";
   /*  $query->bindParam(':amount',$discountAmount);
     $query->bindParam(':detail',$discountName);*/
     $query->execute();
     echo "entered 5";
     header('location:offerGenerator.php');
     
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/adminStyle.css" >
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
     

    <title>The ChefX</title>
</head>
  <body>

     <div class="nav">
       <h1 class="alterColor">THE CHEF<span style="color:#c1a35f ; font-size:100px">X</span></span></h1>                 
     </div>

     <div class="returnBtn">
         <a href="admin.php">
         <i class="far fa-arrow-alt-circle-left"></i>
         </a>
     </div>

        <div class="formContainer">
           
             <div class="formLayout">
                <div class="formHeader">
                   <h1>GENERATE DISCOUNT</h1>
               </div>
                      <div class="formContent">
                      <form method="post">
                            <label for="name">Discount Amount</label>
                            <input type="text" name="amount" class="formField">
                            
                          <!--  <label for="price" class="insertionLabel">Price</label>
                            <input type="text" name="price" class="formField">
                            -->
                            
                            <label for="description">Minimum Purchase</label>
                            <input type="text" name="minPurchase" class="formField"><br>

                              
                         <!--    <label for="catagory">Catagory</label>
                             <select name=catagory class="formField">
                              
                                  <option value="breakfast">Breakfast</option>
                                  <option value="meal">Meal</option>
                                  <option value="drink">Drinks</option>
                                  <option value="snacks">Snacks</option>
                                  <option value="dessert">Dessert</option> 
         
                             </select> -->
                        
                          <button type="submit" name="insert" class="insertBtn">CREATE DISCOUNT</button>
                          
                          </form>        
                      </div>
                  
                
              </div>  <!-- insertion ends here-->
        </div>
      
  </body>
</html>

<?php }
      else{
           header("location:admin.php");
}

?>