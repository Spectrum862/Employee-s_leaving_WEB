<?php
        session_start();
        // initializing variables
        $user_ID = "";
        $email    = "";
        $errors = array(); 
        //$db = mysqli_connect('localhost', 'root', '', 'employee');

         if (isset($_POST['btn'])) {
             $user_ID = mysqli_real_escape_string($db, $_POST['user_ID']);
             $password = mysqli_real_escape_string($db, $_POST['password']);
          
             if (empty($user_ID)) {
                 array_push($errors, "Username is required");
             }
             if (empty($password)) {
                 array_push($errors, "Password is required");
             }
          
             if (count($errors) == 0) {
                 $password = md5($password);
                 $query = "SELECT * FROM users WHERE user_ID='$user_ID' AND password='$user_Password'";
                 $results = mysqli_query($db, $query);
                 if (mysqli_num_rows($results) == 1) {
                   $_SESSION['user_ID'] = $user_ID;
                   $_SESSION['success'] = "You are now logged in";
                   header('location: home.php');
                 }else {
                     array_push($errors, "Wrong username/password combination");
                 }
             }
             echo"";
        }
          
?>

<!DOCTYPE html>

  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="cover.css" rel="stylesheet">
      <meta name="description" content="">
      <meta name="author" content=""> 
      <link href="signin.css" rel="stylesheet">
    </head>

  <body>
  
  <div class="site-wrapper">
  <div class="site-wrapper-inner">
  <div class="cover-container">
    <div class="masthead clearfix">
      <div class="inner">
        <h3 class="masthead-brand"><a href ="http://www2.kmutt.ac.th/">KMUTT UNIVERSITY</a></h3>
        <nav>
          <ul class="nav masthead-nav">
            <li><a href="#">Contact</a></li>
            <li><a href="http://localhost/project/employee/register.php#">Register</a></li>
          </ul>
        </nav>
      </div>
    </div>

   <div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-6">
        
        </div>
        <div class="col-sm-6">
            <form class="form-signin" action="./login.php" method="post">
                <h2 class="form-signin-heading">Please sign in</h2>

                    <label for="inputUsername" class="sr-only">User ID</label>
                    <input type="text" id="user_ID" name="user_ID" class="form-control" placeholder="Username" required autofocus>

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

                    <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button name= "btn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            </form>
        </div>
    </div>
    </div>

    <div class="mastfoot">
      <div class="inner">
        <p>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี</p>
      </div>
    </div>
  </div>
</div>
</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
