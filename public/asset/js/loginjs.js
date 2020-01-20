var login = $('#login');
var signup = $('#signup');
var login_div = $('.login_div');
var signup_div = $('.signup_div');
$(document).ready(function(){
var today = new Date();
var year= today.getFullYear();
year = year -10;
    
    
$('input[id="date"]').daterangepicker({
    opens:'top',
     singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: year
                  });
    document.getElementById("email").value =  "";
    document.getElementById("pass").value = "";
})
var deactive = {
	'border-bottom' : 'none'
}
	var active = {
     'border-bottom': '#71e35f solid 2px'
	}

function loginbox(){
	signup.css(deactive);
	login.css(active);
	signup_div.css({'display' : 'none'});
	login_div.css({'display':'block'});

}
function signupbox(){
	login.css(deactive);
	signup.css(active);
	login_div.css({'display':'none'});
	signup_div.css({'display': 'block'});
}
function home() {
	open('home','_self');
}
