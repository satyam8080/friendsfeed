	<?php echo $__env->make('templates/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link href=" <?php echo e(URL::asset('asset/css/logincss.css')); ?> " type="text/css" rel="stylesheet">

	<div class="body"><!--body-->
	<div class="main_div"><!--shadow bar  #green color-->

	</div>
	<div class="login_signup_div"><!--login div-->
		<div class="button_div">
       <button id="login" class="button" onclick="loginbox()">LOGIN</button>
       <button id="signup" class="button" onclick="signupbox()">SIGN UP</button>
   </div>
<div class="login_div">
	<p><b> Please enter your details </b> </p>
	<!-- <form>
		<input type="email" name="email" class="login_field" placeholder="email"   required>
		<input type="password" name="password" class="login_field" placeholder="password" required>
		<input type="submit" name="submit" id="submit">

	</form> -->

	<form>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="far fa-envelope"></i></span>
							</div>
							<input type="text" name="" class="form-control input_user" value="" placeholder="Email">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="" class="form-control input_pass" value="" placeholder="Password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="button" name="button" class="btn login_btn" onclick="home()">Login</button>
				   </div>
					</form>
					   <div style="padding-top: 1rem;">
      				 <p style="display: inline;"><b>Don't have a account ?</b></p>
      				 <a style="cursor: pointer;color: blue; display: inline;" onclick="signupbox()">Click Here</a>
      				 </div> 


</div>


<div class="signup_div">
		<!-- code from bootsnip -->
			<p><b> Please enter your details to resister </b> </p>
	<form>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="" class="form-control " placeholder="Full name" type="text">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="" class="form-control " placeholder="Email address" type="email">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control " placeholder="Create password" type="password">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control " placeholder="Repeat password" type="password">
    </div>                                       
    <div class="form-group">
        <button type="submit" class="btn login_btn signupButton" onclick="home()"> Sign in</button>
    </div>                                                
</form>

	<div style="padding-top: 1rem;">
      				 <p style="display: inline;"><b>Already have an account?</b></p>
      				 <a style="cursor: pointer;color: blue; display: inline;" onclick="loginbox()">Login in</a>
      				 </div> 

	</div>




	</div>
<script type="text/javascript" src=" <?php echo e(asset('asset/js/loginjs.js')); ?> "></script>


<?php echo $__env->make('templates.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH D:\Projects\xampp\htdocs\friendsfeed\resources\views/index.blade.php ENDPATH**/ ?>