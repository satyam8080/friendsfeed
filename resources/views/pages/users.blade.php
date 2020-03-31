@include('templates.header') 
@include('templates.navbar')

@php
$name = $data['user'][0]->name;
$username = $data['user'][0]->username;
@endphp

<link rel="stylesheet" href="{{asset('asset/css/profile.css')}}">
   <script type="text/javascript" src="{{asset('asset/js/cardjs.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('asset/css/cardcss.css')}}">
<script type="text/javascript" src="{{asset('asset/js/profile.js')}}">
</script>
<script>
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
      

    <span style="display:inline; text-align:center; font-size:2rem;"><b>{{ $name }}  </b></span><button class="edit_btn"><img alt="edit" src="{{asset('asset/images/pencil.png')}}" width="20px" height="20px"></button>
    
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
    <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
    

    @if($data['exist'] != "False")
    @foreach($data['posts'] as $post)
      
<div class="card" style="width: 37rem;  margin:auto; margin-top : 2rem;">
    <div class="card-header" style="padding-bottom:0rem !important;">

        <img src="{{asset('asset/images/raj.jpg')}}" alt="" class="float-left rounded-circle" style="height: 32px; width: 32px;">

  
        <div style="height:100%; float:left; padding-left:1rem;">
  
    <h5 class="card-title" style=" line-height:1rem !important;"> {{ $name }} </h5>
            <p style="line-height:.1rem;"><a style="text-decoration:none; display:inline;font-size:.8rem; color:#06216a; cursor:pointer;" href="">{{  '@'.$username }}</a></p>
        </div>
        
        <div style="float:right;">
    <button style="background:none;border:none;" id="dot_btn-{{ $post->post_id }}" onclick="changedot(this.id); return false;"><!--generate id at runn time-->
         <i class="fas fa-ellipsis-v" style="color:#afafaf;"></i>
        </button>
            <div class="dot_div display" id="dot_div">
            <button onclick="javascript:alert('reported')"><i class="far fa-flag"></i> Report</button>
                <button><i class="fas fa-share"></i> Share</button>
                <button><i class="fa fa-trash"></i> Delete</button>
            </div>
        </div>
        
    </div>
  <img src="/friendsfeed/public/storage/users/images/{{$post->post_image}}" class="card-img-top"  alt="">
  <div class="card-body">
       <h5 class="card-title"></h5>
    <p class="card-text"><b> {{ $username }}: </b> {{$post->post}} <!-- You can paste any post that you want to display here but it would be good to describe about yourself . Here div caed size would increase on increasing the post size --></p>

    
  </div> 
    <div class="card-footer"  style="height : 3rem !important;padding-top:0.1rem !important;">
            <a href="javascript:void(0)" id="changenow-{{ $post->post_id }}" onclick="change(this.id);return false;" class="btn icon_style"><img  src="{{asset('asset/images/dislike.svg')}}" style="height : 1.5rem;width:1.5rem;" > <span style="color:#999;"> {{ $post->likes_count}} </span></a>
       
          <a href="javascript:void(0)" class="btn" data-toggle="modal" data-target="#exampleModalCenter-{{ $post->post_id }}" ><img src="{{asset('asset/images/comment2.png')}}" style="height : 1.5rem;width:1.5rem;">
        <span style="color:#999;" id="comment-{{ $post->post_id }}">10</span>
        </a>
        <!--for modal start-->
        
<div class="modal fade overflow_hidden" id="exampleModalCenter-{{ $post->post_id }}" tabindex="-1" style="z-index  : 9999 !important;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content" style="width:37rem;">
        <div class="modal-header">
        <b>COMMENTS</b>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      <div class="modal-body comment_field">
          <p><b>User 1 : </b>Comment 1</p>
          <p> <b>User 2 :</b>Comment 2</p>  <p> <b>User 2 :</b>Comment 2</p>    <p><b>User 1 : </b>Comment 1</p>
          <p> <b>User 2 :</b>Comment 2</p>  <p> <b>User 2 :</b>Comment 2</p>    <p><b>User 1 : </b>Comment 1</p>
          <p> <b>User 2 :</b>Comment 2</p>  <p> <b>User 2 :</b>Comment 2</p>    <p><b>User 1 : </b>Comment 1</p>
          <p> <b>User 2 :</b>Comment 2</p>  <p> <b>User 2 :</b>Comment 2</p>    <p><b>User 1 : </b>Comment 1</p>
          <p> <b>User 2 :</b>Comment 2</p>  <p> <b>User 2 :</b>Comment 2</p>    <p><b>User 1 : </b>Comment 1</p>
          <p> <b>User 2 :</b>Comment 2</p>  <p> <b>User 2 :</b>Comment 2</p>  <p> <b>User 2 :</b>Comment 2</p>  <p> <b>User 2 :</b>Comment 2</p> 
               
      </div>
      <div class="modal-footer" style="align-content:left !important; text-align:left !important;" >
<!--write code here for comment text field-->
          <textarea id="text_field" class="text_field" spellcheck="false" rows="3"></textarea>
          <button class="my_btn" onclick="comment_fun(this.id);" id="post_btn-{{ $post->post_id }}"><img src="{{asset('asset/images/send.png')}}" style="width:1.5rem;height:1.5rem;"></button>

      </div>
    </div>
  </div>
         </div>
        <!--modal ends-->
        </div>
</div>



      @endforeach
      @else 
<h1>No Post yet</h1>
@endif
      <!-- -------------------------------------------------------------------------------------------------------------------- -->
    
    </div>
    <!--post div end-->
    <!--code for taggged pics-->
    <div class="tags_div display" id="tags_div">
    
    </div>
 
</div>
<!--<script type="text/javascript" src="{{asset('asset/js/profile.js')}}">-->
</script>

@include(' templates.footer')
    