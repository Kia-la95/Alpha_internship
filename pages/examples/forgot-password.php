<?php
use PHPMailer\PHPMailer\PHPMailer;

?>

<?php include("../../db.php")?>
<?php include("functions.php")?>


<?php 

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';
require './classes/config.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Forgot Password</title>

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
 // if there is no get request, hackers cannot access that page 
//  if(!IfItIsMethod('get') && !isset($_GET['forgot'])){

//    header("Location: login.php");

//  }

 if(isset($_POST['submit'])){
   
    // if(isset($_POST['email'])){

      $email = $_POST['email'];
      $length = 50;
      $token = bin2hex(openssl_random_pseudo_bytes($length));

     if(email_exists($email)){

      if( $stmt = mysqli_prepare($connection, "UPDATE users SET token='{$token}' WHERE user_email= ?") ){
        mysqli_stmt_bind_param($stmt, "s" , $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);



        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'c03cd5a3dc6b88';
        $phpmailer->Password = '00608935a8d838';
        $phpmailer -> isHTML(true);

        $phpmailer->setFrom('klahouti74@gmail.com','Kia La');
        $phpmailer->addAddress($email);

        $phpmailer->Subject = 'This is a test email';

        $phpmailer -> Body = '<p><a href="http://localhost/admin/pages/examples/recover-password.php?email='.$email.'&token='.$token.'"> Please Click Here to reset your Password </a></p>' ;

        if($phpmailer ->send()){
          echo "<h4 class='text-center alert-success'>Your Reset Password Email has been sent. Please check your Email <a></h4>";
         
        }else{

          echo "<h4 class='text-center alert-danger'>Sorry, we can't find this email address</h4>";
        }
      }

     }else{

      echo "<h4 class='text-center alert-danger'>Sorry, we can't find this email address</h4>";
    }




  // }
  

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
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
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
