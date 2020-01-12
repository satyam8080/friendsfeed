@include('templates.header') 
@include('templates.navbar')

<script type="text/javascript" src="{{asset('asset/js/profile.js')}}"></script>
<link rel="stylesheet" href="{{asset('asset/css/profile.css')}}">
<div style="heigt:3rem;width:100%;margin:auto; text-align:center;">Don't peek here !</div>
<div class="center_div">
    <div class="profile_div">
 
    <img src="{{asset('asset/images/profile.jpg')}}" class="profile_pic"> 
    </div>
      

    <span style="display:inline; text-align:center; font-size:2rem;"><b> {{ Auth::user()->name }} </b></span><button class="edit_btn"><img alt="edit" src="{{asset('asset/images/pencil.png')}}" width="20px" height="20px"></button>
    
    <div style="width:100%; background-color:white;">
    <button class="profile_slide_btn active_slide" id="slide1" onclick="changeSlide(this.id);">About</button>
        <button class="profile_slide_btn" id="slide2" onclick="changeSlide(this.id);">Posts</button>
        <button class="profile_slide_btn" id="slide3" onclick="changeSlide(this.id);">Tags</button>
    </div>
 
</div>

@include(' templates.footer')
    