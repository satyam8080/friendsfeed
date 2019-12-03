 $(document).ready(function() {
            $("li.nav-item").click(function (e) {
                e.preventDefault();
                $(".nav-item").removeClass("active");
                $(this).addClass("active");  
            });
           
     $('#nl').textContent = "";
     
     
     
        });