<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
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
<body style="background-color: #3B5999;" id="welcome">
  <h2 style="color:white;    margin-left: 130px;" >Welcome to Facebook</h2>

  <?php
  // session_start();
   if(session('y')!=0){
    $message = "password or email is incorrect";
echo "<script type='text/javascript'>alert('$message');</script>";
        
        session(['y' =>0] );
        }
       
     
     // echo session('y')."m";

     ?>
  <div class="col-sm-1"></div>
  <div class="col-sm-5" >

    <br><br>
   
    
      
 

   
      
        <?php echo '<form method="post"  action="'. URL::to('login') .'">'; ?>
        {{ csrf_field() }}
       
 
<div class="well"> 
  <form class="form">
                <h4>Log in</h4>
                <div >
                  <label>E-mail</label><br>
                <input class="form-control input-lg" type="text" id="Email" name="Email" placeholder="Email">
                <br><br>
                 <label>Password</label><br><br>
                 <input class="form-control input-lg" type="password" id="Password" name="Password" placeholder="Password">
                
                  <br><br>
                    <button class="btn btn-lg btn-primary" type="submit" value="Login">Log in
                    </button>
                  
                </div>
              </form>
            
             </div>
           </div>


                     <!--  <label>E-mail</label><br> -->
         <!--  <input type="text" id="Email" name="Email" placeholder="Email">
          <br><br> -->
 <!-- 
          <label>Password</label><br>
          <input type="password" id="Password" name="Password" placeholder="Password">
          <br><br> -->
 
          <!-- <button type="submit" value="Login">Login</button>
  -->

      <!--   <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Email" name="Email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input class="form-control" type="password" id="Password" name="Password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" value="Login">Sign in</button>
    </div>
  </div>
</form> -->
 
       
     
   
   <!--  </div> -->
<br><br> 
               <!--  <p>The following errors have occurred:</p> -->

                <div  id="form-errors">
                  @if($errors->has())
                  @if($errors->first('Email', ':message')) 
                   
                  <script type="text/javascript">  alert('{{ $errors->first('Email', ':message') }}'); 
                  </script>
                  @endif
                 <!--  @if($errors->first('Firstname', ':message'))
                  <script type="text/javascript">
                  alert('{{ $errors->first('Firstname', ':message') }}');
                  </script>
                   @endif

                  @if($errors->first('Lastname', ':message'))
                  <script type="text/javascript">
               alert(' {{ $errors->first('Lastname', ':message') }}');
               </script>
                 @endif -->
                  @if($errors->first('Password', ':message'))
                   <script type="text/javascript">
                    alert('{{ $errors->first('Password', ':message') }}');
                    </script>
                     @endif
                    @if ($errors->first('Phone_no', ':message'))
                    <script type="text/javascript">
                  alert(' {{ $errors->first('Phone_no', ':message') }}');
                  </script>
                @endif
                </div>
               @endif
              <?php echo '<form method="post"  action="'. URL::to('signup') .'">'; ?>
              {{ csrf_field() }}
<div class="col-sm-2" ></div>
  <div class="col-sm-5">
<div class="well"> 

             <form class="form">
              <h4>Sign-up</h4>
               
              <div >  
              <label>First Name:</label>
              <input type="text" class="form-control input-lg" id="Firstname" name="Firstname" placeholder="Firstname" required>
               <br>
                <br>
              <label>Last Name:</label>
              <input type="text" class="form-control input-lg" id="Lastname" name="Lastname" placeholder="Lastname" required>
                 <br>
                  <br>
                <label>Password:</label>
                <input type="password" id="Password" name="Password" placeholder="Password" required class="form-control input-lg" >
                <br>
                 <br>
                <label>E-Mail:</label>
                <input type="email" id="Email" name="Email" placeholder="Email" required class="form-control input-lg" >
                <br>
                 <br>
                <label>Phone_no:</label>
                <input type="text" id="Phone_no" name="Phone_no"  placeholder="Phone_no" class="form-control input-lg" >
                <br>
                 <br>
                <label>Gender:</label>
                 <br>
                <input type="radio" name="Gender" value="male" checked > Male
                <br>
                <input type="radio" name="Gender" value="female" > Female
                 <br>
                <br>
                <label>Birthday:</label>
                <input type="Date" id="Birthday" name="Birthday" placeholder="Birthday" required class="form-control input-lg" >
                 <br>
                  <br>
                <label> Hometown:</label>
                <input type="text" id="Hometown" name="Hometown" placeholder="Hometown" class="form-control input-lg" >
                <br>
                 <br>
                <label> Maritalstatus:</label>
                 <br>
                <input type="radio" name="Maritalstatus" value="single" checked > Single
                <br>
                <input type="radio" name="Maritalstatus" value="Engaged" > Engaged
                <br>
                <input type="radio" name="Maritalstatus" value="Married" > Married
                <br>
                 <br>
                <label> Aboutme:</label>
                <input type="text" id="Aboutme" name="Aboutme" placeholder="Aboutme" class="form-control input-lg" >
                
                <br> <br>
                  <button  class="btn btn-lg btn-primary" type="submit" value="Signup">Signup</button>
               
              </div>
            </form>
          </div>
        </div>
                             

<!-- <h2 style="text-align:center">Register</h2>
    <br><br>
 -->
 
     <!--   @if($errors->has())
    <p>The following errors have occurred:</p>

    <ul id="form-errors">
    {{ $errors->first('Firstname', '<li>:message</li>') }}
    {{ $errors->first('Lastname', '<li>:message</li>') }}
      {{ $errors->first('Email', '<li>:message</li>') }}
      {{ $errors->first('Password', '<li>:message</li>') }}
       {{ $errors->first('Phone_no', '<li>:message</li>') }}
      
    </ul>
  @endif -->

        <!--   <?php echo '<form method="post"  action="'. URL::to('signup') .'">'; ?>
 {{ csrf_field() }} -->
           <!--  <label>First Name:</label><br>
            <input type="text" id="Firstname" name="Firstname" placeholder="Firstname" required>
            <br><br>
 
            <label>Last Name:</label><br>
            <input type="text" id="Lastname" name="Lastname" placeholder="Lastname" required>
            <br><br> -->

           <!--  <label>Password:</label><br>
            <input type="password" id="Password" name="Password" placeholder="Password" required>
            <br><br> -->
 
             <!--  <label>E-Mail:</label><br>
            <input type="email" id="Email" name="Email" placeholder="Email" required>
            <br><br> -->
           <!--  <label>Phone_no:</label><br>
            <input type="text" id="Phone_no" name="Phone_no" placeholder="Phone_no" >
            <br><br> -->
 
           <!--  <label>Gender:</label><br>
            
            <input type="radio" name="Gender" value="male" checked > Male
                <br>
            <input type="radio" name="Gender" value="female" > Female
            <br><br> -->
           <!--  <label>Birthday:</label><br>
            <input type="Date" id="Birthday" name="Birthday" placeholder="Birthday" required>
            <br><br> -->

           <!--  <label> Hometown:</label><br>
            <input type="text" id="Hometown" name="Hometown" placeholder="Hometown"> 
            <br><br> -->

          <!--  <label> Maritalstatus:</label><br>
            
          <input type="radio" name="Maritalstatus" value="single" checked > Single
                <br>
            <input type="radio" name="Maritalstatus" value="Engaged" > Engaged
              <br>
            <input type="radio" name="Maritalstatus" value="Married" > Married
            <br><br> -->

         <!--  <label> Aboutme:</label><br>
            <input type="text" id="Aboutme" name="Aboutme" placeholder="Aboutme"> 
            <br><br> -->
            
          <!--   <button  type="submit" value="Signup">Signup</button>
          </form> -->
    
     
 

</body>
</html>