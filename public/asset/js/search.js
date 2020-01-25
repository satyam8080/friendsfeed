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
    data = escapeHtml(data);
    console.log(data);
   
    $.ajax({
        headers: { 'csrftoken' : '{{ csrf_token() }}' },
        type:"GET",
        cache:false,
        url:"http://localhost/friendsfeed/public/search",
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