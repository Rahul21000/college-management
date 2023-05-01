<?php
include('header.php');
include('sidebar.php');
require('db.php');
if(isset($_POST['submit'])){
  $class=$_POST['class'];
  $sem=$_POST['sem'];
  $sql = "select faculty.name,timetable.sub,timetable.class,timetable.sem,faculty.depart,faculty.con,faculty.email from faculty,timetable where timetable.class='$class'and timetable.sem='$sem' ";
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
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <style>a{
    text-decoration: none;
  }
  a:hover{
    text-decoration: none;
  }</style>

</head>
<body>
<main id="main" class="main ">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Faculty details</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <div class="card text-center" style="width: 100%;">
        <div class="card-body">
            <div class="container ">
                <table class="table table-striped table-center table-sm" >
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Class</th>
                            <th>Semeter</th>
                            <th>Department</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php     
                       while($row = mysqli_fetch_assoc($res)){
                      ?>
                      <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['sub'] ?></td>
                        <td><?php echo $row['class'] ?></td>
                        <td><?php echo $row['sem'] ?></td>
                        <td><?php echo $row['depart'] ?></td>
                        <td><?php echo $row['con'] ?></td>
                        <td><?php echo $row['email'] ?></td>
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