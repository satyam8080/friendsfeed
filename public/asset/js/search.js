 function escapeHtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}
function search_set(){
    alert("hello");
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
    if(data==""){
        deleteChild();
    }
    data = escapeHtml(data);
    console.log(data);
   
    $.ajax({
        type:"GET",
        cache:false,
        url:"http://localhost/friendsfeed/public/search",
        data:{'search':data},
        success:function(myData){
          /*  var par = new DOMParser();
            var doc = par.parseFromString(myData,'text/html');
            alert(doc.body)*/
           /* $("#search_ul").html(doc.body);*/
            deleteChild();
            $(".search_div").css({'display':'block'});
            $("#search_ul").html(myData);
           $(".given").attr("alt"," ");
            $(".given").attr("src","https://vignette.wikia.nocookie.net/the-sun-vanished/images/5/5d/Twitter-avi-gender-balanced-figure.png/revision/latest?cb=20180713020754");
            $("li").css({"cursor":"pointer"});
            $("#search_ul > li").click(function(){
                var a = $(this).attr("data-value");
                $(".search_div").css({'display':'none'})
                document.getElementById("search").value = a;
            })
        }
        
    })
    $.ajaxSetup({headers:{'csrftoken':'{{csrf_token()}}'}});
    
    
})

