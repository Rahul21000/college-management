<?php
include('header.php');
include('sidebar.php');
require('db.php');
function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data; 
}

if(isset($_POST['submit'])){
  $app=test_input($_POST['app']);
  $reason=test_input($_POST['reason']);
  $fromm=test_input($_POST['fromm']);
  $too=test_input($_POST['too']);
  
  $sql = "insert into apply(app,reason,fromm,too)values('$app','$reason','$fromm','$too')";
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
        <li class="breadcrumb-item active">Apply leave</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card text-center" style="width: 100%;">
    <div class="modal" id="add" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">Apply for leave</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="row g-3 needs-validation" id="sub" novalidate  method="POST" action="<?php $_SERVER["PHP_SELF"] ?>" id="sub">
              <div class="form-row">
                  <div class="form-group col-4">
                    <label for="emai">Application no.</label>
                    <input type="text" name="app" class="form-control" id="emai " placeholder="enter app. no." required>
                  </div>
                  <div class="form-group col-8">
               <label for="depa">Reason</label>
               <input type="text" class="form-control" name="reason" id="depa" required>
             </div>
                  <div class="form-group col-auto">
                   <label for="date">From</label>
                   <input type="date" class="form-control" name="fromm" id="date"required>
                 </div>
                 <div class="form-group col-auto">
                   <label for="time">To</label>
                   <input type="date" class="form-control" name="too" id="time"required>
                 </div>
               </div>
           </form>
            <div class="modal-footer">
            <button type="submit" form="sub" class="btn btn-primary" name="submit">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="edit" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
         <div class="modal-header">
         <h6 class="modal-title">EDIT TIME TABLE</h6>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
             </button>
        </div>
           <div class="modal-body">
                 <form class="row g-3 needs-validation" novalidate  method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
     
                       <div class="form-row">
                            <div class="form-group col-6">
                              <label for="names">Application no.</label>
                              <input type="text" class="form-control" id="names">
                            </div>
                            <div class="form-group col-4">
                             <label for="subjs">Reason</label>
                             <input type="text" class="form-control" name="sub" id="subjs" >
                           </div>
                            
                            <div class="form-group col-3">
                         <label for="date">From</label>
                         <input type="text" class="form-control" name="fromm" id="fr" placeholder="hh:mm">
                       </div>
                       <div class="form-group col-3">
                         <label for="date">To</label>
                         <input type="text" class="form-control" name="too" id="tt" placeholder="hh:mm">
                       </div>
                   </div>
                 </form>

                </div>
                <div class="modal-footer">
                <button type="button" name="edit" class="btn btn-primary" >Save changes</button>
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
         Are you want too delete ?
       </div>
       <div class="modal-footer">
         <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" name="remove" class="btn btn-primary">yes!delete it</button>
       </div>
     </div>
   </div>
 </div> 
<div class="card-header justify-content-center"><button class="btn btn-primary badge-pill"  style="height:30px; font-size:small;"data-toggle="modal" data-target="#add">Apply Leave</button></div>
<div class="card-body" style="width: 100%;">
  <div class="col-md-12"><h6>Time Table List Details</h6></div>
    <div class="container">
      <table class="table table-striped  table-center table-sm table-hover" >
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>application no.</th>
            <th>Reason</th>
            <th>From</th>
            <th>To</th>
            <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
           $sql="select * from apply";
            $res = mysqli_query($conn,$sql) or die("connection faild.");
            $sno=0;
            while($row = mysqli_fetch_assoc($res)){
              $sno=$sno+1;
           ?>
           <tr style="font-size:small">
            <td> <?php "echo $sno" ?> </td>
            <td> <?php echo $row['app'] ?> </td>
            <td> <?php echo $row['reason'] ?> </td>
            <td> <?php echo $row['fromm'] ?> </td>
            <td> <?php echo $row['too'] ?> </td>
            <!-- <td ><button class="btn btn-success badge-pill" style="height:30px; font-size:x-small;" data-toggle="modal" data-target="#edit">EDIT</button></td>
            <td><button class="btn btn-danger badge-pill" style="height:30px; font-size:x-small;"data-toggle="modal" data-target="#del">DELETE</button></td> -->
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
  edi=document.getElementById('edit');
  Array.fromm(edi).forEach(element);{
    element.addeventListener("click",(e)=>{
    console.log("edit",);
    tr=e.target.parentNode.parentNode;
    application=getElementByTagName("td")[0].innerText;
    subject=getElementByTagName("td")[3].innerText;
    semester=getElementByTagName("td")[5].innerText;
    date=getElementByTagName("td")[7].innerText;
    obtain=getElementByTagName("td")[8].innerText;
    console.log(application,subject,semester,date,obtain);
    ap.value=application;
    subj.value=subject;
    semest.value=semester;
    semest.value=date;
    dat.value=obtainm;
    $('#edit').modal('toggle');
    });
  };

</script>

</html>