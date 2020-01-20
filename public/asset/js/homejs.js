
var i;

$(document).ready(function(){
     $("#new_post").emojioneArea({
         pickerPosition : "bottom",
         tonesStyle : "checkbox",
         
     });
    document.getElementById("1").classList.add("active");
    
            $("li.nav-item").click(function (e) {
                e.preventDefault();
                $(".nav-item").removeClass("active");
                $(this).addClass("active");  
            });
     
        
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

   
    
});

