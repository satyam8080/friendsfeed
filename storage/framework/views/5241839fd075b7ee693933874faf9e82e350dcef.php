	<?php echo $__env->make('templates/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<?php if(Auth::user() != NULL): ?>
	<script> 
		window.location = " <?php echo e(URL('home')); ?> "; 
	</script>
	<?php endif; ?>


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
	<p><b> Please enter your details  </b> </p>
	<form method="POST" action=" <?php echo e(URL('login')); ?> "> 
		<?php echo e(csrf_field()); ?>


						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="far fa-envelope"></i></span>
							</div>
							<input type="text" name="email" class="form-control input_user" value="" placeholder="Email" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Password" required>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" class="btn login_btn" >Login</button>
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

	<form method="POST" action=" <?php echo e(URL('register')); ?> " autocomplete="off">
		<?php echo e(csrf_field()); ?>

		
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control " placeholder="Full name" type="text" required>
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" id="email" required>
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" type="password" id="pass" required>
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control " placeholder="Repeat password" type="password" required>
    </div>     
        
        <!--for DOB-->
         <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
		</div>
        <input class="form-control" placeholder="dd/mm/yyyy" type="date" id="date" >
    </div>  
        <!--for gender-->
         <div class="form-group input-group">
             <div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
		</div>
             <span class="radio_btn"><input type="radio" name="gender" value="male" required>Male</span>
             <span class="radio_btn"><input type="radio" name="gender" value="female" required>Female</span>
             <span class="radio_btn"><input type="radio" name="gender" value="other" required>Other</span>
             
        </div> 
        
        
        <!--gender end-->
    <div class="form-group">
        <button type="submit" class="btn login_btn signupButton" > Sign up</button>
    </div>                                                
</form>

	<div style="padding-top: 0rem;">
      				 <p style="display: inline;"><b>Already have an account?</b></p>
      				 <a style="cursor: pointer;color: blue; display: inline;" onclick="loginbox()">Login in</a>
      				 </div> 

	</div>




	</div>
<script type="text/javascript" src=" <?php echo e(asset('asset/js/loginjs.js')); ?> "></script>


<?php echo $__env->make('templates.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH D:\Projects\xampp\htdocs\friendsfeed\resources\views/index.blade.php ENDPATH**/ ?>