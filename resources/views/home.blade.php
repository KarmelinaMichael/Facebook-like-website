<html>
<head>
  <title>Home</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
      <!-- script references -->
      
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

      <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAACjCgwA////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAABEAAAEAAAAAEQAAAAAAAAARAAAAAAAAABEAAAAAAAAAEQAAAAAAABEREQAAAAAAEREREAAAAAAAEQAAAAAAAAARAAAAAAAAABEAAAAAAAAAEREAAAAAAAABERAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" 
      rel="icon" type="image/x-icon" />
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      
      <script src="{{ asset('js/scripts.js') }}"></script>
</head>
<body>
 
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


   <!-- top nav -->
                  <div class="navbar navbar-blue navbar-static-top">  
                    @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
              @endif 
                      <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                          <span class="sr-only">Toggle</span>
                          <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                        </button>
                        <a href="/" class="navbar-brand logo">f</a>
                      </div>
                      <nav class="collapse navbar-collapse" role="navigation">
                      
                      <form class="navbar-form navbar-left" action="{{URL::to('search')}}" method="get">
                          <div class="input-group input-group-sm" style="max-width:360px;">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search on posts or people by name, mail, phone, home town">
                            <div class="input-group-btn">
                              <button class="btn btn-default" type="submit" value="search users" name="submituser">
                                <i class="glyphicon glyphicon-search"></i>
                              </button> 
                             <ul id="search">
                                  <li>
                                    <input type="radio" name="search_choise" value=1 checked> people <br>
                                  </li>
                                  <li>
                                    <input type="radio" name="search_choise" value=0> posts <br>
                                  </li>
                            </ul>
                            </div>
                          </div>
                      </form>
                      <ul class="nav navbar-nav navbar-right">
                        <li>
                          <a href="/home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                        <li>
                         
                          <a href="/profile/{{session('user_id')}}" role="button" data-toggle="modal">
                            <i class="glyphicon">
                            </i> 
                            Profile
                          </a>
                        </li>
                        <li>
                        
                        </li>   
                         
                        <li class="pop">
                          <a href="/friend_requests">Requests 
                          <span class="notification-bubble" title="Notifications" style="display: inline;
                           background-color: rgb(122, 210, 244);">{{$requests_count}}</span></a>
                        </li>
                        <li>
                          <a  href="/logout" >
                            <!-- <i class="glyphicon glyphicon-envelope"></i> -->
                            logout
                          </a>
                        </li>
                      </ul>
                      
                      </nav>
                  </div>
                    <!-- /top nav -->

                             <div class="col-sm-3"></div>
                             <div class="col-sm-6" style="margin-top:100px;margin-bottom:-20px;">  
                              <div class="well"> 
                                     <form class="form-horizontal" action="{{URL::to('uploadp')}}" 
                                     method="post" enctype="multipart/form-data">
                                    
                                        <h4>What's New</h4>
                                         <div class="form-group" style="padding:14px;">
                                          <textarea class="form-control" name="caption" placeholder="Write a new post"></textarea>
                                        </div>
                                        
                          <input value="Post" class="btn btn-primary pull-right com-disp" 
                          name="submit" type="submit"/>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        

                                        <ul class="list-inline">
                                          <!--<select id="selected" class="com-disp" >
                             <option value=1 checked name="public">Public</option>
                            <option value=0 name="public" >Private</option> </select>-->
                        <ul id="radio">
                                            <input type="radio" name="public" value=1 checked> public <br>
                          <input type="radio" name="public" value=0> private <br>
                        </ul>

                          
                                          <!-- <li>
                                            <a href="">
                                              <i class="glyphicon glyphicon-upload">
                                              </i>
                                            </a>
                                          </li> -->
                                          <li>
                                            
                                              <i >
                                                <a class="glyphicon glyphicon-camera img">
                                                  <input type="file" name="file" id="file">

                                                </a>
                                              </i>
                                            
                                          </li>
                                          
                                          <!-- <li>
                                            <a href="">
                                              <i class="glyphicon glyphicon-map-marker">
                                              </i>
                                            </a>
                                          </li> -->
                                          <!-- <li>
                                            <input type="radio" name="public" value=1 checked> public <br>
                          <input type="radio" name="public" value=0> private <br>
                                          </li>  -->  
                                        </ul>
                     
                                       
                                    </form>
                                </div>
                              </div>
                        

  @if($posts!=Null )
                <div class="padding">
                      <div class="full col-sm-9">
                        
                          <!-- content -->                      
                         <!--  <div class="row"> -->
                             <div class="panel panel-default">
                                   <div class="panel-heading"> 
                                    <div class="panel-body" >
                            
                           <!-- main col left --> 
                          <!--  <div class="col-sm-9"> -->
                  
                
             <h4>Posts</h4></div>
            <div >
              <p style="padding:5px; ">
             
              @foreach($posts as $post)
               <div style="padding-left:10px;background-color: white;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding:50px;
    margin-bottom:10px;">
                 <a href="/profile/{{$post->poster_id}}"><h3> {{  $post->poster_name }}</h3></a>

            <br>
                   {{  $post->caption }}
                  <h6> posted at:  {{  $post->posted_time }}</h6>
                  <br>
                        </br>
                        
                        <div class="imag">

                      @if($post->image!=Null)
                        {!! Html::image($post->image, 'alt', array( 'width' => 450, 'height' => 340)) !!}
                     @endif
                   </div>
                  </br>
                <a href="/likers/{{$post->post_id}}">Likers</a>
                    @foreach($like_count as $lcount)
                    @if($lcount->post_id==$post->post_id)

                    {{$lcount->count}}
                    @endif
                    @endforeach
                      @if($post->user_id != session('user_id'))
                      &nbsp;&nbsp;<a href="/like/{{$post->post_id}}" class="glyphicon glyphicon-thumbs-up">Like</a>
                        @else
                        &nbsp;&nbsp;<a href="/unlike/{{$post->post_id}}" class="glyphicon glyphicon-thumbs-down">Unlike</a>
                        
                 
                    @endif
                  </br>
                  </br>
                 <!--  <hr> -->
                      
                </div>
              
                  @endforeach
                 </p>
            </div>

            @endif
                              
                           <!--  </div> -->
                            </div>
                            </div>
                             </div>
                             </div> 
                             </div>  
                
 <!--  <form action="{{URL::to('search')}}" method="get" >
                 <input type="radio" name="search_choise" value=1 checked> people <br>
                <input type="radio" name="search_choise" value=0> posts <br>
               <input style ="width:370px"type="text" name="search" id="search" placeholder="Search on posts or people by name, mail, phone, home town" >
             <input type="submit" value="search" name="submit">
          
       
          </form> -->

  <!-- <table style="width:100%">
  <tr>
   <td><a href="/home"><h3>Home</h3></a></td>
   <td><a href="friend_requests"><h3>Friend Requests {{$requests_count}}</h3></a></td>
   <td><a href="/profile/{{session('user_id')}}"><h3>Profile</h3></a></td>
   <td> <a  href="/logout"><h3>logout<h3></a><td>
 
   </tr>
  </table> -->



<!-- @if($posts!=Null )
>>>>>>> 74fba099fe7570032e6d527d2167b7bfb96bc66f
<h2>posts</h2>
<div >
  <p style="padding:5px; ">
 
  @foreach($posts as $post)
   <div style="margin-top:2px;padding:5px; border:solid 0.9px black; length:auto;width:auto;">
     <a href="/profile/{{$post->poster_id}}"><h2> {{  $post->poster_name }}</h2></a>

<br>
       {{  $post->caption }}
      <h6> posted at:  {{  $post->posted_time }}</h6>
          @if($post->image!=Null)
            {!! Html::image($post->image, 'alt', array( 'width' => 350, 'height' => 240)) !!}
         @endif
      </br>
    <a href="/likers/{{$post->post_id}}">Likers</a>
        @foreach($like_count as $lcount)
        @if($lcount->post_id==$post->post_id)

        {{$lcount->count}}
        @endif
        @endforeach
          @if($post->user_id != session('user_id'))
     <a href="/like/{{$post->post_id}}">Like</a>
        @else
          <a href="/unlike/{{$post->post_id}}">Unlike</a>
        @endif
      </br>
    </div>
  
      @endforeach
     </p>
</div>

@endif -->





</body>

</html>
