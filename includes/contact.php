<div class="contactContainer" id="contactSection">
    
<div class="menuHeader" style="margin-top:50px">
            <h1><span>Wanna Contact ?</span><br> Find Us Below <br><i class="fas fa-wine-glass-alt"></i><span class="underline"></span></h1>
        </div>

    <div class="contactContent">
       <div class="socialIcon">
         <ul>
            <li class="twitter"><a href=""></a><i class="fab fa-twitter"><p>twitter</p></i></li>
            <li class="facebook"><a href=""></a><i class="fab fa-facebook-square"><p>facebook</p></i></li>
            <li class="youtube"><a href=""></a><i class="fab fa-youtube"><p>YouTube</p></i></li>
            <li class="instagram"><a href=""></a><img src="images/logo/instagram.png" alt=""></li>
         </ul>
       </div>
    
         <div id="googleMap" style="width:45vw;height:25vw;background:red;margin-bottom:30px;"></div>
    </div>
</div>


<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(23.762133,90.415655),
  zoom:10,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDoINsGm1gfFnWtlB0Y58-qFXB9hpM7HU&callback=myMap"></script>
