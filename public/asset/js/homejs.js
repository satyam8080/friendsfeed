var change;
var i;
$(document).ready(function(){
     $("#new_post").emojioneArea({
         pickerPosition : "bottom",
         tonesStyle : "checkbox",
         /*autocomplete : false*/
     });
    document.getElementById("1").classList.add("active");
    
    /*  var hash;

    for(i=1;i<6;i++)
        {
            hash = "#"+i.toString();
            
         $(hash).removeClass("active");
        }
    */
    
    
    
          
     var count  = 1;
            $("li.nav-item").click(function (e) {
                e.preventDefault();
                $(".nav-item").removeClass("active");
                $(this).addClass("active");  
            });
     
          $('#arrow_link').click(function(){
              if(count%2!=0)
              $('.temp').css({'display':'block'});
              else
                $('.temp').css({'display':'none'});
              
              count++;
          });
     /*code function to toogle attributes value bu jquery not created my me , so dont touch*/
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
     
     /*activate this code if logout wnat to be clicked activating*/
   /*  dropbtn = function(){
         var drop = document.getElementById("dropdown_content");
         if(drop.style.display == "none")
         drop.style.display = "block"
         else
            drop.style.display = "none"
     }
     */  
});