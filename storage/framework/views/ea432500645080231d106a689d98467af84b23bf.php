<?php echo $__env->make('templates.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php echo $__env->make('templates.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<link rel="stylesheet" href="<?php echo e(asset('asset/css/profile.css')); ?>">
   <script type="text/javascript" src="<?php echo e(asset('asset/js/cardjs.js')); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/cardcss.css')); ?>">
<script type="text/javascript" src="<?php echo e(asset('asset/js/profile.js')); ?>">
</script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<div style="heigt:3rem;width:100%;margin:auto; text-align:center;">Don't peek here !</div>
<div class="center_div">
    <div class="profile_div">
    <img src="<?php echo e(asset('asset/images/profile.jpg')); ?>" class="profile_pic" id="myImg" alt="Your Profile"> 
    </div>
    <!-- The Modal -->
<div id="myModal" class="modal">
     <span class="close" id="close">&times;</span>
    <div class=" dot_3_modal">
     <button style=" background:none; border:none; color:#a1a1a1" id="profile_edit_btn"><i class="fas fa-ellipsis-v"></i></button>
    <div class="profile_edit_div display">
        <button>Edit</button>
        <button>Remove</button>
        </div>
    </div>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
      

    <span style="display:inline; text-align:center; font-size:2rem;"><b> <?php echo e(Auth::user()->name); ?> </b></span><button class="edit_btn"><img alt="edit" src="<?php echo e(asset('asset/images/pencil.png')); ?>" width="20px" height="20px"></button>
    
    <div style="width:100%; background-color:white;">
    <button class="profile_slide_btn" id="slide1" onclick="changeSlide(this.id);">About</button>
        <button class="profile_slide_btn active_slide" id="slide2" onclick="changeSlide(this.id);">Posts</button>
        <button class="profile_slide_btn" id="slide3" onclick="changeSlide(this.id);">Tags</button>
    </div>
    <div class="about_div display" id="about_div">
        
    
    
    </div>
    <!--about div end-->
    <!--posts div start-->
    <div class="posts_div" id="post_div"> 
      <!-- -------------------------------------------------------------------------------------------------------------------- -->

      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="card" style="width: 37rem;  margin:auto; margin-top : 2rem;">
    <div class="card-header" style="padding-bottom:0rem !important;">

        <img src="<?php echo e(asset('asset/images/raj.jpg')); ?>" alt="" class="float-left rounded-circle" style="height: 32px; width: 32px;">

  
        <div style="height:100%; float:left; padding-left:1rem;">
  
    <h5 class="card-title" style=" line-height:1rem !important;"> <?php echo e(Auth::user()->name); ?> </h5>
            <p style="line-height:.1rem;"><a style="text-decoration:none; display:inline;font-size:.8rem; color:#06216a; cursor:pointer;" href=""><?php echo e('@'.Auth::user()->username); ?></a></p>
        </div>
        
        <div style="float:right;">
    <button style="background:none;border:none;" id="dot_btn-<?php echo e($post->post_id); ?>" onclick="changedot(this.id); return false;"><!--generate id at runn time-->
         <i class="fas fa-ellipsis-v" style="color:#afafaf;"></i>
        </button>
            <div class="dot_div display" id="dot_div">
            <button onclick="javascript:alert('reported')"><i class="far fa-flag"></i> Report</button>
                <button><i class="fas fa-share"></i> Share</button>
                <button><i class="fa fa-trash"></i> Delete</button>
            </div>
        </div>
        
    </div>
  <img src="/friendsfeed/public/storage/users/images/<?php echo e($post->post_image); ?>" class="card-img-top"  alt="">
  <div class="card-body">
       <h5 class="card-title"></h5>
    <p class="card-text"><b> <?php echo e(Auth::user()->username); ?>: </b> <?php echo e($post->post); ?> <!-- You can paste any post that you want to display here but it would be good to describe about yourself . Here div caed size would increase on increasing the post size --></p>

    
  </div>
    <div class="card-footer"  style="height : 3rem !important;padding-top:0.1rem !important;">
            <a href="javascript:void(0)" id="changenow-<?php echo e($post->post_id); ?>" onclick="change(this.id);return false;" class="btn icon_style"><img  src="<?php echo e(asset('asset/images/heart.png')); ?>" style="height : 1.5rem;width:1.5rem;" > <span style="color:#999;"> <?php echo e($post->likes_count); ?> </span></a>
       
          <a href="javascript:void(0)" class="btn" ><img src="<?php echo e(asset('asset/images/comment2.png')); ?>" style="height : 1.5rem;width:1.5rem;">
        <span style="color:#999;"> <?php echo e($post->comments_count); ?> </span>
        </a>
    
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <!-- -------------------------------------------------------------------------------------------------------------------- -->
    
    </div>
    <!--post div end-->
    <!--code for taggged pics-->
    <div class="tags_div display" id="tags_div">
    
    </div>
 
</div>
<script type="text/javascript" src="<?php echo e(asset('asset/js/profile.js')); ?>">
</script>

<?php echo $__env->make(' templates.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php /**PATH D:\Projects\xampp\htdocs\friendsfeed\resources\views/pages/profile.blade.php ENDPATH**/ ?>