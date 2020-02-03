<script type="text/javascript" src="{{asset('asset/js/cardjs.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('asset/css/cardcss.css')}}">

<div class="card" style="width: 37rem;  margin:auto; margin-top : 2rem;">
    <div class="card-header" style="padding-bottom:0rem !important;">

        <img src="{{asset('asset/images/raj.jpg')}}" alt="" class="float-left rounded-circle" style="height: 32px; width: 32px;">

  
        <div style="height:100%; float:left; padding-left:1rem;">
  
    <h5 class="card-title" style=" line-height:1rem !important;"> {{ Auth::user()->name }} </h5>
            <p style="line-height:.1rem;"><a style="text-decoration:none; display:inline;font-size:.8rem; color:#06216a; cursor:pointer;" href="">{{  '@'.Auth::user()->username }}</a></p>
        </div>
        
        <div style="float:right;">
    <button style="background:none;border:none;" id="dot_btn-{{ Auth::user()->id }}" onclick="changedot(this.id); return false;"><!--generate id at runn time-->
         <i class="fas fa-ellipsis-v" style="color:#afafaf;"></i>
        </button>
            <div class="dot_div display" id="dot_div">
            <button>Report</button>
                <button>Share</button>
            </div>
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