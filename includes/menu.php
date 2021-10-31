
<div class="menuContainer" id="menuSection">
    <div class="menuWrapper">
        <div class="menuHeader">
            <h1><span>Choose</span><br class="abc"> OUR MENU <br><i class="fas fa-wine-glass-alt"></i><span class="underline"></span></h1>
        </div> <!--menuHeader ends here-->
        <div  class="buttonContainer">
          <ul> 
            <button class="tablinks"  onclick="openTab('breakfast' , this)"><p id="frontLayer">Breakfast</p><span id="animatedTabBtn"></span></button>  <!-- here we must make sure 1st argument is equal to ID-->
            <button class="tablinks active" onclick="openTab('meals' , this)"><p id="frontLayer">Meals</p><span id="animatedTabBtn"></span></button>
            <button class="tablinks" onclick="openTab('snacks' , this)"><p id="frontLayer">Snacks</p><span id="animatedTabBtn"></span></button>
            <button class="tablinks" onclick="openTab('dessert' , this)"><p id="frontLayer">Desserts</p><span id="animatedTabBtn"></span></button>
            <button class="tablinks" onclick="openTab('drinks' , this)"><p id="frontLayer">Drinks</p><span id="animatedTabBtn"></span></button> 
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
             
                         <li class="menuList">
                           <img src="images/menu/menu-1.jpg" alt="Breakfasts">
                           <div class="detailContainer">
                             <h3 class="menuTitle font-general">
                               <?php echo htmlentities($result->menu_title);?>
                            </h3>
                            <br>
                            <p class="font-general price">
                              <?php echo htmlentities($result->menu_price);?>/-</p>
                              <br>
                              <p class="itemDetail font-general">
                                <?php echo htmlentities($result->menu_detail);?>
                              </p>
                              <div class="cartButtonContainer"></div>
                            </div>
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
                 $cnt=1;
                 if($query->rowCount()>0){
             
                    foreach($results as $result){ 
                      ?>
             
                         <li class="menuList"><img src="images/menu/menu-1.jpg" alt="Breakfasts"><div class="detailContainer"><h3 class="menuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3><br><p class="font-general price"><?php echo htmlentities($result->menu_price);?>/-</p><br><p class="itemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p><div class="cartButtonContainer"></div></div></li>
                        
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
                        <!--NOTE:Folder name case are sensitive in server-->
                         <li class="menuList"><img src="images/menu/menu-1.jpg" alt="Breakfasts"><div class="detailContainer"><h3 class="menuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3><br><p class="font-general price"><?php echo htmlentities($result->menu_price);?>/-</p><br><p class="itemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p><div class="cartButtonContainer"></div></div></li>
                              
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
             
                         <li class="menuList"><img src="images/menu/menu-1.jpg" alt="snacks"><div class="detailContainer"><h3 class="menuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3><br><p class="font-general price"><?php echo htmlentities($result->menu_price);?>/-</p><br><p class="itemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p><div class="cartButtonContainer"></div></div></li>
                        
            <?php }
                    } ?>
          
          </ul>
        </div>

        <div class="item" id="dessert">
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
             
                         <li class="menuList"><img src="images/menu/menu-1.jpg" alt="dessert"><div class="detailContainer"><h3 class="menuTitle font-general"><?php echo htmlentities($result->menu_title);?></h3><br><p class="font-general price"><?php echo htmlentities($result->menu_price);?>/-</p><br><p class="itemDetail font-general"><?php echo htmlentities($result->menu_detail);?></p><div class="cartButtonContainer"></div></div></li>
                        
            <?php }
                    } ?>

             </ul>
          </div>
         
            <div class="orderPageBtn"><a class="orderBtn" href="test.php"><p>Order Now</P><span id="animatedOrderBtn"></span></a></div>
        <script type="text/javascript" src="includes/allFunction.js">
          
       /*   function test(){
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
                    
                }
                activeBtn.className += " active";
                activeBtn.style.color="#c1a35f";
                activeBtn.style.background="white";
                
                var displayingClass=document.getElementById(menuName);
                displayingClass.style.display="block" ;
                

        
        }
             var defaultOpenBtn = document.getElementsByClassName("active");
             defaultOpenBtn[0].click(); */
            
        </script>
      </div> <!--allItem ends here-->
    </div> <!--menuWrapper ends here-->
</div>  <!--mainContainer ends here-->