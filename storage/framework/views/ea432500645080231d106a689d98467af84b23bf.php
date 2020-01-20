<?php echo $__env->make('templates.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php echo $__env->make('templates.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript" src="<?php echo e(asset('asset/js/profile.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('asset/css/profile.css')); ?>">
<div style="heigt:3rem;width:100%;margin:auto; text-align:center;">Don't peek here !</div>
<div class="center_div">
    <div class="profile_div">
 
    <img src="<?php echo e(asset('asset/images/profile.jpg')); ?>" class="profile_pic"> 
    </div>
      

    <span style="display:inline; text-align:center; font-size:2rem;"><b> <?php echo e(Auth::user()->name); ?> </b></span><button class="edit_btn"><img alt="edit" src="<?php echo e(asset('asset/images/pencil.png')); ?>" width="20px" height="20px"></button>
    
    <div style="width:100%; background-color:white;">
    <button class="profile_slide_btn active_slide" id="slide1" onclick="changeSlide(this.id);">About</button>
        <button class="profile_slide_btn" id="slide2" onclick="changeSlide(this.id);">Posts</button>
        <button class="profile_slide_btn" id="slide3" onclick="changeSlide(this.id);">Tags</button>
    </div>
 
</div>

<?php echo $__env->make(' templates.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php /**PATH D:\Projects\xampp\htdocs\friendsfeed\resources\views/pages/profile.blade.php ENDPATH**/ ?>