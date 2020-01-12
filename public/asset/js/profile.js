var changeSlide;
$(document).ready(function(){
      document.getElementById("5").classList.add("active");
 changeSlide = function(todo){
     for(var i =1;i<4;i++){
         document.getElementById("slide"+i.toString()).classList.remove("active_slide")
     }
     document.getElementById(todo).classList.add("active_slide");
}
    
});