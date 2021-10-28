
  
         <?php include("includes/nav.php"); ?>
          <div class="topHeader">
           
            <div class="banner">
              
                

              <div class="heroSlide fade">

                <img src="images/hero/1.jpg" alt="" >
               
                
                <div class="heroContent">
                
                <h1 class="heroHeader welcomeOn">Welcome </h1>
               
                <h1 class="alterColor">TO THE CHEF<span class="xRotatable" style="color:#d4a331 ; font-size:100px ; text-shadow:3px 2px #770f01">X</span></h1>
                <p class="heroP">What is our Recipe is What You Desire</p>
                <button type=button onclick="jumpWindow('menuSection')" class="heroBtn btn"><p class="btnP btn">WHAT WE HAVE</p></button>
                    
                </div>  
             </div>

             <div class="heroSlide fade">
                <img src="images/hero/2.jpg" alt="" >
              
                <div class="heroContent">
        
                <h1 class="heroHeader">Welcome </h1>
                <h1 class="alterColor">TO THE CHEF<span class="yRotatable" style="color:#d4a331 ; font-size:100px ; text-shadow:2px 2px #770f01">X</span></h1>
                <p class="heroP">What is our Recipe is What You Desire</p>
                <button type=button onclick="jumpWindow('menuSection')" class="heroBtn btn"><p class="btnP btn">WHAT WE HAVE</p></button>

                </div>  
             </div>

             <div class="heroSlide fade">
                <img src="images/hero/3.jpg" alt="" >
              
                <div class="heroContent">
        
                <h1 class="heroHeader">Welcome </h1>
                <h1 class="alterColor">TO THE CHEF<span class="zRotatable" style="color:#d4a331 ; font-size:100px ; text-shadow:2px 2px #770f01">X</span></h1>
                <p class="heroP">What is our Recipe is What You Desire</p>
                <button type=button onclick="jumpWindow('menuSection')" class="heroBtn btn"><p class="btnP btn">WHAT WE HAVE</p></button>

                </div>  
             </div>

             <button onclick="changeHeroSlide(-1)" class="prevBtn btn" ><i class="fas fa-angle-left" aria-hidden="true"></i></button>
                <button onclick="changeHeroSlide(1)" class="nextBtn btn"><i class="fas fa-angle-right" aria-hidden="true"></i></button>
               

             <div class="dotContainer">
               <span class="dot" onclick = "currentSlide(1)"></span>
               <span class="dot" onclick = "currentSlide(2)"></span>
               <span class="dot" onclick = "currentSlide(3)"></span>
             </div>

            </div>  <!--banner-->      
          </div>   <!--topHeader-->
          <script>

// removing heroimage text animation after 1st load of page
   
/*  var heroAnimation;
 // 
  console.log("heroAnimation = "+ heroAnimation);
  var animationArray = document.getElementsByClassName("welcomeOn");
      
  oneTimeHeroAmination();
  
  function oneTimeHeroAmination(){
    if(heroAnimation == undefined){
      animationArray[0].className.replace(" welcomeOn" , "");
      heroAnimation = false;
      console.log("into Undefined = "+ heroAnimation);
    }
    else if(heroAnimation == true){
         console.log("into true = "+ heroAnimation);
        }
} */
          
var slideIndex = 0;
changeHeroSlide(slideIndex);


function currentSlide(slideNumber){  // calls showSlide() to show current slide 
  slideIndex = slideNumber-1;
  showSlide(slideIndex);
  
  
}


function stopDisplay(content){    // stop displaying slides
  var i;
  for(i=0 ; i < content.length ; ++i){
    content[i].style.display="none";
  }
}   

function changeHeroSlide(offset){   // calculate slideIndex
//  console.log(offset  + " First offset");
     slideIndex += offset;
//     console.log(slideIndex  + " First call");
     showSlide(slideIndex);  
     //oneTimeHeroAmination();
}    

function resetAllDot(dotNode){  // reset a dot to it's initial color
    for(var k=0 ; k < dotNode.length ; ++k){
    dotNode[k].className = dotNode[k].className.replace(" activeDot","");
  }
}

 function showSlide(slideToShow){   // after calculating slidIndex , it shows
 // console.log(slideToShow  + " First slideToShow");                                  // Slide by taking slideIndex as argument
  var heroSlide = document.querySelectorAll(".heroSlide");
  var activeDot = document.querySelectorAll(".dot");
  stopDisplay(heroSlide);  
  resetAllDot(activeDot);
 // console.log(heroSlide.length + "total slide array length");
 // console.log(slideToShow+ " slideToShow before all if-else");  //test 
  if(slideToShow >= heroSlide.length){
      slideIndex = 0;
      slideToShow = slideIndex;
     // console.log(slideToShow + "now si Inside If");  //test
      // heroSlide[slideIndex].style.display = "block";
  }
  else if(slideToShow < 0){
    slideIndex = heroSlide.length-1;
    slideToShow = slideIndex;
   // console.log(slideToShow + "now si Inside else If");  //test 
    //  heroSlide[slideIndex].style.display = "block";
  }
  else{
 // console.log(slideToShow + "now si Inside else");  //test
//  heroSlide[slideIndex].style.display = "block";

  }
// console.log(heroSlide[slideToShow].style.display + " 1 before");

  heroSlide[slideToShow].style.display = "block";
// console.log(activeDot[slideToShow].style.display + " before");

  activeDot[slideToShow].className += " activeDot";
// console.log(activeDot[slideToShow].style.display + " after");
 //setTimeout(showSlide, 2000);  //calls a function once after specific time // mostly but not mandatory used for recursive call
  // 
 }
 
  ////// changles slide automatically  

 function autoSlide()
 {
  changeHeroSlide(1)
 }

 setInterval(autoSlide,5000);  // calls one function repeatedly


          </script>
