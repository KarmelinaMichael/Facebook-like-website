<html>
<head>
	<title>Search</title>
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
                                <i class="glyphicon glyphicon-search"></i></button> 
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
                     <!--  <ul class="nav navbar-nav navbar-right">
                        

                      </ul> -->
                      <ul class="nav navbar-nav navbar-right">
                        <li>
                          
                            <a href="/profile/{{session('user_id')}}" role="button" data-toggle="modal">
                              <i class="glyphicon" >
                                
                              </i> 
                              Profile
                            </a>
                        </li>
             
                        <li>
                          <a href="/home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                       
                        <li>
                        
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
 <!-- <form action="{{URL::to('search')}}" method="get" >
                 <input type="radio" name="search_choise" value=1 checked> people <br>
                <input type="radio" name="search_choise" value=0> posts <br>
               <input style ="width:370px"type="text" name="search" id="search" placeholder="Search on posts or people by name, mail, phone, home town" >
             <input type="submit" value="search" name="submit">
          
       
          </form> -->
		<!-- <table style="width:100%">
			<tr>
			
 
				<td><a href="/home"><h3>Home</h3></a></td>
				<td> <a  href="/logout"><h3>logout</h3></a><td>
					<td><a href="/profile/{{session('user_id')}}"><h3>Profile</h3></a></td>
					
				</tr>
			</table> -->
			<div class="container" style="margin-top:50px;">
	@if($users)
<h2>Search people</h2>
 <table style="width:100% cellspacing=0px;cellpading=0px;">
	@foreach($users as $user)
			
					<tr><a class="name" href="/profile/{{$user->User_id}}"><h3> {{  $user->Firstname }} {{ $user->Lastname}}</h3></a></tr>
					 <tr><img  src="/Downloads/{{$user->Image_path}}"alt="profilepicture" style="width:200px;
                                  height:200px;margin-bottom: 60px;margin-top: 10px;"
                                  class="img-responsive"></tr>
                                  <hr>

				</br>
		@endforeach 		

@endif
@if($posts)
<h2>Your posts</h2>
@foreach($posts as $post)
			 <br><h4>
					 {{  $post->caption }}</h4>
					 <br>
      <h6> posted at:  {{  $post->posted_time }}</h6>
      <br>
          @if($post->image!=Null)
            {!! Html::image($post->image, 'alt' , array( 'width' => 400, 'height' => 340))!!}
         @endif
<hr>
				
		@endforeach 	
@endif

@if($posts==Null && $users==Null)
<h2> no result for your search </h2>
@endif
</div>
	</body>
</html>