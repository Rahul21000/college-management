<?php
include('header.php');
if( $_SESSION['ROLE']==2 ||  $_SESSION['ROLE']==1 ){
include('sidebar.php');
require('db.php');
if(isset($_POST['snodel'])){
  $sno=$_POST['snodel'];
  $sql ="delete from timetable where sno='$sno'";
  mysqli_query($conn,$sql) or die("connection faild.");
}
function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data; 
}

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['snoedit'])){
    $sno=test_input($_POST['snoedit']);
    $name=test_input($_POST['name']);
    $sub=test_input($_POST['sub']);
    $class=test_input($_POST['class']);
    $sem=test_input($_POST['sem']);
    $fromm=test_input($_POST['fromm']);
    $too=test_input($_POST['too']);

    $sql ="update timetable  set name='$name',sub='$sub', class='$class', sem='$sem', fromm='$fromm', too='$too' where sno='$sno'";
   mysqli_query($conn,$sql) or die("connection faild.");  
  }
else {
  if(isset($_POST['submit'])){
    $name=test_input($_POST['name']);
    $sub=test_input($_POST['sub']);
    $class=test_input($_POST['class']);
    $sem=test_input($_POST['sem']);
    $fromm=test_input($_POST['fromm']);
    $too=test_input($_POST['too']);
    
    $sql = "insert into timetable(name,sub,class,sem,fromm,too)values('$name','$sub', '$class', '$sem', '$fromm', '$too')";
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
</head>
<body>
  <main id="main" class="main ">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Add time_table</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card text-center" style="width: 100%;">
    <div class="modal" id="add" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">ADD TIME TABLE</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="row g-3 needs-validation" id="sub" novalidate  method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" id="sub">
              <div class="form-row">
              <div class="form-group col-6">
                 <label for="fac">Faculty Name</label>
                   <input type="text" class="form-control" name="name" id="fac">
                 </div>
               
               <div class="form-group col-3">
                 <label for="subj">Subject</label>
                   <input type="text" class="form-control" name="sub" id="subj">
                 </div>
                 <div class="form-group col-3">
                    <label for="clas">Class</label>
                     <select id="clas" class="form-control" name="class">
                       <option selected>select Class</option>
                       <option value="bca">bca</option>
                       <option value="mca">mca</option>
                       <option value="mba">mba</option>
                       <option value="bsc cs">bsc cs.</option>
                       <option value="msc cs">msc cs.</option>
                    </select>
                 </div> 
                 <div class="form-group col-4">
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
                
                <div class="form-group col-4">
                  <label for="dat">From</label>
                  <input type="time" class="form-control" name="fromm" id="dat" placeholder="hh:mm">
                </div>
                <div class="form-group col-4">
                  <label for="dat">To</label>
                  <input type="time" class="form-control" name="too" id="dat" placeholder="hh:mm">
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
             
     <div class=" modal" id="edi"  tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
         <div class="modal-header">
         <h6 class="modal-title">EDIT TIME TABLE</h6>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
             </button>
        </div>
           <div class="modal-body">
              <form class=" row g-3 needs-validation" id="edit" novalidate  method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
                <input type="hidden" name="snoedit" id="snoedit">
                <div class="form-row">
                <div class="form-group col-6">
                    <label for="faculs">Faculty Name</label>
                    <input type="text" class="form-control" name="name" id="faculs" >
                  </div>
                  <div class="form-group col-3">
                 <label for="subjects">Subject</label>
                   <input type="text" class="form-control" name="sub" id="subjects">
                 </div>
               
                  <div class="form-group col-3">
                    <label for="classes">Class</label>
                     <select id="classes" class="form-control" name="class">
                       <option selected>select Class</option>
                       <option value="bca">bca</option>
                       <option value="mca">mca</option>
                       <option value="mba">mba</option>
                       <option value="bsc cs">bsc cs.</option>
                       <option value="msc cs">msc cs.</option>
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label for="semesters">Semester</label>
                    <select id="semesters" class="form-control" name="sem">
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
                  <div class="form-group col-4">
                    <label for="dates">From</label>
                    <input type="time" class="form-control" name="fromm" id="dates" placeholder="hh:mm">
                  </div>
                  <div class="form-group col-4">
                    <label for="times">To</label>
                    <input type="time" class="form-control" name="too" id="times" placeholder="hh:mm">
                  </div>
                </div>
             </form>
           </div>
            <div class="modal-footer">
            <button type="submit" form="edit" class="btn btn-primary" >Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
       </div>
     </div>
<div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="de" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">DELETE DATA</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        <form id="delete" method="POST" action="<?php $_SERVER["PHP_SELF"];?>">
        <input type="hidden" name="snodel" id="snodel">
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
<div class="card-header"><h6>Time Table List Details</h6></div>
<div class="card-body" style="width: 100%;">
  <div class="col-md-12"><button class="btn btn-primary float-right badge-pill"  style="height:30px; font-size:x-small;"data-toggle="modal" data-target="#add">ADD</button></div>
    <div class="container">
      <table class="table table-striped  table-center table-sm table-hover" >
        <thead class="table-dark">
          <tr>
            <th>S.No</th>
            <th>Faculty</th>
            <th>Subject</th>
            <th>Class</th>
            <th>Semester</th>
            <th>From</th>
            <th>To</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
           $sql="select * from timetable";
            $res = mysqli_query($conn,$sql) or die("connection faild.");
            $sno=0;
            while($row = mysqli_fetch_assoc($res)){
              $sno=$sno+1;
           ?>
           <tr style="font-size:small">
            <th> <?php echo "$sno" ?> </th>
            <td> <?php echo $row['name'] ?> </td>
            <td> <?php echo $row['sub'] ?> </td>
            <td> <?php echo $row['class'] ?> </td>
            <td> <?php echo $row['sem'] ?> </td>
            <td> <?php echo $row['fromm'] ?> </td>
            <td> <?php echo $row['too'] ?> </td>
            <td ><button  class=" editt btn btn-success badge-pill" style="height:30px; font-size:x-small;" data-toggle="modal" data-target="#edi" id="<?php echo $row['sno']?>" >EDIT</button></td>
            <td><button class="delett btn btn-danger badge-pill" style="height:30px; font-size:x-small;" data-toggle="modal" data-target="#del" id="<?php echo $row['sno']?>">DELETE</button></td>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  edited=document.getElementsByClassName('editt');
  Array.from(edited).forEach((element)=>{
    element.addEventListener("click",(e)=>{
    console.log("editt");
    tr=e.target.parentNode.parentNode;
    name=tr.getElementsByTagName("td")[0].innerText;
    subject=tr.getElementsByTagName("td")[1].innerText;
    clas=tr.getElementsByTagName("td")[2].innerText;
    semester=tr.getElementsByTagName("td")[3].innerText;
    date=tr.getElementsByTagName("td")[4].innerText;
    date1=tr.getElementsByTagName("td")[5].innerText;
    console.log(name,subject,clas,semester,date,date1);
     faculs.value=name;
     subjects.value=subject;
     classes.value=clas;
     semesters.value=semester;
     dates.value=date;
     times.value=date1;
     snoedit.value=e.target.id;
     console.log(e.target.id);
    })
  })
  
  deleted=document.getElementsByClassName('delett');
  Array.from(deleted).forEach((element)=>{
    element.addEventListener("click",(e)=>{
    console.log("delett");
    snodel.value=e.target.id;
    console.log(e.target.id);
    })
    })   
</script>
</body>
</html>
<?php } 
else{
  if( $_SESSION['ROLE']==1){
  header('location:index.php');
  die();
  }
}
?>

