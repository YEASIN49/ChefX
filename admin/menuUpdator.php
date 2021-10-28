  <?php 
    session_start();
    error_reporting(0);
    include_once("../includes/config.php");
    if(isset($_SESSION['id']))
    {
    
       if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['detail']) && isset($_POST['catagory'])){  // insert action
         $title=$_POST['name'];
         $price=$_POST['price'];
         $detail=$_POST['detail'];
         $catagory=$_POST['catagory'];
         $sql="INSERT INTO $catagory(menu_title,menu_price,menu_detail) VALUES (:menu_title,:menu_price,:menu_detail)";
         $query = $conn->prepare($sql);
         $query->bindParam(':menu_title',$title);
         $query->bindParam(':menu_price',$price);
         $query->bindParam(':menu_detail',$detail);
         $query->execute();
         header('location:menuUpdator.php');
         
       }
       else if(isset($_POST['delete']))    // Delete action
       {
           $id = $_POST['hidden_menu_id'];
           $tblName = $_POST['hidden_catagory'];
           $sql="DELETE FROM $tblName WHERE $tblName.id=:id";
           $query = $conn->prepare($sql);
           $query->bindParam(':id',$id);
           if($query->execute([':id'=>$id]))
           {
           
           header("location:menuUpdator.php");
           }
           else{
               echo '<script>alert("Deletion Failed ! Try Again ?")</script>';
           }
       }

  ?>
  <!Doctype html>
  <html lang="en">
      <title>
          The ChefX
      </title>
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" type="text/css" href="../css/style.css" >
        <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
      </head>
      <body>
          
      
  <div class="nav">
    <h1 class="alterColor">THE CHEF<span style="color:#c1a35f ; font-size:100px">X</span></span></h1>                 
  </div>

  <div class="backBtn">
      <a href="admin.php">
      <i class="far fa-arrow-alt-circle-left"></i>
      </a>
  </div>

  <div class="insertionForm">
    
       <div class="formLayout">
          <div class="formHeader">
             <h1>ADD MENU</h1>
         </div>
            <form method="post">
                <div class="formContainer">

                  

                    
                        <label for="name">Name</label>
                        <input type="text" name="name" class="formField">
                      
                      
                          <label for="price" class="insertionLabel">Price</label>
                          <input type="text" name="price" class="formField">
                      
                        <label for="description">Description</label>
                        <input type="text" name="detail" class="formField"><br>
                        <label for="catagory">Catagory</label>
                        <select name=catagory class="formField">
                        
                            <option value="breakfast">Breakfast</option>
                            <option value="meal">Meal</option>
                            <option value="drink">Drinks</option>
                            <option value="snacks">Snacks</option>
                            <option value="dessert">Dessert</option> 

                        </select>
                  
                    <button type="submit" name="insert" class="insertBtn">ADD MENU</button>
                    
                    
                </div>
            </form>
          </div>
        </div>  <!-- insertion ends here-->

  <div class="menuContainer">
      <div class="menuWrapper">
      <div class="returnBtn"><a href="admin.php"><i class="far fa-arrow-alt-circle-left"></i> <div>Jump To Home</div> </a></div>
          <div class="menuHeader">
              <h1><span>Update</span><br class="abc"> Available Food <br><i class="fas fa-wine-glass-alt"></i><span class="underline"></span></h1>
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
              
                          <li class="menuList"><img style="width:135px" src="../images/menu/menu-1.jpg" alt="Breakfasts"><div class="detailContainer"><h3 class="menuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3><br><p class="font-general price"><?php echo htmlentities($result->menu_price);?>/-</p><br><p class="itemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p><div class="cartButtonContainer"></div></div>
                            <form method="post" class=deleteBtn> 
                              <input type="hidden" name="hidden_menu_id" value="<?php echo htmlentities($result->id);?>">
                              <input type="hidden" name="hidden_catagory" value="meal">
                              <input type="submit" name="delete" value="Delete" class="menuDeleteBtn" >
                            </form> 
                          </li>
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
                  if($query->rowCount()>0){
              
                      foreach($results as $result){ 
                        ?>
              
                          <li class="menuList"><img style="width:135px" src="../images/menu/menu-1.jpg" alt="Breakfasts"><div class="detailContainer"><h3 class="menuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3><br><p class="font-general price"><?php echo htmlentities($result->menu_price);?>/-</p><br><p class="itemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p><div class="cartButtonContainer"></div></div>
                          <form method="post" class=deleteBtn> 
                              <input type="hidden" name="hidden_menu_id" value="<?php echo htmlentities($result->id);?>">
                              <input type="hidden" name="hidden_catagory" value="breakfast">
                              <input type="submit" name="delete" value="Delete" class="menuDeleteBtn" >
                            </form> 
                          </li>
              <?php }
                      } ?>  

                      
                      
              </ul>
            </div>   <!-- Breakfast Ends Here-->

        

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
              
                          <li class="menuList"><img style="max-width:135px" src="../images/menu/menu-1.jpg" alt="Breakfasts"><div class="detailContainer"><h3 class="menuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3><br><p class="font-general price"><?php echo htmlentities($result->menu_price);?>/-</p><br><p class="itemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p><div class="cartButtonContainer"></div></div>
                          <form method="post" class=deleteBtn> 
                              <input type="hidden" name="hidden_menu_id" value="<?php echo htmlentities($result->id);?>">
                              <input type="hidden" name="hidden_catagory" value="drink">
                              <input type="submit" name="delete" value="Delete" class="menuDeleteBtn" >
                            </form> 
                          </li>     
              <?php }
                      } ?>    
                      
              </ul>
            </div>   <!-- drink Ends Here-->

          <div class="item" id="snacks">
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
              
                          <li class="menuList"><img style="max-width:135px" src="../images/menu/menu-1.jpg" alt="snacks"><div class="detailContainer"><h3 class="menuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3><br><p class="font-general price"><?php echo htmlentities($result->menu_price);?>/-</p><br><p class="itemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p><div class="cartButtonContainer"></div></div>
                          <form method="post" class=deleteBtn> 
                              <input type="hidden" name="hidden_menu_id" value="<?php echo htmlentities($result->id);?>">
                              <input type="hidden" name="hidden_catagory" value="snacks">
                              <input type="submit" name="delete" value="Delete" class="menuDeleteBtn" >
                            </form> 
                          </li>     
              <?php }
                      } ?>    

                </ul>
              </div> <!-- snacks ends here-->

              <div class="item" id="desserts">
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
              
                          <li class="menuList"><img style="max-width:135px" src="../images/menu/menu-1.jpg" alt="dessert"><div class="detailContainer"><h3 class="menuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3><br><p class="font-general price"><?php echo htmlentities($result->menu_price);?>/-</p><br><p class="itemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p><div class="cartButtonContainer"></div></div>
                          <form method="post" class=deleteBtn> 
                              <input type="hidden" name="hidden_menu_id" value="<?php echo htmlentities($result->id);?>">
                              <input type="hidden" name="hidden_catagory" value="dessert">
                              <input type="submit" name="delete" value="Delete" class="menuDeleteBtn" >
                            </form> 
                          </li>     
              <?php }
                      } ?>    

                </ul>
              </div>  <!--dessert ends here-->



              
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
        </div> <!--allItem ends here-->
      </div> <!--menuWrapper ends here-->
  </div>  <!--mainContainer ends here-->
  </body>
  </html>

        <?php 
        
      }
      else{
        header("location:adminAuthenticator.php");
      }   
        ?>