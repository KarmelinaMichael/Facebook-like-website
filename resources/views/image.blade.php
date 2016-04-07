<!DOCTYPE html>
<html>
<head>
	<title>Upload image</title>
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
     <div class="container" style="margin-top:150px;">
            
              <h3>Select an image to upload:</h3>
             <form action= "{{URL::to('upload')}}"method="post" enctype="multipart/form-data">
               
              
               <div style="margin-top: -115px;margin-left: 400px;" class="up">
               <a class="glyphicon glyphicon-camera img" >
               <input  type="file" name="file" id="file1"></a></div>

               <div style="margin-top:150px;margin-left: 400px;">
                 <input type="submit" margin-left:250px;" class="btn btn-lg btn-primary" value="Next" name="submit">
               <input type="hidden" value="{{csrf_token()}}" name="_token"></div>
               </form>
                <!-- <form action= "{{URL::to('upload')}}"method="post" enctype="multipart/form-data">
                 <input type="submit" value="Next" name="submit">
                 <input type="hidden" value="{{csrf_token()}}" name="_token">
                 </form> -->
            
        </div>
    </body>
</html>