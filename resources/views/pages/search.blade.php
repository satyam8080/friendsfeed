@include('templates.header') 
@include('templates.navbar')
<link href="{{asset('asset/css/searchadv.css')}}" rel="stylesheet">
<!--From card-->


<div class="card" style="width: 37rem;  margin:auto; margin-top : 2rem;">
     <div class="card-header" style="padding-bottom:.5rem !important; background-color:white;border:none;">

        <img src="{{asset('asset/images/raj.jpg')}}" alt="" class="float-left rounded-circle" style="height: 4rem; width: 4rem;">

  
        <div style="height:100%; float:left; padding-left:1rem;padding-top:1rem;">
 
    <h5 class="card-title" style=" line-height:1rem !important;"> {{ Auth::user()->name }} </h5>
            <p style="line-height:.1rem;"><a style="text-decoration:none; display:inline;font-size:.8rem; color:#06216a; cursor:pointer;" href="">{{  '@'.Auth::user()->username }}</a></p>
        </div>
    </div>
     <div class="card-body">
         <i class="fa fa-id-card fa-lg"></i>
             <b>
             Hello boys
             </b>
         
         </div>
</div>
