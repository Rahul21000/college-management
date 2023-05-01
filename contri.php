<?php
include('header.php');
include('sidebar.php');
require('db.php');
if(isset($_POST['app'])){
 $title=test_input($_POST['title']);
 $desc=test_input($_POST['desc']);
 $sem=test_input($_POST['sem']);
 $img=test_input($_POST['images']);
 $sql = "insert into contribution(app,title,desc,sem,images) values('$app','$title','$desc','$sem','$images')";
 mysqli_query($conn,$sql) or die("connection faild.");
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
        <li class="breadcrumb-item active">Contribution</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="card text-center" style="width: 100%;">
    <div class="modal" id="add" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h6 class="modal-title">Contribution</h6>
           <button type="button" class="close" row-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="row g-3 needs-validation" novalidate  method="POST" action="<?php ["PHP_SELF"];?> ">
              <div class="form-row">
               <div class="form-group col-auto">
                  <label for="roll">Application no.</label>
                  <input type="text" name="app" class="form-control" id="roll">
                </div>
                <div class="form-group col-auto">
                   <label for="roll">Title</label>
                   <input type="text" class="form-control" name="title" id="roll" placeholder="name">
                 </div>
                <div class="form-group col-auto">
                  <label for="dec">Description</label>
                  <textarea name="text" name="desc" id="dec" cols="22" rows="2" placeholder="eg.books,notes,any type help"> </textarea>
                </div>
                <div class="form-group col-auto">
                  <label for="semest">Semester</label>
                  <select id="semest" class="form-control" name="sem">
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
                <div class="form-group col-auto">
                  <label for="im">Image</label>
                  <input type="image" name="img" id="im">
                </div>
                
               </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" name="submit">Submit</button>
            <button type="button" class="btn btn-secondary" row-dismiss="modal">Close</button>
         </div>
       </div>
      </div>
  </div>
  <div class="col-md-12 p-3"><h6>Contribution List</h6>
    <div class="card-body" style="width: 100%;">
    <div class="card-header text-center"><button class="btn btn-primary badge-pill"  row-toggle="modal" row-target="#add">Contribute</button></div>
  </div>
  <div class="container">
    <table class="table table-striped  table-center table-sm table-hover ">
      <thead class="table-dark" >
        <tr >
          <th>#</th>
          <th>app</th>
          <th>Title</th>
          <th>Description</th>
          <th>Semester</th>
          <th>Date</th> 
          <th>Image</th>
         </tr>
      </thead>
      <tbody>
        <?PHP 
        $sql="select * from contribution";
        $res = mysqli_query($conn,$sql) or die("connection faild.");
        $sno=0;
          while($row = mysqli_fetch_assoc($res)){
            $sno=$sno+1;
        ?>
        <tr>
          <td><?php echo "$sno" ?></td>
          <td><?php echo $row['app'] ?></td>
          <td><?php echo $row['title'] ?></td>
          <td><?php echo $row['desc'] ?></td>
          <td><?php echo $row['sem'] ?></td>
          <td><?php echo $row['date'] ?></td>
          <td> <?php echo '<img src="data:image/png;base64,'.base64_encode($row['images']).' " style="width:60px;height:80px;"/>' ?> </td>
          
        </tr>
        <?PHP
          }
         ?>
      </tbody>
    </table>
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