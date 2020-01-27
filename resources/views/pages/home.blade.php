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

     <form method="POST" action="{{ URL('post') }}" accept-charset="UTF-8" id="form_post_id" enctype="multipart/form-data">
      {{ csrf_field() }}

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
                placeholder="What's in Mind ?(use 'tab' to add emoji faster)" rows="5" ></textarea>



        </div>
	</div>
</div>       
          
          
          <!--end bootsnip-->
               
      </div>
      <div class="modal-footer" style="background-color:#e4edea !important" >

          <label for="image_post" id="image_post_label" class="mr-auto"> <img  src="{{asset('asset/images/photos.png')}}" alt="submit" id="image_post_png"></label>
                <input type="file" name="image" id="image_post" class="att_icon" accept="image/*">
     <!--      <label for="video_post" id="image_post_label" class="mr-auto"> <img  src="{{asset('asset/images/videos.png')}}" alt="submit" id="image_post_png"></label>
                <input type="file" name="video" id="video_post" class="att_icon" accept="video/*,.mkv">
           <label for="feeling_post" id="image_post_label" class="mr-auto"> <img  src="{{asset('asset/images/feelings.png')}}" alt="submit" id="image_post_png"></label>
                <input type="file" name="emoji" id="feeling_post" class="att_icon">-->
        <button type="submit" for="form_post_id" class="btn btn-primary post_button" >Post</button>

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

    @include('templates.card')
   @include('templates.card')
    
</div>
<!--code for cards end-->





<script type="text/javascript" src="{{asset('asset/js/homejs.js')}}"></script>


@include('templates.footer')
    



    