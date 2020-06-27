	@include('templates/header')
	


<link href=" {{ URL::asset('asset/css/logincss.css') }} " type="text/css" rel="stylesheet">
<style>
    .userfield{
        width: 70%;
        margin-top: 4rem;
        height: 2rem;
    }
    .alert_red{
        color: red;
        font-size: .9rem;
        display: none;
    }
    .submit_button{
        display: block;
        margin: auto;
        width: 9rem;
        height: 2rem;
        margin-top: 3rem;
        padding: auto;
        background: none;
        border: none;
        border-bottom: solid 2px #71E35F;
        box-shadow: 3px 3px 3px 3px #ccfac4;
        color: #8a8a8a;
    }
    .submit_button:hover{
        background-color: #ccfac4;
    }
</style>

	<div class="body"><!--body-->
	<div class="main_div"><!--shadow bar  #green color-->

	</div>
	<div class="login_signup_div">
        <h3 align="center">E-mail Address</h3>
       
             <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
        <input type="text" class="userfield" name="email" required> 
        <pre>

<button type="submit" class="btn btn-primary">Send Password Reset Link</button>
</pre>
        </form>
	</div>

@include('templates.footer')

