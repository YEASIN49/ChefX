<div class="navContainer">
  <div class="navWrapper">
    <div id="navLogo">
        <a  href="#"><img src="images/newlogo2.png" id="brandLogo"></a>
    </div>    
    <ul id="navUl">
        <li class="navLi"><a href="index.php">HOME</a></li>
        <li class="navLi"><a onclick="jumpWindow('menuSection')">MENU</a></li>
        <li class="navLi"><a onclick="jumpWindow('offerSection')">OFFERS</a></li> 
        <li class="navLi"><a onclick="jumpWindow('aboutSection')">ABOUT US</a></li> 
        <li class="navLi"><a onclick="jumpWindow('contactSection')">CONTACT</a></li>      
            <div class="userCredentialForm">
              <div>
                <button class="userIcon"  onClick="showIcon()"><i class="fas fa-sign-in-alt"></i></button>
              </div>
              <div class="userIconContent">
                
                <li class="userIconLi"><a href="login.php">Log In</a></li>
                <li class="userIconLi"><a href="registration.php">Sign Up</a></li>
                <li class="userIconLi"><a href="logout.php">Log Out</a></li>    
                
              </div>
            </div>
    
    </ul>
  </div>
</div>
    <script>
             function showIcon()
             {
                var content = document.querySelector(".userIconContent");
                 console.log("IN showIcon");     
                // content.style.display = "block"; 
                if(getComputedStyle(content).display == "none"){
                    content.style.display = "block";
                    console.log("IN showIcon if"); 
                  }   
                  else{
                    content.style.display = "none";
                    console.log("IN showIcon else"); 
                  }

                  // for(var i=0 ; i<content.length ; ++i){
                  //     var docStyle = getComputedStyle(content[i]);
                  //     if(content[i].style.display=="none"){
                  //       console.log("in showIcon");
                  //       content[i].style.display="block"
                  //     }
                  //     else{
                  //       content[i].style.display="none";
                  //     }
                  // }

             }
    </script>