<html>
<head>
  <title>Likers</title>
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
    <div class="container" style="margin-top:50px;">
    <h2>Likers</h2>
    <hr>
    <table style="width:100%">
      @foreach ($friends as $friend)
        <tr>     
          <a class="name" href="/profile/{{ $friend->User_id }}"><h3>{{ $friend->Firstname }} {{ $friend->Lastname }}</h3></a>

        </tr>
        <tr><img  src="/Downloads/{{$friend->Image_path}}"alt="profilepicture" style="width:200px;
                                  height:200px;margin-bottom: 60px;margin-top: 10px;"
                                  class="img-responsive"></tr>
      @endforeach
    </table>
    <hr>
  </div>
</body>
</html>