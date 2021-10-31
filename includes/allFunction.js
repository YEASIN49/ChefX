///////////// NAV /////////////

function jumpWindow(moveTo){
  document.getElementById(moveTo).scrollIntoView({
    behavior : "smooth"
  });
}

// /////////// BurgerIcon Animation //////////////
const hamburger = document.querySelector(".burgerpng");
const navMenu = document.querySelector(".hideable-nav");
const x = window.getComputedStyle(navMenu);
hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("hamburger-btn-close");
  navMenu.classList.toggle("toggle-hidable-nav");
  // navMenu.style.display="block";
});


//////////// Shrinking Nav Bar  ///////////
window.onscroll = function() {scrollFunction()};
  
function scrollFunction(){
  var slider = document.getElementsByClassName("imageAdjuster");
  var truck = document.querySelector(".truckHolder");
  var hoverElement = document.getElementsByClassName("imageLayer");
 // var hoverLayer = document.getElementsByClassName("layerText");
 if(document.body.scrollTop < 1350 || document.documentElement.scrollTop < 1350){
    for(var i=0;i<slider.length;++i){
      // slider[i].style.transform = "translate(-405%,-230%)";
      slider[i].style.transform = "translateX(-76vw)";
      // hoverElement[i].style.transform = "translate(-428%,-112%)"; 
      hoverElement[i].style.transform = "translateX(-76vw)"; 
    //  hoverLayer[i].style.transform = "translate(0%,0%)";
      console.log("Entered scrollTop");
      } 
     truck.style.transform = "translateX(-58vw)";
    
  }
 if((document.body.scrollTop > 1350 && document.body.scrollTop < 1750 )|| (document.documentElement.scrollTop > 1350 && document.documentElement.scrollTop < 1750)){
   for(var i=0;i<slider.length;++i){
    // slider[i].style.transform = "translate(10vw,-230%)";
    slider[i].style.transform = "translateX(0%)";
    hoverElement[i].style.transform = "translateX(0%)"; 
   // hoverLayer[i].style.transform = "translate(0%,0%)";    
    console.log("Entered Scroll Area ");
    } 
   truck.style.transform = "translateX(22%)";
  }  
  // if(document.body.scrollTop > 1750 || document.documentElement.scrollTop > 1750){
  //   for(var i=0;i<slider.length;++i){
  //     // slider[i].style.transform = "translate(455%,-230%)"
  //     slider[i].style.transform = "translateX(455%)"
  //     hoverElement[i].style.transform = "translate(440%,-112%)"; 
  //    // hoverLayer[i].style.display = "none";
  //       console.log("Entered scrollTop");
  //     } 
  //     truck.style.transform = "translateX(115%)";
  //  }     
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("brandLogo").style.width = "85px";
    document.getElementById("navUl").style.padding = "0 70px 0 10px";
    document.getElementById("navLogo").style.marginBottom = "0px";
  
  } 
  else {
    document.getElementById("brandLogo").style.width = "125px";
    document.getElementById("navUl").style.padding = "15px 70px 15px 10px";
    document.getElementById("navLogo").style.marginBottom = "3px";
    
  }

}


 //////////  Menu Tab   ///////////    
      
function openTab(menuName , activeBtn ){ 
               
  var i=0 ;
  var tabContent=document.querySelectorAll(".item"); // NOTE : class name is written with dot
  // or use getElementsByClassName("item");
    stopDisplay(tabContent);
    
    var tabs = document.getElementsByClassName("active");
    var animatedBtn = document.querySelectorAll("#animatedTabBtn");
    var animateNow = activeBtn.getElementsByTagName("span"); 
    
    for(i = 0 ; i < tabs.length ; ++i){
        tabs[i].style.color="white";
        tabs[i].style.background="#c1a35f";
        
    }   
    for( i=0 ; i < animatedBtn.length ; ++i){
         animatedBtn[i].style.height = "0";
         console.log(animatedBtn[i] + "this is loop test");
    }
    
    console.log(animateNow + "this is the test");
    activeBtn.className += " active";
    activeBtn.style.color="#c1a35f";
   // activeBtn.style.background="white";
    animateNow.animatedTabBtn.style.height = "100%";
    console.log(activeBtn + "this is the test");
    
    var displayingClass=document.getElementById(menuName);
    displayingClass.style.display="block" ;
    

        
}


var defaultOpenBtn = document.getElementsByClassName("active");
defaultOpenBtn[0].click(); 


/*///////// Common Function for restricting elements 
        inside div to be displayed  ////////////*/

function stopDisplay(content){
  for(i=0 ; i < content.length ; ++i){
    content[i].style.display="none";
  }
}      
        


    

/////// Hero Slider   //////////



////// Google Map //////////




            
     

        