<?php
include('header.php');
if( $_SESSION['ROLE']==2 ||  $_SESSION['ROLE']==1 ){
include('sidebar.php');
require('db.php');
$counts='';
$err='';
$serr='';
$val='';
if(isset($_POST['showed'])){
  $class = $_POST['class'];
  $sem = $_POST['sem'];
 $sql="select regis.app,regis.name,regis.father,study.sem from regis inner join study on regis.app=study.app where class='$class' and sem='$sem'";
 $query=mysqli_query($conn,$sql) or die("connecton failed");
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

  <!-- Template Main CSS File -->
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
  <!-- js file -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<main id="main" class="main ">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active">Add mark</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<div class="card text-center" style="width: 100%;">
     <table class="table table-striped table-hover ">
         <thead class="thead-dark">
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Application No.</th>
            <th scope="col">Name</th>
            <th scope="col">Father</th>
            <th scope="col">Semester</th>
            <th scope="col">Subject</th>
            <th scope="col">Min.</th>
          </tr>
         </thead>
         <tbody>
           <form class="row g-3 needs-validation" id="sub" novalidate  method="POST" action="editmark.php">
           <?php
           $sno=0; 
           while($row=mysqli_fetch_assoc($query)){
               $sno=$sno+1;
           ?>  
           <div class="form-row">
               <tr>
                  <th scope="row"><?php  echo "$sno" ?></th>
                   <input type="hidden" name="num" value="<?php  echo "$sno" ?>">
                  <td> <div class="form-group col-auto">
                     
                     <input type="text" class="form-control" id="apps" name="app[]" value="<?php  echo $row['app'] ?>" readonly>
                  </div></td>
                  <td><div class="form-group col-auto">
                      <input type="text" class="form-control" id="names"  value="<?php  echo $row['name'] ?>" readonly>
                    </div></td>
                  <td><div class="form-group col-auto">
                      <input type="text" class="form-control" id="fathers"  value="<?php  echo $row['father'] ?>" readonly>
                   </div></td>
                   <td><div class="form-group col-auto">
                     <input type="text" class="form-control"  id="seme" name="sem[]" value="<?php  echo $row['sem'] ?>" readonly>
                   </div></td>
                   <td><div class="form-group col-auto">
                     <input type="text" class="form-control" id="mins" name="sub[]"  required>
                     <!-- <span class="error"><?php # echo $err ?></span> -->
                   </div></td>
                 <td><div class="form-group col-auto">
                     <input type="text" class="form-control" maxlength="2" id="mins" name="obt[]"  required>
                     <p id="check"></p>
                     <!-- <span class="error"><?php # echo $serr ?></span>
                     <span class="error"><?php # echo $val ?></span> -->
                   </div></td>
               </tr>    
              </div>
              <?php
                } 
              ?>
            </form>
          </tbody>
        </table>
        <div class="form-group col-auto">
        <button type="submit" form="sub" class="btn btn-primary" name="submit" onclick="myfunction()">Submit</button>
        <button type="button" class="btn btn-danger" ><a href="editmark.php"> Close</a></button>
      </div> 
      <script> function myfunction(){
                let x=document.getElementById("mins").value;
                let text;
                if(isNaN(x)||x<1||x<=15){
                  text="mark should be equal or less than 15"; 
                }
                document.getElementById("check").innerHTML=text;
               } 
               </script>
 
      <?php
       } 
      ?> 
     <!-- end table form -->
   </div>   
  </main>
</body>
</html>
<?php } 
else{
  if( $_SESSION['ROLE']==1){
  header('location:index.php');
  die();
  }
}

