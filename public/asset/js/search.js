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

/*$("#search").keyup(function(){
    deleteChild();
    var data = $(this).val();
    if(data==""){
        deleteChild();
    }
    data = escapeHtml(data);
    console.log(data);
   
    $.ajax({
        headers: { 'csrftoken' : '{{ csrf_token() }}' },
        type:"GET",
        cache:false,
        url:"http://localhost/friendsfeed/public/search",
<<<<<<< HEAD
        data:data,
        success:function(myData){
          console.log(myData);
            
        }
        
    })*/




    
//$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

//})

$(document).ready(function(){
  search();
  function search(query = '')
  {
     $.ajax({
          //url:" {{ route('search')}} ",
          url: "http://localhost/friendsfeed/public/qq",
          method:'GET',
          data:{query:query},
          dataType:'json',
          success:function(data)
          {
            console.log(data);
          }
        })
  }

  $(document).on('keyup','#search',function(){
    deleteChild();
    var query = 'r'; //$(this).val();
    search(query);
  });
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
});

        data:{'search':data},
        success:function(myData){
          /*  var par = new DOMParser();
            var doc = par.parseFromString(myData,'text/html');
            alert(doc.body)*/
           /* $("#search_ul").html(doc.body);*/
            deleteChild();
            $("#search_ul").append(myData);
           $(".given").attr("alt"," ");
            $(".given").attr("src","https://vignette.wikia.nocookie.net/the-sun-vanished/images/5/5d/Twitter-avi-gender-balanced-figure.png/revision/latest?cb=20180713020754");
            $("li").css({"cursor":"pointer"});
            $("li").click(function(){
                alert("hello");
                var a = $(this).val();
                alert(a);
                document.getElementById("search").value = a;
            })
        }
        
    })
    $.ajaxSetup({headers:{'csrftoken':'{{csrf_token()}}'}});
    
    
})

