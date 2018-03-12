
<div class="w3-content w3-section" id="slide" style="max-width:100%">
  <img class="mySlides w3-animate-fading" src="public/img/wtf.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="public/img/wtf1.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading" src="public/img/wtf3.jpg" style="width:100%">
</div>
 
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 9000);
}
</script>
