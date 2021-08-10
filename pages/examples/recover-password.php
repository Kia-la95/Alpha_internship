<?php include("../../db.php")?>
<?php include("functions.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Recover Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<?php 

if(isset($_GET['token'])){

  $token = $_GET['token'];

}

if( $stmt = mysqli_prepare($connection, "SELECT username,user_email, token FROM users WHERE token=?") ){
  mysqli_stmt_bind_param($stmt, "s" , $token);
  mysqli_stmt_execute($stmt);

  mysqli_stmt_bind_result($stmt, $username, $user_email, $token);
  mysqli_stmt_fetch($stmt);

  mysqli_stmt_close($stmt);


  //  if($_GET['token'] !== $token || $_GET['email'] !== $email){

  //   echo "<h4 class='text-center alert-danger'>Sorry, we can't find this email address</h4>";    
  //  }
}


if(isset($_POST['update'])){

  $new_password = mysqli_real_escape_string($connection,$_POST['password']);
  $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);

  if($new_password !== $confirm_password){

    echo "<h4 class='text-center alert-danger'>Please make sure the passwords match</h4>";
    // header("Location: recover-password.php?email={$user_email}&token={$token}");

  }else{

    $stmt = mysqli_prepare($connection, "UPDATE users SET user_password = '{$new_password}' WHERE token=?");
    mysqli_stmt_bind_param($stmt, "s" , $token);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: login.php");
  }

}


?>


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="update" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
