<html>
<head>
	<title>Profile</title>
	
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
			
			<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAACjCgwA////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAABEAAAEAAAAAEQAAAAAAAAARAAAAAAAAABEAAAAAAAAAEQAAAAAAABEREQAAAAAAEREREAAAAAAAEQAAAAAAAAARAAAAAAAAABEAAAAAAAAAEREAAAAAAAABERAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" 
			rel="icon" type="image/x-icon" />
			
			<!-- script references -->
			
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

			
			<script src="{{ asset('js/bootstrap.min.js') }}"></script>
			
			<script src="{{ asset('js/scripts.js') }}"></script>

</head>
<body>

	
	    
	        		
	        <!-- <div class="row row-offcanvas row-offcanvas-left">
	                      
	          
	            <!-- sidebar -->
	            <!--  <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
	              
	              	<ul class="nav">
	          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
	            	</ul>
	               
	                <ul class="nav hidden-xs" id="lg-menu">
	                    <li class="active"><a href="#featured"><i class="glyphicon glyphicon-list-alt"></i> Featured</a></li>
	                    <li><a href="#stories"><i class="glyphicon glyphicon-list"></i> Stories</a></li>
	                    <li><a href="#"><i class="glyphicon glyphicon-paperclip"></i> Saved</a></li>
	                    <li><a href="#"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
	                </ul>
	                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
	                    <li>
	                      <a href="http://www.bootply.com"><h3>Bootstrap</h3> <i class="glyphicon glyphicon-heart-empty"></i> Bootply</a>
	                    </li>
	                </ul> -->
	              
	              	<!-- tiny only nav-->
	              <!-- <ul class="nav visible-xs" id="xs-menu">
	                  	<li><a href="#featured" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
	                    <li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-list"></i></a></li>
	                  	<li><a href="#" class="text-center"><i class="glyphicon glyphicon-paperclip"></i></a></li>
	                    <li><a href="#" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
	                </ul>
	              
	            </div> 
	            <!-- /sidebar -->
	           
	            <!-- main right col --> 
	            <div  id="main">
	               
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
		                       @foreach ($profile as $user)
		                        <a href="/profile/{{session('user_id')}}" role="button" data-toggle="modal">
		                        	<i class="glyphicon" >
		                        		<!-- <img src="/Downloads/{{$user->Image_path}}" alt="profilepicture" style="width:15px;
			                            	height:15px; border-radius:2px;"
			                            	class="img-responsive"> -->
		                        	</i> 
		                        	<!-- {{$user->Firstname}} {{$user->Lastname}} -->
		                        	Profile
		                        </a>
		                    </li>
	                      <li>
	                        <a href="/home"><i class="glyphicon glyphicon-home"></i> Home</a>
	                      </li>
	                     
	                      <li>
	                      
	                      </li>	
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        	<i class="glyphicon glyphicon-user"> 
	                        	</i>&nbsp;Friends
	                        </a>
	                       
	                        <ul class="dropdown-menu">
	                        	<!-- <li><a href="/friend_requests">Friend Requests {{$requests_count}}</a></li> -->
	                        	@if ($num == 0) 
	                        	<li><a href="/add_friend/{{$user->User_id}}">Add Friend</a></li>
	                        	@elseif ($num == 1)
								<li><a href="">Friend request sent</a></li>
								@elseif ($num == 2)
								<li><a href="/confirm_friend_request/{{$user->User_id}}">Confirm Friend Request</a></li>
								@elseif ($num == 3)
								<li><a href="">Friends &#10004;</a></li>
								@else
								<li><a href="/my_friends">My Friends</a></li>
								@endif
								
	                         
	                        </ul>
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
	              
	                <div class="padding">
	                    <div class="full col-sm-9">
	                      
	                        <!-- content -->                      
	                      	<div class="row">
	                          
	                         <!-- main col left --> 
	                         <div class="col-sm-5">
	                           
	                              <div class="panel panel-default">
	                              	<div class="panel-body">
	                                   <p class="lead" style="text-align:center;">{{$user->Firstname}} {{$user->Lastname}} </p>
	                                </div>
	                                <div class="panel-thumbnail" align="center">
	                                	
		                            	<img src="/Downloads/{{$user->Image_path}}" alt="profilepicture" style="width:393px;
		                            	height:300px;margin-bottom: 60px;margin-top: 10px;"
		                            	class="img-responsive">
		                            </div>
		                            	@if($num==4)
		                            	<ul id="profile">
		                            		<li>
												<a href="/upload"class="btn btn-primary com-disp">Edit Profile Picture</a>
											
											</li>
											<li>
												<a href="/delete" class="btn btn-primary com-disp">Delete</a>
											</li>
											<li>
												<a href="/edit" class="btn btn-primary com-disp">Edit information</a>
											</li>
										</ul>
										@endif
		                            	
	                                
	                              </div>
									
	                          
	                           
	                              <div class="panel panel-default">
	                                <div class="panel-heading">
	                                	<h4>About</h4></div>
	                                  <div class="panel-body">
	                                    <div class="list-group">
	                                    	
	                                      <p class="list-group-item">Email:{{$user->Email}}</p>
	                                      <p class="list-group-item">Phone_no:{{$user->Phone_no}}</p>
	                                      <p class="list-group-item">Gender:{{$user->Gender}}</p>
	                                      <p class="list-group-item">Hometown:{{$user->Hometown}}</p>
	                                      <p class="list-group-item">Marital status:{{$user->Maritalstatus}}</p>
	                                      @if($num == 3||$num==4)
	                                      <p class="list-group-item">Birthdate:{{$user->Birthday}}</p>
	                                      <p class="list-group-item">About me:{{$user->Aboutme}}</p>
	                                      @endif
										  @endforeach
	                         

	                                     </div>
	                                  </div>
	                              </div>
	                           
	                             
	                             <!--  <div class="panel panel-default">
	                                 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>More Templates</h4></div>
	                                  <div class="panel-body">
	                                    <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Free @Bootply</a>
	                                    <div class="clearfix"></div>
	                                    There a load of new free Bootstrap 3 ready templates at Bootply. All of these templates are free and don't require extensive customization to the Bootstrap baseline.
	                                    <hr>
	                                    <ul class="list-unstyled"><li><a href="http://www.bootply.com/templates">Dashboard</a></li><li><a href="http://www.bootply.com/templates">Darkside</a></li><li><a href="http://www.bootply.com/templates">Greenfield</a></li></ul>
	                                  </div>
	                              </div> -->
	                           
	                              <!-- <div class="panel panel-default">
	                                <div class="panel-heading"><h4>What Is Bootstrap?</h4></div>
	                               	<div class="panel-body">
	                                	Bootstrap is front end frameworkto build custom web applications that are fast, responsive &amp; intuitive. It consist of CSS and HTML for typography, forms, buttons, tables, grids, and navigation along with custom-built jQuery plug-ins and support for responsive layouts. With dozens of reusable components for navigation, pagination, labels, alerts etc..                          </div>
	                              </div> -->

	                           		
	                           
	                          </div>
	                          
	                          <!-- main col right -->
	                          <div class="col-sm-7">  @foreach ($profile as $user)
	                          	<!-- <form action="{{URL::to('uploadp')}}" method="post" enctype="multipart/form-data">
									<input type="radio" name="public" value=1 checked> public <br>
								<input type="radio" name="public" value=0> private <br>
								  <textarea name="caption" ></textarea>
								</br>
								  <label>select image to upload</label>
								  <input type="file" name="file" id="file">
								</br>
								  <input type="submit" value="Post" name="submit">
								<input type="hidden" name="_token" value="{{ csrf_token() }}" />
								</form> -->
	                               
	                                <div class="well">
	                                   @if($num==4)
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
		                                    	</li>	 -->	
		                                    </ul>
											@endif
		                                    @endforeach
	                                  </form>
	                              </div>
	                      
	                               <div class="panel panel-default">
	                                 <div class="panel-heading"> 
	                                  <div class="panel-body"><h4>Posts</h4></div>
	                                   @if($likes!=Null )
										
										<div >
											<p >

												@foreach($likes as $like)
												
												<div id="posts" style="padding-left:10px;">
													<a id="like" href="/profile/{{$like->poster_id}}"><h3>{{  $like->poster_name }}</h3>
													</a>
												<h6> posted at:  {{  $like->posted_time }}</h6>
												</br>
												{{  $like->caption }}
												<br>
												</br>
												
												<div class="imag">
													
												@if($like->image!=Null)
												
												{!! Html::image($like->image, 'alt', array( 'width' => 400, 'height' => 340)) !!}
												
												@endif
											</div>
												<a href="/likers/{{$like->post_id}}">Likers</a>
												@foreach($like_count as $lcount)
												@if($lcount->post_id==$like->post_id)

												{{$lcount->count}}
												@endif
												@endforeach
												@if($like->user_id != session('user_id'))
												&nbsp;&nbsp;<a href="/like/{{$like->post_id}}" class="glyphicon glyphicon-thumbs-up">Like</a>
												@else
												&nbsp;&nbsp;<a href="/unlike/{{$like->post_id}}" class="glyphicon glyphicon-thumbs-down">Unlike</a>
												@endif

											</br>
											</br>
											
											@if ($num==4)
											
											  		<input value="Delete" class="btn btn-primary" type="submit">
											  			<div class="del" style="margin-top:-31px;">
											

										<!-- 	<input type="submit" value="Delete"></input> -->
											<!--  <a href="/postd/{{$like->post_id}}">Delete</a>  -->

											{!! Form::open(array('url' => 'postd/'.$like->post_id, 'method' => 'DELETE')) !!}
											{!! Form::submit('Delete') !!}
											{!! Form::close() !!} </div>
											</input>
										
											@endif
										
										</div>
										@endforeach
									</p>
								</div>
								@endif
								<!-- <div class="clearfix"></div>
	                                    <hr>
	                                    Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.
	                                  </div>
	                               </div>
	                            
	                               <div class="panel panel-default">
	                                 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
	                                  <div class="panel-body">
	                                    <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
	                                    <div class="clearfix"></div>
	                                    <hr>
	                                    
	                                    <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>
	                                    
	                                    <hr>
	                                    <form>
	                                    <div class="input-group">
	                                      <div class="input-group-btn">
	                                      <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
	                                      </div>
	                                      <input type="text" class="form-control" placeholder="Add a comment..">
	                                    </div>
	                                    </form>
	                                    
	                                  </div>
	                               </div>

	                               <div class="panel panel-default">
	                                 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Portlet Heading</h4></div>
	                                  <div class="panel-body">
	                                    <ul class="list-group">
	                                    <li class="list-group-item">Modals</li>
	                                    <li class="list-group-item">Sliders / Carousel</li>
	                                    <li class="list-group-item">Thumbnails</li>
	                                    </ul>
	                                  </div>
	                               </div>
	                            
	                               <div class="panel panel-default">
	                                <div class="panel-thumbnail"><img src="/assets/example/bg_4.jpg" class="img-responsive"></div>
	                                <div class="panel-body">
	                                  <p class="lead">Social Good</p>
	                                  <p>1,200 Followers, 83 Posts</p>
	                                  
	                                  <p>
	                                    <img src="https://lh6.googleusercontent.com/-5cTTMHjjnzs/AAAAAAAAAAI/AAAAAAAAAFk/vgza68M4p2s/s28-c-k-no/photo.jpg" width="28px" height="28px">
	                                    <img src="https://lh4.googleusercontent.com/-6aFMDiaLg5M/AAAAAAAAAAI/AAAAAAAABdM/XjnG8z60Ug0/s28-c-k-no/photo.jpg" width="28px" height="28px">
	                                    <img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg" width="28px" height="28px">
	                                  </p>
	                                </div>
	                              </div> -->
	                            
	                          </div>
	                       </div><!--/row-->
	                      <!-- 
	                        <div class="row">
	                          <div class="col-sm-6">
	                            <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
	                          </div>
	                        </div>
	                      
	                        <div class="row" id="footer">    
	                          <div class="col-sm-6">
	                            
	                          </div>
	                          <div class="col-sm-6">
	                            <p>
	                            <a href="#" class="pull-right">©Copyright 2013</a>
	                            </p>
	                          </div>
	                        </div> -->
	                      
	                     <!-- <hr>
	                      
	                       <h4 class="text-center">
	                      <a href="http://bootply.com/96266" target="ext">Download this Template @Bootply</a>
	                      </h4>
	                        
	                      <hr> -->
	                        
	                      
	                    </div><!-- /col-9 -->
	                </div><!-- /padding -->
	            </div>

	            <!-- /main -->
	          
	        </div>
	    </div>


	<!--post modal-->
	<!-- <div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	  <div class="modal-content">
	      <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				Update Status
	      </div>
	      <div class="modal-body">
	          <form class="form center-block">
	            <div class="form-group">
	              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
	            </div>
	          </form>
	      </div>
	      <div class="modal-footer">
	          <div>
	          <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
	            <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
			  </div>	
	      </div>
	  </div>
	  </div>-->
	
		


<!--=======
	@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


   <form action="{{URL::to('search')}}" method="get" >
               
               <input style ="width:350px"type="text" name="search" id="search" placeholder="Search on posts or people by name, mail, phone, home town" >
              
            <input type="submit" value="search users" name="submituser">

            <input type="submit" value="search posts" name="submitpost">

 <form action="{{URL::to('search')}}" method="get" >
                 <input type="radio" name="search_choise" value=1 checked> people <br>
                <input type="radio" name="search_choise" value=0> posts <br>
               <input style ="width:370px"type="text" name="search" id="search" placeholder="Search on posts or people by name, mail, phone, home town" >
             <input type="submit" value="search" name="submit">
          

       
          </form>

	<!-- <div class="container">
		<table style="width:100%">
			<tr>
			
  <td><a href="/home"><h3>Home</h3></a></td>
				<td> <a  href="/logout"><h3>logout</h3></a><td> 
					<td><a href="/friend_requests"><h3>Friend Requests {{$requests_count}}</h3></a></td>
					<td><a href="/profile/{{session('user_id')}}"><h3>Profile</h3></a></td>
					
				</tr>
			</table> -->
		<!--	<table style="width:100%">

				<tr>

					 @foreach ($profile as $user)
					
					<img src="/Downloads/{{$user->Image_path}}" alt="profilepicture" style="width:128px;height:128px;">
					
					@if($num==4)
					<tr><td><a href="/upload"><h3>Edit</h3></a></td></tr>
					<tr><td><a href="/delete"><h3>Delete</h3></a></td></tr>
					<tr><td><a href="/edit"><h3>Edit information</h3></a></td></tr>
					@endif
					<tr><td><h1>Name:{{$user->Firstname}} {{$user->Lastname}}</h1></td>  </tr>
					<tr><td><h2>Email:{{$user->Email}} </h2></td></tr>

					<tr><td><h2>Phone_no:{{$user->Phone_no}} </h2></td></tr>

					<tr><td><h2>Gender:{{$user->Gender}}</h2></td></tr>

					<tr><td><h2>Hometown:{{$user->Hometown}}</h2></td><tr>

						<tr><td><h2>Marital status:{{$user->Maritalstatus}}</h2></td></tr>
						@if($num == 3||$num==4)
						<tr><td><h2>Birthdate:{{$user->Birthday}} </h2></td><tr>

							<tr><td><h2>About me:{{$user->Aboutme}}</h2></td></tr>
							@endif
							@endforeach
 -->

							<!-- @if ($num == 0)
							<td><a href="/add_friend/{{$user->User_id}}">Add Friend</a></td>
							@elseif ($num == 1)
							<td><a href="">Friend request sent</a></td>
							@elseif ($num == 2)
							<td><a href="/confirm_friend_request/{{$user->User_id}}">Confirm Friend Request</a></td>
							@elseif ($num == 3)
							<td><a href="">Friends &#10004;</a></td>
							@else
							<td><a href="/my_friends"><h3>My Friends</h3></a></td>
							@endif 
						</tr>
					</table>
				</div>-->

				<!-- @if($num==4)
				<tr><td>

					<div style="border:1px blue solid;padding:5px">
						<h2>add new posts</h2>

						<div class="content">
							<form action="{{URL::to('uploadp')}}" method="post" enctype="multipart/form-data">
								<input type="radio" name="public" value=1 checked> public <br>
								<input type="radio" name="public" value=0> private <br>
								<textarea name="caption" ></textarea>
							</br>
							<label>select image to upload</label>
							<input type="file" name="file" id="file">
						</br>
						<input type="submit" value="Post" name="submit">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					</form>
				</div>
			</div>
		</td></tr>
		@endif
 -->
		<!--@if($likes!=Null )
		<h2>posts</h2>
		 <div >
			<p style="padding:5px; ">

				@foreach($likes as $like)
				<div style="margin-top:2px;padding:5px; border:solid 0.9px black; length:auto;width:auto;">
					<a href="/profile/{{$like->poster_id}}"><h2> {{  $like->poster_name }}</h2></a>

				</br>
				{{  $like->caption }}
				<h6> posted at:  {{  $like->posted_time }}</h6>
				@if($like->image!=Null)
				{!! Html::image($like->image, 'alt', array( 'width' => 300, 'height' => 240)) !!}
				@endif
				<a href="/likers/{{$like->post_id}}">Likers  </a>
				@foreach($like_count as $lcount)
				@if($lcount->post_id==$like->post_id)

				{{$lcount->count}}
				@endif
				@endforeach
				@if($like->user_id != session('user_id'))
				<a href="/like/{{$like->post_id}}">Like</a>
				@else
				<a href="/unlike/{{$like->post_id}}">Unlike</a>
				@endif
			</br>
			@if ($num==4)
			{!! Form::open(array('url' => 'postd/'.$like->post_id, 'method' => 'DELETE')) !!}
			{!! Form::submit('Delete') !!}
			{!! Form::close() !!}
			@endif
		</div>
		@endforeach
	</p>
</div>
@endif -->
</body>
</html>