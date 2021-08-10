<?php include("../../db.php")?>
<?php include("functions.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>Admin</b>LTE</a>
  </div>

<?php

if(isset($_POST['register'])){

  $username = $_POST['username'];
  $first_name = $_POST['firstname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $retype_password = $_POST['password2'];

  if(username_exists($username)){

    echo "<h4 class='text-center alert-danger'>This Username is already exists</h4>";
  }else{
 

  if(!empty($username) && !empty($first_name) && !empty($email) && !empty($password) && !empty($retype_password)){

  $username = mysqli_real_escape_string($connection,$username);
  $first_name = mysqli_real_escape_string($connection,$first_name);
  $email = mysqli_real_escape_string($connection,$email);
  $password = mysqli_real_escape_string($connection,$password);
  $retype_password = mysqli_real_escape_string($connection,$retype_password);


      if($password !== $retype_password){

        echo "<h4 class='text-center alert-danger'>Passwords don't match</h4>";
        // header("Location: register.php");

      }elseif(!isset($_POST['terms'])){

        echo "<h4 class='text-center alert-danger'>You must agree to the terms and conditions</h4>";

      }else{

        echo "<h4 class='text-center alert-success'>Your account is created, now you can <a href='login.php'>login<a></h4>";
        // header("Location: register.php");

      // $password = password_hash('$password',PASSWORD_DEFAULT);

      $query = "INSERT INTO users (username, user_firstname, user_password, user_email) VALUES ('{$username}','{$first_name}','{$password}','{$email}')";
      $add_user =mysqli_query($connection, $query);

      //   if(!$add_user){
      //     die("QUERY FAILED".mysqli_error($connection));
      // }
      }
      
 }else{

    echo "<h4 class='text-center alert-danger'>Please Make sure all of the fields are filled</h4>";

  }

}

}

?>





  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post">
      <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="firstname" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password2" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
