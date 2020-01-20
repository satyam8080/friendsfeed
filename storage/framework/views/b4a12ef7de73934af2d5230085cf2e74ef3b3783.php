	<?php echo $__env->make('templates/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	


<link href=" <?php echo e(URL::asset('asset/css/logincss.css')); ?> " type="text/css" rel="stylesheet">
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
        <h3 align="center">Please Create Username</h3>
       
        
        <form action="" method="post">
        <input type="text" class="userfield"placeholder="E.g JhonDoeKing" required>
            <b><p class="alert_red">*Not Available*</p></b>
            <button type="submit" class="submit_button">Continue</button>
        
        
        </form>
		



	</div>



<?php echo $__env->make('templates.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH D:\Projects\xampp\htdocs\friendsfeed\resources\views/pages/username.blade.php ENDPATH**/ ?>