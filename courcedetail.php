<?php
include('header.php');
include('sidebar.php');
require('db.php');
if(isset($_POST['submit'])){
    $class=test_input($_POST['class']);
    $sem=test_input($_POST['sem']);
    $sql = "select cid,sub,author,class,sem,depart from  cource where class='$class' and sem='$sem'";
    $res = mysqli_query($conn,$sql) or die("connection faild.");
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
  <link href="assets/vendor/simple-rowtables/style.css" rel="stylesheet">
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
        <li class="breadcrumb-item active">Cource offered</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

       <div class="card-header"><h6>Cource Details</h6></div>
        <div class="card-body" style="width: 100%;">
            <div class="container">
                <table class="table table-striped  table-center  " >
                    <thead class="table-dark">
                        <tr>
                            <th>S No.</th>
                            <th>Cource Id</th>
                            <th>Subject</th>
                            <th>Author</th>
                            <th>Class</th>
                            <th>Semester</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php  
                         $sno=0;
                          while($row = mysqli_fetch_assoc($res)){
                          $sno=$sno+1;  
                      ?>            
                     <tr >
                         <td><?php echo "$sno" ?></td>
                         <td><?php echo $row['cid'] ?></td>
                         <td><?php echo $row['sub'] ?></td>
                         <td><?php echo $row['author'] ?></td>
                         <td><?php echo $row['class'] ?></td>
                         <td><?php echo $row['sem'] ?></td>
                         <td><?php echo $row['depart'] ?></td>
                     </tr>
                        <?php
                          }
                         }
                        else
                        {echo "no record found !";}
                       ?>
              
                   </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
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