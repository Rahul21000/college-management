<?php
include('header.php');
if( $_SESSION['ROLE']==2 ||  $_SESSION['ROLE']==1 ){
include('sidebar.php');
require('db.php');
$val='';
if(isset($_POST['appdel'])){
  $app=$_POST['appdel'];
  $sql ="delete from mark where app='$app'";
  mysqli_query($conn,$sql) or die("connection faild.");
}
function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data; 
}

if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST['appedit'])){
$apoid = $_POST['appedit'];
$app = $_POST['app'];
$sub = test_input($_POST['sub']);
$obt = test_input($_POST['obt']);
$sem = $_POST['sem'];
$year = $_POST['year'];
$sql="update mark set sub='$sub', obt='$obt', year='$year' where app='$apoid'";
mysqli_query($conn,$sql) or die("connecton failed");
}

else{
  if(isset($_POST['submit'])){
   $count=0;
   while($count<$_POST['num']){            
$app = $_POST['app'][$count];
$sem = $_POST['sem'][$count];
$sub =test_input($_POST['sub'][$count]);
$obt = test_input($_POST['obt'][$count]);
//   if($counts<=15){
//     $obt =$counts;
//   }
// else{
//     $val="value should be less then or eqaul to 15";
    
//     }


$sql="insert into mark(app,sub,sem,obt)values('$app','$sub','$sem','$obt')";
mysqli_query($conn,$sql) or die("connecton failed");
$count++;
   } 
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
        <li class="breadcrumb-item active">Add mark</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card text-center" style="width: 100%;">
  <div class="modal" id="show" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h6 class="modal-title">Add mark</h6>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="row g-3 needs-validation" id="shows" novalidate  method="POST" action="editmark1.php">
            <div class="form-row">
            <div class="form-group col-4">
              <label for="depar">Department</label>
              <select id="depar" class="form-control" name="depart"required>
                <option selected>select depart</option>
                <option value="sos computer science & application">sos computer science & application</option>
                <option value="sos chemical sales & marketing management">sos chemical sales & marketing management</option>
              </select>
            </div>
            <div class="form-group col-4">
              <label for="clas">Class</label>
              <select id="clas" class="form-control" name="class" required>
                <option selected>select class</option>
                <option value="bca">bca</option>
                <option value="mca">mca</option>
                <option value="mba">mba</option>
                <option value="bsc cs">bsc cs.</option>
                <option value="msc cs">msc cs.</option>
              </select>
            </div>
               <div class="form-group col-4">
                <label for="semest">Semester</label>
                <select id="semest" class="form-control" name="sem" required>
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
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="shows" class="btn btn-success"  name="showed" >Open</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
     </div>
   </div>
  </div>
  <!-- end show modal -->
  <div class="modal" id="edi" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Edit marks</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="row g-3 needs-validation" id="edit" novalidate  method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
          <input type="hidden" name="appedit"id="appedit">
            <div class="form-row">
              <div class="form-group col-3">
                  <label for="appls">Application no.</label>
                  <input type="text" class="form-control" id="appls" name="app" readonly>
              </div>
              <div class="form-group col-2">
                <label for="semesters">Semester</label>
                <select id="semesters" class="form-control" name="sem" readonly>
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
             <div class="form-group col-7">
                <label for="subjects">Subject</label>
                <input type="text" class="form-control" id="subjects" name="sub" required>
              </div>
              <div class="form-group col-auto">
                <label for="obtains">Obtain mark</label>
                <input type="text" class="form-control" id="obtains" name="obt" maxlength="15" required>
               </div>
               <p id="check"></p>
             <div class="form-group col-auto">
               <label for="dates">Date</label>
               <input type="date" class="form-control" name="year" id="dates" >
             </div>
            </div>
          </form>
          </div>
            <div class="modal-footer">
            <button type="submit" form="edit" class="btn btn-primary" onclick="myfunction()">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           </div>
      </div>
    </div>
  </div>
  <script> function myfunction(){
                let x=document.getElementById("obtains").value;
                let text;
                if(isNaN(x)||x<1||x>15){
                  text="mark should be equal or less than 15"; 
                }
                document.getElementById("check").innerHTML=text;
               } 
               </script>
 
 <!-- edit end modal -->
 
 <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="de" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="de">Delete data</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
       <form id="delete" method="POST" action="<?php $_SERVER["PHP_SELF"];?>">
        <input type="hidden" name="appdel" id="appdel">
      </form>
         Are you want to delete ?
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" form="delete" class="btn btn-primary">yes!delete it</button>
       </div>
     </div>
   </div>
 </div>
 <!-- delete end modal -->
 
  <div class="card-header"><h6>List Details</h6></div>
   <div class="card-body" style="width: 100%;">
    <div class="col-md-12"><button class="btn btn-primary float-right badge-pill"  style="height:30px; font-size:x-small;"data-toggle="modal" data-target="#show">ADD</button></div>
    <div class="container">
       <table class="table table-striped  table-center table-sm table-hover" id="tab">
          <thead class="table-dark">
            <tr>
              <th>S.No</th>
              <th>Application no.</th>
              <th>Subject</th>
              <th>Semeter</th>
              <th>Date</th>
              <th>Obtain</th>
              <th>Total mark</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql="select * from mark";
            $res = mysqli_query($conn,$sql) or die("connection faild.");
            $sno=0;
            while($row=mysqli_fetch_assoc($res)){
            $sno=$sno+1;
             ?>
            <tr style="font-size:small">
              <th> <?php  echo"$sno" ?></th>
              <td> <?php  echo $row['app'] ?> </td>
              <td> <?php  echo $row['sub'] ?> </td>
              <td> <?php  echo $row['sem'] ?> </td>
              <td> <?php  echo $row['year'] ?> </td>
              <td> <?php  echo $row['obt'] ?> </td>
              <td> <?php  echo $row['total'] ?> </td>
              <td ><button class=" editt btn btn-success badge-pill" style="height:30px; font-size:x-small;"data-toggle="modal" data-target="#edi" id="<?php  echo $row['app']?>" >EDIT</button></td>
              <td><button class="delett btn btn-danger badge-pill" style="height:30px; font-size:x-small;"data-toggle="modal" data-target="#del" id="<?php  echo $row['app']?>">DELETE</button></td>
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
<script>
   edited=document.getElementsByClassName('editt');
  Array.from(edited).forEach((element)=>{
    element.addEventListener("click",(e)=>{
    console.log("editt");
    tr=e.target.parentNode.parentNode;
    appl=tr.getElementsByTagName("td")[0].innerText;
    subject=tr.getElementsByTagName("td")[1].innerText;
    semester=tr.getElementsByTagName("td")[2].innerText;
    date=tr.getElementsByTagName("td")[3].innerText;
    obts=tr.getElementsByTagName("td")[4].innerText;
    console.log(appl,subject,semester,date,obts);
     appls.value=appl;
     subjects.value=subject;
     semesters.value=semester;
     dates.value=date;
     obtains.value=obts;
     appedit.value=e.target.id;
     console.log(e.target.id);
    })
  })
  deleted=document.getElementsByClassName('delett');
  Array.from(deleted).forEach((element)=>{
    element.addEventListener("click",(e)=>{
    console.log("delett");
    appdel.value=e.target.id;
    console.log(e.target.id);
    })
    })   
</script>
</body>
</html>
<?php 
 } 
else{
  if( $_SESSION['ROLE']==1){
  header('location:index.php');
  die();
  }
}
