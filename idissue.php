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

if(isset($_POST['delemail'])){
  $email=$_POST['delemail'];
  $sql ="delete from faculty where email='$email'";
  mysqli_query($conn,$sql) or die("connection faild.");
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['edits'])){
  $email=test_input($_POST['edits']); 
  $name =test_input($_POST['name']);
  $con =test_input($_POST['con']);
  $depart =test_input($_POST['depart']);
  $email =test_input( $_POST['email']);
  $pass =test_input($_POST['pass']);
  $cpass =test_input($_POST['cpass']);
  $sql="update faculty set name='$name',con='$con',depart='$depart',email='$email',pass='$pass', cpass='$cpass' where email='$email'";
  mysqli_query($conn,$sql) or die("connecton failed");
  }
  else{
  if(isset($_POST['submit'])){
  $name =test_input($_POST['name']);
  $con =test_input($_POST['con']);
  $depart =test_input($_POST['depart']);
  $email =test_input($_POST['email']);
  $pass =test_input($_POST['pass']);
  $cpass =test_input($_POST['cpass']);
 $sql="insert into faculty(name,con,depart,email,pass,cpass) values('$name','$con','$depart','$email','$pass','$cpass')";
 mysqli_query($conn,$sql) or die("connecton failed");
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
        <li class="breadcrumb-item active">Id issue</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <div class="card text-center" style="width: 100%;">
       <div class="modal" id="add" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
         <div class="modal-header">
         <h6 class="modal-title">ADD ID</h6>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
             </button>
        </div>
           <div class="modal-body">
                   <form class="row g-3 needs-validation" id="sub" novalidate  method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
                       <div class="form-row">
                            <div class="form-group col-6">
                              <label for="nam">Name</label>
                              <input type="text" class="form-control" name="name" id="nam" required>
                            </div>
                            <div class="form-group col-3">
                             <label for="mobi">Contact</label>
                             <input type="text" class="form-control" name="con" id="mobi" required>
                           </div>
                           <div class="form-group col-3">
                              <label for="depa">Department</label>
                              <select id="depa" class="form-control" name="depart" required>
                                <option selected>select semester</option>
                                <option value="sos computer science & application">sos computer science & application</option>
                                <option value="sos chemical sales & marketing management">sos chemical sales & marketing management</option>
                              </select>
                           </div> <div class="form-group col-12">
                              <label for="ema">Email</label>
                              <input type="email" class="form-control" name="email" id="ema" placeholder="email should be user id" required>
                            </div>
                            <div class="form-group col-6">
                              <label for="pas">Password</label>
                              <input type="password" class="form-control" name="pass" id="pas" required>
                            </div>
                            <div class="form-group col-6">
                              <label for="cpas">Cpassword</label>
                              <input type="password" class="form-control" name="cpass" id="cpas" required>
                            </div>
                       </div>
                 </form>

                </div>
                <div class="modal-footer">
                 <button type="submit" form="sub" class="btn btn-primary" name="submit">Generate</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
       </div>
   </div>
</div>
<div class="modal" id="edi" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
         <div class="modal-header">
         <h6 class="modal-title">EDIT ID</h6>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
             </button>
        </div>
           <div class="modal-body">
                   <form class="row g-3 needs-validation" id="edit" novalidate  method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                         <input type="hidden" name="edits" id="edits">
                       <div class="form-row">
                           <div class="form-group col-6">
                              <label for="names">Name</label>
                              <input type="text" name="name" class="form-control" id="names">
                            </div>
                            <div class="form-group col-3">
                              <label for="conts">Contact</label>
                              <input type="text" class="form-control" name="con" id="conts">
                            </div>
                            <div class="form-group col-3">
                              <label for="departs">Department</label>
                              <select  class="form-control" name="depart" id="departs">
                                <option selected>select semester</option>
                                <option value="sos computer science & application">sos computer science & application</option>
                                <option value="sos chemical sales & marketing management">sos chemical sales & marketing management</option>
                              </select>
                           </div>
                          <div class="form-group col-12">
                              <label for="emails">Email</label>
                              <input type="email" class="form-control" name="email" id="emails">
                            </div>
                            <div class="form-group col-6">
                              <label for="passwords">Password</label>
                              <input type="password" class="form-control" name="pass" id="passwords">
                            </div>
                            <div class="form-group col-6">
                              <label for="cpasswords">Cpassword</label>
                              <input type="password" class="form-control" name="cpass" id="cpasswords">
                            </div>
                            </div>
                   </form>
                </div>
                <div class="modal-footer">
                  <button type="submit" form="edit" name="edits" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
           </div>
       </div>
    </div>
    <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="de" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="del">DELETE ID</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
       <form id="delete" method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="delemail" id="delemail">
      </form>
         Are you want to delete ?
       </div>
       <div class="modal-footer">
         <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit"form="delete"  name="remove" class="btn btn-primary">yes!delete it</button>
       </div>
     </div>
   </div>
 </div>
    <div class="card-header"><h6>Id Issue List</h6></div>
        <div class="card-body" style="width: 100%;">
             
                <div class="col-md-12"><button class="btn btn-primary float-right badge-pill"  style="height:30px; font-size:x-small;"data-toggle="modal" data-target="#add">ADD</button>
                
             </div>
            <div class="container">
                <table class="table table-striped  table-center table-sm table-responsive" >
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>User Id</th>
                            <th>Password</th>
                            <th>Confirm password</th>
                            <th>Contact</th>
                            <th>Department</th>
                            <th>jiwaji</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql="select * from faculty";
                       $res = mysqli_query($conn,$sql) or die("connection faild.");
                       $sno=0;
                       while($row = mysqli_fetch_assoc($res)){
                         $sno=$sno+1;
                      ?>
                     <tr style="font-size:small">
                         <th><?php echo "$sno"?></th>
                         <td><?php echo $row['name']?></td>
                         <td><?php echo $row['email']?></td>
                         <td><?php echo $row['pass']?></td>
                         <td><?php echo $row['cpass']?></td>
                         <td><?php echo $row['con']?></td>
                         <td><?php echo $row['depart']?></td>
                         <td><?php echo $row['uni']?></td>
                         <td><?php echo $row['date']?></td>
                        <td ><button class=" editt btn btn-success badge-pill" style="height:30px; font-size:x-small;" data-toggle="modal" data-target="#edi" id="<?php echo $row['email']?>">EDIT</button></td>
                         <td><button class="delett btn btn-danger badge-pill" style="height:30px; font-size:x-small;" data-toggle="modal" data-target="#del" id="<?php echo $row['email']?>">DELETE</button></td>
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
    console.log("editt",);
    tr=e.target.parentNode.parentNode;
    nam=tr.getElementsByTagName("td")[0].innerText;
    emailed=tr.getElementsByTagName("td")[1].innerText;
    passe=tr.getElementsByTagName("td")[2].innerText;
    cpasse=tr.getElementsByTagName("td")[3].innerText;
    cont=tr.getElementsByTagName("td")[4].innerText;
    depar=tr.getElementsByTagName("td")[5].innerText;
    console.log(nam,emailed,passe,cpasse,cont,depar);
    names.value=nam;
    emails.value=emailed;
    passwords.value=passe;
    cpasswords.value=cpasse;
    conts.value=cont;
    departs.value=depar;
    edits.value=e.target.id;
    console.log(e.target.id);
    
    })
  })
  deleted=document.getElementsByClassName('delett');
  Array.from(deleted).forEach((element)=>{
    element.addEventListener("click",(e)=>{
    console.log("delett");
    delemail.value=e.target.id;
    console.log(e.target.id);
    })
    })   

</script>
</body>
</html>