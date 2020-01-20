var changeSlide;
var change;

  /*code function to toogle attributes value by jquery not created my me , so dont touch*/
   $.fn.toggleAttrVal = function(attr, val1, val2) {
    var test = $(this).attr(attr);
    if ( test === val1) {
      $(this).attr(attr, val2);
      return this;
    }
    if ( test === val2) {
      $(this).attr(attr, val1);
      return this;
    }
    // default to val1 if neither
    $(this).attr(attr, val1);
    return this;
  };
     change =  function(todo){
         var n ="#"+ todo+" > img"
          $(n).toggleAttrVal("src", "https://image.flaticon.com/icons/svg/148/148836.svg", "https://image.flaticon.com/icons/svg/1077/1077035.svg");
     }
     $("#profile_edit_btn").click(function(){
         $( "#profile_edit_btn +  div").toggleClass("display");
     });
     
     
     // Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
 
  modal.style.display = "none";
}
    
/*modal code end*/
$(document).ready(function(){
   var remove = function(){
    $("#about_div").addClass("display")
    $("#post_div").addClass("display")
     $("#tags_div").addClass("display")
}
    
      document.getElementById("5").classList.add("active");
 changeSlide = function(todo){
     for(var i =1;i<4;i++){
         document.getElementById("slide"+i.toString()).classList.remove("active_slide")
     }
     document.getElementById(todo).classList.add("active_slide");
      remove();
     if(todo == "slide1"){$("#about_div").removeClass("display")}
     else if(todo == "slide2"){$("#post_div").removeClass("display")}
     else{
         $("#tags_div").removeClass("display");     }
     
}
});