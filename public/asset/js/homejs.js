 $(document).ready(function() {
            $("li.nav-item").click(function (e) {
                e.preventDefault();
                $(".nav-item").removeClass("active");
                $(this).addClass("active");  
            });
            $(".arrow_link").click(function(){
                alert("hello")
            })
        });
