 function escapeHtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}
function deleteChild(){
    var select = document.getElementById("search_ul");
     var child = select.lastElementChild;  
        while (child) { 
            select.removeChild(child); 
            child = select.lastElementChild;
}
}

$("#search").keyup(function(){
    deleteChild();
    var data = $(this).val();
    data = escapeHtml(data);
    console.log(data);
   
    $.ajax({
        type:"GET",
        cache:false,
        url:"http://localhost/friendsfeed/public",
        data:data,
        success:function(myData){
            
        }
        
    })
    
    
})