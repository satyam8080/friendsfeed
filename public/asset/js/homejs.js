var change; 

$(document).ready(function() {
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
     
     
     /*now jquery function ends*/
   /*  
    $('#changenow').click(function(){
        $('#changenow > img').toggleAttrVal("src", "https://image.flaticon.com/icons/svg/148/148836.svg", "https://image.flaticon.com/icons/svg/1077/1077035.svg");
        
    })*/
        
        });
