
<!DOCTYPE html>
<html>
<head>
	<title>Edit profile</title>
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
  <?php 
  use App\Friend as Friend;
  $user_id = session('user_id');
  $requests_count = Friend::where('friend_id', '=', $user_id)->where('status', '=', 0)->count();?>

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
                         <li class="pop">
                          <a href="/friend_requests">Requests 
                          <span class="notification-bubble" title="Notifications" style="display: inline;
                           background-color: rgb(122, 210, 244);"><?= $requests_count?></span></a>
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
 <div class="container" style="margin-top:70px;">

  <div class="well"> 

 
  <h2> Edit Information </h2>
 <!-- @if($errors->has())
    
     <ul id="form-errors">
      {{ $errors->first('Firstname', '<li>:message</li>') }}
       {{ $errors->first('Lastname', '<li>:message</li>') }}
      
    </ul>
  @endif -->


  
   <?php echo '<form method="post" action="'. URL::to('edit') .'">';
   use App\User as User;
   $x11=session('user_id');

   $user=User::where('User_id',   session('user_id'))
   ->first();
   $f= $user->Firstname;
   $l=$user->Lastname;
   $e=$user->Email;
   $pass=$user->Password;
   $pp=$user->Phone_no;
   $g=$user->Gender;
   $b=$user->Birthday;
   $h=$user->Hometown;
   $m=$user->Maritalstatus;
   $a=$user->Aboutme;
   echo '<br>' ?>
   {{ csrf_field() }}


<form class="form">
    <div >  
              <label>First Name:</label>
              <input type="text" class="form-control input-lg" id="Firstname" value="<?= $f?>" name="Firstname" placeholder="Firstname">
               <br>
               
       <label>Last Name:</label>
              <input type="text" class="form-control input-lg" id="Lastname" value="<?= $l?>" name="Lastname" placeholder="Lastname">
                 <br>
                 
 
   <button class="btn btn-lg btn-primary" type="submit" value="Submit">Submit</button>
   <button class="btn btn-lg btn-primary" type="reset" value="Reset">Reset</button>
   <br><br>
 </form>

 @if($errors->has())
    
  
       @if($errors->first('Password', ':message'))
                   <script type="text/javascript">
                    alert('{{ $errors->first('Password', ':message') }}');
                    </script>
                     @endif
   
  @endif



 <?php echo '<form method="post" action="'. URL::to('edit') .'">';
 ?>
 {{ csrf_field() }}
 <form class="form">
 <label>Password:</label>
                <input type="password" id="Password" name="Password" placeholder="New Password" class="form-control input-lg" >
                <br>
                

 <button class="btn btn-lg btn-primary" type="submit" value="Edit">Submit</button>
 <button class="btn btn-lg btn-primary" type="reset" value="Edit">Reset</button>
 <br><br>
</form>



 @if($errors->has())
  
    @if($errors->first('Email', ':message')) 
                   
                  <script type="text/javascript">  alert('{{ $errors->first('Email', ':message') }}'); 
                  </script>
                  @endif
  @endif

  
 <?php echo '<form method="post" action="'. URL::to('edit') .'">';
             ?>
  {{ csrf_field() }}
  <form class="form">
           <label>E-Mail:</label>
                <input type="email" id="Email" name="Email" value="<?= $e?>" placeholder="Email" class="form-control input-lg" >
                <br>
               
              <button class="btn btn-lg btn-primary" type="submit" value="Edit">Submit</button>
              <button class="btn btn-lg btn-primary" type="reset" value="Edit">Reset</button>
              <br><br>
</form>



 @if($errors->has())
   

    @if ($errors->first('Phone_no', ':message'))
                    <script type="text/javascript">
                  alert(' {{ $errors->first('Phone_no', ':message') }}');
                  </script>
                @endif
  @endif




 <?php echo '<form method="post" action="'. URL::to('edit') .'">';
             ?>
  {{ csrf_field() }}
  <form class="form">
             <label>Phone_no:</label>
                <input type="text" id="Phone_no" name="Phone_no" value="<?= $pp?>" placeholder="Phone_no" class="form-control input-lg" >
                <br>
                
   <button class="btn btn-lg btn-primary" type="submit" value="Edit">Submit</button>
  <button class="btn btn-lg btn-primary" type="reset" value="Edit">Reset</button>
  <br><br>
</form>


<?php echo '<form method="post" action="'. URL::to('edit') .'">';
             ?>
  {{ csrf_field() }}
  <form class="form">
            <label>Gender:</label>
            <input type="text" id="Gender" name="Gender" value="<?= $g?>" placeholder="Gender" >
                 <br>
                <input type="radio" name="Gender" value="male"> Male
                <br>
                <input type="radio" name="Gender" value="female" > Female
                 <br>
                
           
               <button class="btn btn-lg btn-primary" type="submit" value="Edit">Submit</button>
              <button class="btn btn-lg btn-primary" type="reset" value="Edit">Reset</button>
              <br><br>
</form>


<?php echo '<form method="post" action="'. URL::to('edit') .'">';
             ?>
  {{ csrf_field() }}
  <form class="form">
            <label>Birthday:</label>
                <input type="Date" id="Birthday" name="Birthday" value="<?= $b?>" placeholder="Birthdate" class="form-control input-lg" >
                 <br>
                
 <button class="btn btn-lg btn-primary" type="submit" value="Edit">Submit</button>
  <button class="btn btn-lg btn-primary" type="reset" value="Edit">Reset</button>
  <br><br>
  </form>


  <?php echo '<form method="post" action="'. URL::to('edit') .'">';
             ?>
  {{ csrf_field() }}
  <form class="form">
            <label> Hometown:</label>
                <input type="text" id="Hometown" name="Hometown" value="<?= $h?>" placeholder="Hometown" class="form-control input-lg" >
                <br>
                 
<button class="btn btn-lg btn-primary" type="submit" value="Edit">Submit</button>
  <button class="btn btn-lg btn-primary" type="reset" value="Edit">Reset</button>
  <br><br>
  </form>


 <?php echo '<form method="post" action="'. URL::to('edit') .'">';
             ?>
  {{ csrf_field() }}
<form class="form">
          <label> Maritalstatus:</label>
                 <br>
            <input type="text" id="Maritalstatus" name="Maritalstatus" value="<?= $m?>"placeholder= "Matrialstatus"> 
            <br>
                <input type="radio" name="Maritalstatus" value="single"> Single
                <br>
                <input type="radio" name="Maritalstatus" value="Engaged" > Engaged
                <br>
                <input type="radio" name="Maritalstatus" value="Married" > Married
                <br>
                
<button class="btn btn-lg btn-primary" type="submit" value="Edit">Submit</button>
  <button class="btn btn-lg btn-primary" type="reset" value="Edit">Reset</button>
  <br><br>
  </form>
  <?php echo '<form method="post" action="'. URL::to('edit') .'">';
             ?>
  {{ csrf_field() }}
  <form class="form">
          <label> Aboutme:</label>
                <input type="text" id="Aboutme" name="Aboutme" value ="<?= $a?>" placeholder="Aboutme" class="form-control input-lg" >
                
                <br> 
              <button class="btn btn-lg btn-primary"  type="submit" value="Edit">Submit</button>
  <button class="btn btn-lg btn-primary" type="reset" value="Edit">Reset</button>
  <br><br>
  </form>



                <!-- <form action= "{{URL::to('upload')}}"method="post" enctype="multipart/form-data">
                 <input type="submit" value="Next" name="submit">
                 <input type="hidden" value="{{csrf_token()}}" name="_token">
               </form> -->
             </div>
           </div>

         </body>
         </html>
