@include('templates.header') 
@include('templates.navbar')



<!--<link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">-->
<link rel="stylesheet" href="{{asset('asset/css/emojionearea.css')}}">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
<script type="text/javascript" src="{{asset('asset/js/homejs.js')}}">

 
</script>

<div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary create_post"  data-toggle="modal" data-target="#exampleModalCenter" >
  <img src="{{asset('asset/images/pencil.png')}}" alt="create post" class="create_post_img">
</button>

<!-- Modal -->
     <form accept-charset="UTF-8" action="" method="POST">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" style="z-index  : 9999 !important;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color : #ccfac4 !important">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
          <!--code fron bootsnip-->
          <div class="container" style="background-color:#e4edea !important">
	<div class="row">
		<div class="span4 well" style="padding-bottom:0; width : 28rem !important">
           
                <textarea class="span4" style="resize : none; " id="new_post" name="new_post"
                placeholder="What's in Mind ?(use 'tab' to add emoji faster)" rows="5"></textarea>


        </div>
	</div>
</div>       
          
          
          <!--end bootsnip-->
               
      </div>
      <div class="modal-footer" style="background-color:#e4edea !important" >
          <label for="image_post" id="image_post_label" class="mr-auto"> <img  src="{{asset('asset/images/photos.png')}}" alt="submit" id="image_post_png"></label>
                <input type="file" name="image" id="image_post" class="att_icon">
           <label for="video_post" id="image_post_label" class="mr-auto"> <img  src="{{asset('asset/images/videos.png')}}" alt="submit" id="image_post_png"></label>
                <input type="file" name="image" id="video_post" class="att_icon">
           <label for="feeling_post" id="image_post_label" class="mr-auto"> <img  src="{{asset('asset/images/feelings.png')}}" alt="submit" id="image_post_png"></label>
                <input type="file" name="image" id="feeling_post" class="att_icon">
        <button type="button" class="btn btn-primary post_button">Post</button>
      </div>
    </div>
  </div>
         </div>
    </form>

</div>
<!--code for space-->
<div style="heigt:3rem;width:100%;margin:auto; text-align:center;">Don't peek here !</div>



<!--code for cards-->
<div class="center_main">
<!--1-->
<div class="card" style="width: 37rem; margin-top : 2rem; ">
    <div class="card-header" style="padding-bottom:0rem !important;">

        <img src="{{asset('asset/images/raj.jpg')}}" alt="" class="float-left rounded-circle" style="height: 32px; width: 32px;">

  
        <div style="height:100%; float:left; padding-left:1rem;">
 
    <h5 class="card-title" style=" line-height:1rem !important;"> {{ Auth::user()->name }} </h5>
            <p style="line-height:.1rem;"><a style="text-decoration:none; display:inline;font-size:.8rem; color:#06216a; cursor:pointer;" href="">{{ '@'.Auth::user()->username }}</a></p>
        </div>
  
        
    </div>
  <img src="{{asset('asset/images/dragon_classical_light.jpg')}}" class="card-img-top"  alt="cardimage">
  <div class="card-body">
       <h5 class="card-title">First post</h5>
    <p class="card-text">You can paste any post that you want to display here but it would be good to describe about yourself . Here div caed size would increase on increasing the post size</p>

    
  </div>
    <div class="card-footer"  style="height : 3rem !important;padding-top:0.1rem !important;">
            <a href="javascript:void(0)" id="changenow" onclick="change(this.id);return false;" class="btn icon_style"><img  src="{{asset('asset/images/heart.png')}}" style="height : 1.5rem;width:1.5rem;" > <span style="color:#999;">250</span></a>
       
          <a href="javascript:void(0)" class="btn" ><img src="{{asset('asset/images/comment2.png')}}" style="height : 1.5rem;width:1.5rem;">
        <span style="color:#999;">10</span>
        </a>
    
    </div>
</div>
<!--1-->
<div class="card" style="width: 37rem;  margin-top : 2rem; ">
    <div class="card-header" style="padding-bottom:0rem !important;">

        <img src="{{asset('asset/images/raj.jpg')}}" alt="" class="float-left rounded-circle" style="height: 32px; width: 32px;">

  
        <div style="height:100%; float:left; padding-left:1rem;">
 
    <h5 class="card-title" style=" line-height:1rem !important;"> {{ Auth::user()->name }} </h5>
            <p style="line-height:.1rem;"><a style="text-decoration:none; display:inline;font-size:.8rem; color:#06216a; cursor:pointer;" href="">{{ '@'.Auth::user()->username }}</a></p>
        </div>
  
        
    </div>
  <img src="{{asset('asset/images/demo.jpg')}}" class="card-img-top"  alt="cardimage">
  <div class="card-body">
       <h5 class="card-title">First post</h5>
    <p class="card-text">You can paste any post that you want to display here but it would be good to describe about yourself . Here div caed size would increase on increasing the post size</p>

    
  </div>
    <div class="card-footer"  style="height : 3rem !important;padding-top:0.1rem !important;">
            <a href="javascript:void(0)" id="changenow-0" onclick="change(this.id);return false;" class="btn icon_style"><img  src="{{asset('asset/images/heart.png')}}" style="height : 1.5rem;width:1.5rem;" > <span style="color:#999;">250</span></a>
       
          <a href="javascript:void(0)" class="btn" ><img src="{{asset('asset/images/comment2.png')}}" style="height : 1.5rem;width:1.5rem;">
        <span style="color:#999;">10</span>
        </a>
    
    </div>
</div>
    
</div>
<!--code for cards end-->





<script type="text/javascript" src="{{asset('asset/js/homejs.js')}}"></script>


@include(' templates.footer')
    



    