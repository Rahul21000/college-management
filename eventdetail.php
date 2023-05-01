<?php
include('header.php');
if( $_SESSION['ROLE']==2 ||  $_SESSION['ROLE']==1 ){
include('sidebar.php');
require('db.php');
if(isset($_POST['deleve'])){
  $id=$_POST['deleve'];
  $sql ="delete from event where id='$id'";
  mysqli_query($conn,$sql) or die("connection faild.");
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['editeve'])){
  $id=$_POST['editeve'];
  $name=$_POST['name'];
  $time=$_POST['time'];
  $date=$_POST['date'];
  $venue=$_POST['venue'];
  $sql = "update event set name='$name',time='$time',date='$date',venue='$venue' where id='$id' ";
  mysqli_query($conn,$sql) or die("connection faild.");
}
  else{
  if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $time=$_POST['time'];
  $date=$_POST['date'];
  $venue=$_POST['venue'];
  $sql = "insert into event(name,time,date,venue) values('$name','$time','$date','$venue')";
  mysqli_query($conn,$sql) or die("connection faild.");
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
        <li class="breadcrumb-item active">Add event</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <div class="card text-center" style="width: 100%;">
       <div class="modal" id="add" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
         <div class="modal-header">
         <h6 class="modal-title">ADD EVENT</h6>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
             </button>
        </div>
           <div class="modal-body">
                <form class="row g-3 needs-validation" id="sub" novalidate  method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
                     <div class="form-row">
                        <div class="form-group col-auto">
                          <label for="eve">Event name</label>
                          <input type="text" class="form-control" name="name" id="eve " placeholder="enter name">
                        </div>
                        <div class="form-group col-auto">
                         <label for="ven">Venue</label>
                         <textarea name="venue" id="ven" cols="22" rows="4"></textarea>
                       </div>
                        <div class="form-group col-auto">
                         <label for="tim">Time</label>
                         <input type="time" class="form-control" name="time" id="tim" placeholder="hh:mm">
                       </div>
                       <div class="form-group col-auto">
                         <label for="dat">Date</label>
                         <input type="date" class="form-control" name="date" id="dat" placeholder="hh:mm">
                       </div>
                        
                   </div>
               </form>
               </div>
                  <div class="modal-footer">
                  <button type="submit" form="sub" class="btn btn-primary" name="submit">Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
       </div>
   </div>
</div>
<div class="modal" id="edi" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">EDIT EVENT</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="edit" novalidate  method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
         <input type="hidden" name="editeve"id="editeve">
        <div class="form-row">
            <div class="form-group col-auto">
              <label for="events">Event name</label>
              <input type="text" class="form-control" name="name" id="events" required>
            </div>
            <div class="form-group col-auto">
              <label for="venues">Venue</label>
              <textarea name="venue" id="venues" cols="22" rows="4" required></textarea>
            </div>
            <div class="form-group col-auto">
              <label for="times">Time</label>
              <input type="time" class="form-control" name="time" id="times"required >
            </div>
            <div class="form-group col-auto">
              <label for="dates">Date</label>
              <input type="date" class="form-control" name="date" id="dates" required >
            </div>
          </div>
        </form>
     </div>
      <div class="modal-footer">
       <button type="submit" form="edit" class="btn btn-primary">Save changes</button>
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
   </div>
 </div>
 <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="de" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="del">DELETE DATA</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
       <form id="delete" method="POST" action="<?php $_SERVER["PHP_SELF"]?>">
        <input type="hidden" name="deleve" id="deleve">
      </form>
       Are you want to delete ?
       </div>
       <div class="modal-footer">
         <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" form="delete" class="btn btn-primary">yes!delete it</button>
       </div>
     </div>
   </div>
 </div> 
 <div class="card-header justify-content-center"><h6>List Details</h6></div>
  <div class="card-body" style="width: 100%;">
  <div class="col-md-12"><button class="btn btn-primary badge-pill float-right"  style="height:30px; font-size:small;"data-toggle="modal" data-target="#add">ADD</button></div>
    <div class="container">
      <table class="table table-striped  table-center table-sm  table-hover" >
        <thead class="table-dark">
            <tr style="padding: 30px;">
                <th>S.No</th>
                <th>Event</th>
                <th>Time</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           <?php
          $sql="select * from event";
           $res = mysqli_query($conn,$sql) or die("connection faild.");
            $sno=0;
            while($row=mysqli_fetch_assoc($res)){
              $sno=$sno+1;
           ?>  
         <tr>
           <th> <?php echo "$sno" ?></th>
           <td> <?php echo $row['name'] ?> </td>
           <td> <?php echo $row['time'] ?> </td>
           <td> <?php echo $row['date'] ?> </td>
           <td> <?php echo $row['venue']?> </td>
           <td ><button class=" editt btn btn-success badge-pill " style="height:30px; font-size:x-small; " data-toggle="modal" data-target="#edi" id="<?php echo $row['id'] ?>">EDIT</button></td>
           <td><button class="delett btn btn-danger badge-pill " style="height:30px; font-size:x-small;" data-toggle="modal" data-target="#del" id="<?php echo $row['id'] ?>">DELETE</button></td>
         </tr>
         <?php
         }
         ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</main>
</body>
<script>
  edited=document.getElementsByClassName('editt');
  Array.from(edited).forEach((element)=>{
    element.addEventListener("click",(e)=>{
    console.log("editt",);
    tr=e.target.parentNode.parentNode;
    event=tr.getElementsByTagName("td")[0].innerText;
    time=tr.getElementsByTagName("td")[1].innerText;
    date=tr.getElementsByTagName("td")[2].innerText;
    vanue=tr.getElementsByTagName("td")[3].innerText;
    console.log(event,time,date,vanue);
    events.value=event;
    times.value=time;
    dates.value=date;
    venues.value=vanue;
    editeve.value=e.target.id;
    console.log(e.target.id);
     })
  })
  deleted=document.getElementsByClassName('delett');
  Array.from(deleted).forEach((element)=>{
    element.addEventListener("click",(e)=>{
    console.log("delett");
    deleve.value=e.target.id;
    console.log(e.target.id);
    })
    })   
 
</script>
</html>
<?php } 
else{
  if( $_SESSION['ROLE']==1){
  header('location:index.php');
  die();
  }
}
