<?php echo e($lastSpace = strpos(Auth::user()->name ," ")); ?>


<?php if($lastSpace == FALSE): ?>
<?php echo e($userName = Auth::user()->name); ?>

<?php else: ?>
<?php echo e($userName = substr(Auth::user()->name ,0,$lastSpace)); ?>

<?php endif; ?>
 

 <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/homecss.css')); ?> ">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/navcss.css')); ?> ">

    <nav class="navbar navbar-expand navbar-light bg-white fixed-top">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item" id="1">
                        <a href="<?php echo e(URL('home')); ?>" class="nav-link">
                            <svg viewBox="0 0 24 24">
                                <g>
                                    <path d="M22.46 7.57L12.357 2.115c-.223-.12-.49-.12-.713 0L1.543 7.57c-.364.197-.5.652-.303 1.017.135.25.394.393.66.393.12 0 .243-.03.356-.09l.815-.44L4.7 19.963c.214 1.215 1.308 2.062 2.658 2.062h9.282c1.352 0 2.445-.848 2.663-2.087l1.626-11.49.818.442c.364.193.82.06 1.017-.304.196-.363.06-.818-.304-1.016zm-4.638 12.133c-.107.606-.703.822-1.18.822H7.36c-.48 0-1.075-.216-1.178-.798L4.48 7.69 12 3.628l7.522 4.06-1.7 12.015z"></path>
                                    <path d="M8.22 12.184c0 2.084 1.695 3.78 3.78 3.78s3.78-1.696 3.78-3.78-1.695-3.78-3.78-3.78-3.78 1.696-3.78 3.78zm6.06 0c0 1.258-1.022 2.28-2.28 2.28s-2.28-1.022-2.28-2.28 1.022-2.28 2.28-2.28 2.28 1.022 2.28 2.28z"></path>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item" id="2">
                        <a href="" class="nav-link">
                            <svg viewBox="0 0 24 24">
                                <g>
                                    <path
                                        d="M21 7.337h-3.93l.372-4.272c.036-.412-.27-.775-.682-.812-.417-.03-.776.27-.812.683l-.383 4.4h-6.32l.37-4.27c.037-.413-.27-.776-.68-.813-.42-.03-.777.27-.813.683l-.382 4.4H3.782c-.414 0-.75.337-.75.75s.336.75.75.75H7.61l-.55 6.327H3c-.414 0-.75.336-.75.75s.336.75.75.75h3.93l-.372 4.272c-.036.412.27.775.682.812l.066.003c.385 0 .712-.295.746-.686l.383-4.4h6.32l-.37 4.27c-.036.413.27.776.682.813l.066.003c.385 0 .712-.295.746-.686l.382-4.4h3.957c.413 0 .75-.337.75-.75s-.337-.75-.75-.75H16.39l.55-6.327H21c.414 0 .75-.336.75-.75s-.336-.75-.75-.75zm-6.115 7.826h-6.32l.55-6.326h6.32l-.55 6.326z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item" id="3">
                        <a href="" class="nav-link">
                            <svg viewBox="0 0 24 24">
                                <g>
                                    <path
                                        d="M21.697 16.468c-.02-.016-2.14-1.64-2.103-6.03.02-2.532-.812-4.782-2.347-6.335C15.872 2.71 14.01 1.94 12.005 1.93h-.013c-2.004.01-3.866.78-5.242 2.174-1.534 1.553-2.368 3.802-2.346 6.334.037 4.33-2.02 5.967-2.102 6.03-.26.193-.366.53-.265.838.102.308.39.515.712.515h4.92c.102 2.31 1.997 4.16 4.33 4.16s4.226-1.85 4.327-4.16h4.922c.322 0 .61-.206.71-.514.103-.307-.003-.645-.263-.838zM12 20.478c-1.505 0-2.73-1.177-2.828-2.658h5.656c-.1 1.48-1.323 2.66-2.828 2.66zM4.38 16.32c.74-1.132 1.548-3.028 1.524-5.896-.018-2.16.644-3.982 1.913-5.267C8.91 4.05 10.397 3.437 12 3.43c1.603.008 3.087.62 4.18 1.728 1.27 1.285 1.933 3.106 1.915 5.267-.024 2.868.785 4.765 1.525 5.896H4.38z">
                                    </path>
                                </g>
                                <sub class="value_icon" >88</sub>
                            </svg>
                        </a>
                        
                    </li>
                    <li class="nav-item" id="4">
                        <a href="" class="nav-link">
                            <svg viewBox="0 0 24 24">
                                <g>
                                    <path
                                        d="M19.25 3.018H4.75C3.233 3.018 2 4.252 2 5.77v12.495c0 1.518 1.233 2.753 2.75 2.753h14.5c1.517 0 2.75-1.235 2.75-2.753V5.77c0-1.518-1.233-2.752-2.75-2.752zm-14.5 1.5h14.5c.69 0 1.25.56 1.25 1.25v.714l-8.05 5.367c-.273.18-.626.182-.9-.002L3.5 6.482v-.714c0-.69.56-1.25 1.25-1.25zm14.5 14.998H4.75c-.69 0-1.25-.56-1.25-1.25V8.24l7.24 4.83c.383.256.822.384 1.26.384.44 0 .877-.128 1.26-.383l7.24-4.83v10.022c0 .69-.56 1.25-1.25 1.25z">
                                    </path>
                                </g>
                                <sub class="value_icon" >55</sub>
                            </svg>
                        </a>
                    </li>
                </ul>
                <form action=" <?php echo e(URL('searchadv')); ?> " method="GET" class="form-inline w-100 d-none d-md-block ml-2" autocomplete="off">
                    <div>
                    <input type="text" id="search" name="search" class="form-control form-control-sm rounded-pill search border-0 px-3 w-100" placeholder="Search on friendsfeed" autocomplete="off" >

                        <div class="search_div  px-3">
                            <ul class="serch_list" id="search_ul">
                           <!-- <li><img src="https://vignette.wikia.nocookie.net/the-sun-vanished/images/5/5d/Twitter-avi-gender-balanced-figure.png/revision/latest?cb=20180713020754" alt="" class="img-fluid rounded-circle" style="height: 26px; width: 26px; margin-right:1rem;"> hello</li>
                                 <li><img src="https://vignette.wikia.nocookie.net/the-sun-vanished/images/5/5d/Twitter-avi-gender-balanced-figure.png/revision/latest?cb=20180713020754" alt="" class="img-fluid rounded-circle" style="height: 26px; width: 26px; margin-right:1rem;"> hello</li>
                                 <li><img src="https://vignette.wikia.nocookie.net/the-sun-vanished/images/5/5d/Twitter-avi-gender-balanced-figure.png/revision/latest?cb=20180713020754" alt="" class="img-fluid rounded-circle" style="height: 26px; width: 26px; margin-right:1rem;"> hello</li>
                                 <li><img src="https://vignette.wikia.nocookie.net/the-sun-vanished/images/5/5d/Twitter-avi-gender-balanced-figure.png/revision/latest?cb=20180713020754" alt="" class="img-fluid rounded-circle" style="height: 26px; width: 26px; margin-right:1rem;"> hello</li>-->
                            
                            </ul>
                        
                        </div>
                        <!--serach div end-->
                    </div>
                </form>
                <ul class="navbar-nav d-none d-md-block">
                    <li class="nav-item" id="5">
                        <a  onclick="window.location.href ='<?php echo e(URL('profile')); ?> ';" class="nav-link" style="cursor:pointer;" > <img src="https://vignette.wikia.nocookie.net/the-sun-vanished/images/5/5d/Twitter-avi-gender-balanced-figure.png/revision/latest?cb=20180713020754" alt="" class="img-fluid rounded-circle" style="height: 32px; width: 32px; "><b style="display:inline; position:absolute; margin-left:.5rem;">  <?php echo e($userName); ?> </b>
                        </a>
                    </li>
                </ul>
              <!--for log out-->
     <div class="dropdown" style="left:4rem !important;">
  <button class="dropbtn"> <img src="<?php echo e(asset('asset/images/arrow.png')); ?>" alt="arrow down" class="arrow_down"></button>
  <div class="dropdown-content" id="dropdown_content">
    
      <form action="<?php echo e(URL('logout')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

     <a href="#" name="logout" onclick="this.parentNode.submit(); return false"><i class="fas fa-sign-out-alt fa-lg"></i>Log Out</a>
                          </form>
    <a href="javascript:void(0)"> <i class="fas fa-cog"></i>  Settings</a>
    <a href="javascript:void(0)"><i class="fa fa-lock fa-lg"></i>  Privacy</a>
    <a href="#about_us"><i class="fa fa-user fa-lg" aria-hidden="true"></i> About Us</a>
  </div>
</div>
               
                <!--for log out end-->
            </div>
        </div>
    </nav>
 <script src="<?php echo e(asset('asset\js\search.js')); ?>">

</script>
<?php /**PATH D:\Projects\xampp\htdocs\friendsfeed\resources\views/templates/navbar.blade.php ENDPATH**/ ?>