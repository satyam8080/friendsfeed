
var i;
function getImage(img){
    if(img.files.length!=0){
     var image_size = img.files[0].size;
    image_size=Math.ceil(image_size/1024);
    if(image_size>51200)
        {
            alert("image to big to submit\nplease make it under " + 50 + " MB");
            img.value ="";    
            return false;
        }
    else{
        return true;
    }
    }
    else{
        return true;
    }
}
function checkText(){
   var check =  $("#new_post").val();
    if(check==""){
        alert("Post is Required");
        return false;
    }
    else
        return true;
}

$("#form_post_id").submit(function(event){
    var img = document.getElementById("image_post");
   var check =  getImage(img);
    var check2 = checkText();
    if(check===true && check2===true){ 
        return true;
    }
    else{
        return false;
    }    
});


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

