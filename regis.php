<?php
require('db.php');
// session_start();
function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data; 
}

if(isset($_POST['submit'])){
  $name = test_input($_POST['name']);
  $last = test_input($_POST['last']);
  $father = test_input($_POST['father']);
  $flastname = test_input($_POST['flastname']);
  $gen = !empty($_POST['gen'])?$_POST['gen']:'';
  $dob = test_input($_POST['dob']);
  $roll = test_input($_POST['roll']);
  $depart = $_POST['department'];
  $class = $_POST['classname'];
  $sem = $_POST['sem'];
  $date = test_input($_POST['date']);
  $house = test_input($_POST['house']);
  $area = test_input($_POST['area']);
  $state = $_POST['sname'];
  $city = $_POST['cname'];
  $pin = test_input($_POST['pin']);
  $app = test_input($_POST['app']);
  $pass = test_input($_POST['pass']);
  $cpass = test_input($_POST['cpass']);
  $email = test_input($_POST['email']);
  $con = test_input($_POST['con']);
  $phone = test_input($_POST['phone']);
  $password =password_hash( $pass,PASSWORD_BCRYPT);
  $cpassword =password_hash( $cpass,PASSWORD_BCRYPT);
  $userquery = "select user_id from regis where user_id='$user_id'";
  $result = mysqli_query($conn,$userquery) or die("exist query failed");
  $count=mysqli_num_rows($result);
  if($count>0){
    ?> <script>
    alert("user id already exists");
    </script>
    <?php
  }
  else{
    if($pass===$cpass){
      $sql = "insert into regis (name,last,father,flastname,gen,dob,app,pass,cpass,email,con,phone) values ('$name','$last','$father','$flastname','$gen','$dob','$app','$password','$cpassword','$email','$con','$phone')";
      $res = mysqli_query($conn,$sql) or die("connection failed.");
      if($res==true){
        $sqll = "insert into study (app,class,depart,admission,app,roll) values ('$app','$classname','$department','$date','$app','$roll')";
        $result = mysqli_query($conn,$sqll) or die("connection failed.");
      }
      if($result==true){
        $sqlll = "insert into address (app,house,area,city,state,pin) values ('$app','$house','$area','$cname','$sname','$pin')";
        mysqli_query($conn,$sqlll) or die("connection faild.");
        ?> <script>
          alert("registration succesfully");
          </script>
    <?php
  }
      mysqli_close($conn);
      header('location:login.php');
    }
    else{
      ?> <script>
    alert("password are not mached");
    </script>
    <?php
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in - jiwaji management</title>
    <!-- Google Fonts -->
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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
</head>
<body>
  <div class="container py-3">
    <div class="card"> 
      <div class="d-flex justify-content-center py-3">
        <a href="#" class="logo d-flex align-items-center w-auto">
          <img src="img/logo.png" alt="">
          <span class="d-none d-lg-block">jiwaji management</span>
        </a>
      </div><!-- End Logo -->
      <div class="  d-flex justify-content-center  ">
          <h4 class="text-blue">Registration form</h4>
      </div>
      <div class="card-body " >
        <form  id="sub" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
          <div class="form-row">
                      <div class="form-group col-md-6">
               <label for="fname">Full Name</label>
               <input type="text" class="form-control" name="name" id="fname" placeholder="enter name" required>
            </div>
            <div class="form-group col-md-6">
               <label for="ulast">Last</label>
               <input type="text" class="form-control"name="last" id="ulast" placeholder="last name">
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="fathers">Father</label>
               <input type="text" class="form-control"name="father" id="fathers" placeholder="father name"required>
            </div>
            <div class="form-group col-md-6">
               <label for="last">Last</label>
               <input type="text" class="form-control"name="flastname" id="last" placeholder="last name">
            </div>
         </div>
         <div class="form-row ">
            <div class="mx-1 ">Gender:</div>
           <div class="form-check form-check-inline mb-2">
             <input class="form-check-input" type="radio"  name="gen" value="male"required>
             <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio"   name="gen" value="female"required>
              <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio"   name="gen" value="other"required >
              <label class="form-check-label" for="inlineRadio3">other</label>
            </div> 
          </div>
          <div class="form-row">
           <div class="form-group col-md-2">
              <label for="dobb">Date of birth</label>
              <input type="date" class="form-control"name="dob" id="dobb" placeholder="yy-mm-dd">
            </div>
            <div class="form-group col-2">
              <label for="rolls">Roll no.</label>
              <input type="text" maxlength="8" name="roll" class="form-control" id="rolls">
            </div>
            <div class="form-group col-2">
              <label for="departs">Department</label>
              <select id="departs" class="form-control" name="depart"required>
                <option selected>select depart</option>
                </select>
            </div>
            <div class="form-group col-2">
              <label for="classes">Class</label>
              <select id="classes" class="form-control" name="class" required>
                <option selected>select class</option>
              </select>
            </div>
            <div class="form-group col-2">
              <label for="semesters">Semester</label>
              <select id="semesters" class="form-control" name="sem"required>
                <option selected>select sem</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
                <option value="VII">VII</option>
                <option value="VIII">VIII</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="date">Addmission </label>
              <input type="date" class="form-control" name="date" id="dat" placeholder="yyyy-mm-dd"required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputAddress">Vilage/colony</label>
              <input type="text" class="form-control" name="house" id="inputAddress" placeholder="1234, colony/village"required>
            </div>
            <div class="form-group col-md-3">
              <label for="inputArea">Area</label>
              <input type="text" class="form-control" name="area" id="inputArea" placeholder="">
            </div>
            <div class="form-group col-2">
              <label for="stat">State</label>
              <select id="stat" class="form-control" name="state" required>
                <!-- <option  selected>select State</option> -->
                </select>
            </div>
            <div class="form-group col-2">
              <label for="citi">City</label>
              <select id="citi" class="form-control" name="city"required>
                <option selected>select city</option>
                </select>
            </div>
            <div class="form-group col-md-2">
              <label for="pp">Pincode</label>
              <input type="text" class="form-control" maxlength="6" name="pin" id="pp"required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-4">
              <label for="user">User Id</label>
              <div class="input-group ">
               <div class="input-group-prepend">
                  <div class="input-group-text">@</div>
                </div>
                <input type="text" class="form-control" maxlength="13" name="app" id="user" placeholder="user id should be application no." required>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword3">Password</label>
              <input type="password" class="form-control" maxlength="10" name="pass" id="inputPassword3" placeholder="password"required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">Confirm Password</label>
              <input type="password" class="form-control" maxlength="10" name="cpass" id="inputPassword4" placeholder="confirm password"required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="email address" required>
            </div>
            <div class="form-group col-md-4">
              <label for="mobile">Mobile</label>
              <input type="text" class="form-control" name="con" id="mobile" placeholder="mobile" required>
            </div>
            <div class="form-group col-md-4">
              <label for="phones">Phone</label>
              <input type="text" name="phone" class="form-control" id="phones" placeholder="parent mobile">
            </div>
         </div>
         <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Check me out
              </label>
            </div>
         </div>
         <button type="submit" name="submit" class="btn btn-primary">Create account</button>
        </form>
         <div class="col-12">
            <p class=" mb-0">Already have an account? <a href="login.php">Login</a></p>
          </div>
      </div>
    </div>
  </div>
  <!-- <script src="text/javascript">
 $(document).ready(function(){
    function load(){
      $.ajax({
        // url:"new.php",
        type:"POST",
        success:function(data){
         $("#stat").append(data);
        },
        error:function(error){
          console.log(error);
        }
      });
    }
    load();
 });
  </script> -->

 </body>
</html>
<?php
// $sql="select * from state";
// $query=mysqli_query($conn,$sql) or die("connection faild.");
// $str='';
// while($row=mysqli_fetch_assoc($query)){
//   $str.= '<option value='.$row['sid'].'> '.$row['sname'].' </option>'; 
//   echo " $str";
// }
?>
 <?php
// $sql="select * from state";
// $query=mysqli_query($conn,$sql) or die("connection faild.");
// while($row=mysqli_fetch_assoc($query)){ ?>
  <!-- <option  value="<?php  #echo $row['sid'];?> "><?php # echo $row['sname'];?></option> -->
   <?php #} ?>

                

