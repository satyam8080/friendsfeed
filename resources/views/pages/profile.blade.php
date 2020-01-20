@include('templates.header') 
@include('templates.navbar')


<link rel="stylesheet" href="{{asset('asset/css/profile.css')}}">
<script type="text/javascript" src="{{asset('asset/js/profile.js')}}">
</script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<div style="heigt:3rem;width:100%;margin:auto; text-align:center;">Don't peek here !</div>
<div class="center_div">
    <div class="profile_div">
    <img src="{{asset('asset/images/profile.jpg')}}" class="profile_pic" id="myImg" alt="Your Profile"> 
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
      

    <span style="display:inline; text-align:center; font-size:2rem;"><b> {{ Auth::user()->name }} </b></span><button class="edit_btn"><img alt="edit" src="{{asset('asset/images/pencil.png')}}" width="20px" height="20px"></button>
    
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
      @include('templates.card')
    
    </div>
    <!--post div end-->
    <!--code for taggged pics-->
    <div class="tags_div display" id="tags_div">
    
    </div>
 
</div>
<script type="text/javascript" src="{{asset('asset/js/profile.js')}}">
</script>

@include(' templates.footer')
    