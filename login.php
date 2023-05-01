<?php
require('db.php');
session_start();
if(isset($_POST['submit'])){
  $app=test_input($_POST['app']);
  $pass=test_input($_POST['pass']);
  $sql = "select name,app,pass,role from regis where app='$app' and pass='$pass' ";
  $res = mysqli_query($conn,$sql) or die("connection faild.");
  $row = mysqli_num_rows($res);
  if($row>0) {
    $data = mysqli_fetch_assoc($res);
    $_SESSION['name']=$data['name'];
    $_SESSION['app']=$data['app'];
    $_SESSION['ROLE']=$data['role'];
    $_SESSION['IS_LOGIN']='yes';
    if($data['role']==0){
      header('location:index.php');
      die();
    }
  }
  else{
    ?>
    <script>alert("enter correct login details!")</script> 
     <?php
     unset($_POST['submit']);
     session_destroy();
                
  }
}
if(isset($_POST['submitt'])){
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $sql = "select name,email,pass,role from faculty where email='$email' and pass='$pass' ";
  $res = mysqli_query($conn,$sql) or die("connection faild.");
  $row = mysqli_num_rows($res);
  if($row>0) {
    $data = mysqli_fetch_assoc($res);
    $_SESSION['name']=$data['name'];
    $_SESSION['email']=$data['email'];
    $_SESSION['ROLE']=$data['role'];
    $_SESSION['IS_LOGIN']='yes';
    if($data['role']==1){
      header('location:index.php');
      die();
    }
    if($data['role']==2){
      header('location:index.php');
      die();
    }
  }
  else{
    ?>
    <script>alert("enter correct login details!")</script> 
     <?php
     unset($_POST['submit']);
     session_destroy();
                
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <style>a{
    text-decoration: none;
  }
  a:hover{
    text-decoration: none;
  }</style>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
<main>
<div class="container">
   <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div><h4>Please Login here</h4></div>
              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/image/logo.png" alt="image">
                  <span class="d-none d-lg-block">jiwaji management</span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                    <div class="py-2"></div>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#u">Student Login</button> 
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#f">Other Login</button> 
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>
</main>
<!-- user modal -->
<div class="modal fade " id="u" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
    <div class="card mb-3">
                <div class="card-body">
                <div class="d-flex justify-content-center py-3">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/image/logo.png" alt="image">
                  <span class="d-none d-lg-block">jiwaji management</span>
                </a>
              </div>
               <div class="pt-1 pb-1 ">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your user id & password to login</p>
                  </div>
                  <form class="row g-3 needs-validation" novalidate  method="POST">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">User Id</label>
                      <div class="input-group has-validation">

                        <input type="text" name="app" class="form-control" id="yourUsername" maxlength="13" required>
                        <div class="invalid-feedback">Please enter your user Id.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="yourPassword" maxlength="10" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe" required>
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Login</button>
                      <?php $error ?>
                    </div>
                  </form>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="regis.php">Create an account</a></p>
                    </div>
               </div>
              </div>
    </div>
  </div>
</div>

<!-- faculty modal -->
<div class="modal fade " id="f" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
    <div class="card mb-3">
        <div class="card-body">
        <div class="d-flex justify-content-center py-3">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/image/logo.png" alt="image">
                  <span class="d-none d-lg-block">jiwaji management</span>
                </a>
              </div>
           <div class="pt-1 pb-1">
             <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
             <p class="text-center small">Enter your user id & password to login</p>
           </div>
          <form class="row g-3 needs-validation" novalidate  method="POST" >
            <div class="col-12">
               <label for="yourUsername" class="form-label">Faculty Id</label>
             <div class="input-group has-validation">
                <input type="email" name="email" class="form-control" id="yourUsername" maxlength="32" required>
                 <div class="invalid-feedback">Please enter your user Id.</div>
               </div>
             </div>
             <div class="col-12">
               <label for="yourPassword" class="form-label">Password</label>
               <input type="password" name="pass" class="form-control" id="yourPassword" maxlength="10" required>
               <div class="invalid-feedback">Please enter your password!</div>
             </div>
             <div class="col-12">
               <div class="form-check">
                 <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe" required>
                 <label class="form-check-label" for="rememberMe">Remember me</label>
               </div>
             </div>
             <div class="col-12">
               <button class="btn btn-primary w-100" type="submit" name="submitt">Login</button>
               <?php $error ?>
             </div>
           </form>
         </div>
       </div>
    </div>
  </div>
</div>
</body>
</html>
<?php 
function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data; 
}
?>