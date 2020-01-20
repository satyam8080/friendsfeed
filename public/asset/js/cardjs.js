var changedot;
var change;
 changedot = function(todo2){
      $( "#"+todo2 + "~ #dot_div").toggleClass("display");
   } 
 
  change =  function(todo){
         var n ="#"+ todo+" > img"
          $(n).toggleAttrVal("src", "https://image.flaticon.com/icons/svg/148/148836.svg", "https://image.flaticon.com/icons/svg/1077/1077035.svg");
     }