<?php
include('header.php');
if( $_SESSION['ROLE']==2 ||  $_SESSION['ROLE']==1 ){
include('sidebar.php');
require('db.php');
if(isset($_POST['codel'])){
  $cid=$_POST['codel'];
  $sql ="delete from cource where cid='$cid'";
  mysqli_query($conn,$sql) or die("connection faild.");
}
function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data; 
}

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['coedit'])){
  $coid = test_input($_POST['coedit']);
  $cid = test_input($_POST['cid']);
  $sub = test_input($_POST['sub']);
  $author =test_input($_POST['author']);
  $class = test_input($_POST['class']);
  $sem = test_input($_POST['sem']);
  $depart = test_input($_POST['depart']);
  $sql="update cource set cid='$cid', sub='$sub', author='$author', class='$class' , sem='$sem' , depart='$depart'where cid='$coid'";
  mysqli_query($conn,$sql) or die("connecton failed");
  }
  else{
  if(isset($_POST['submit'])){
  $cid = test_input($_POST['cid']);
  $sub = test_input($_POST['sub']);
  $author = test_input($_POST['author']);
  $class = test_input($_POST['class']);
  $sem = test_input($_POST['sem']);
  $depart = test_input($_POST['depart']);
 $sql="insert into cource(cid,sub,author,class,sem,depart) values('$cid','$sub','$author','$class','$sem','$depart')";
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
        <li class="breadcrumb-item active">Add cource</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card text-center" style="width: 100%;">
    <div class="modal" id="add" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-header">
           <h6 class="modal-title">ADD COURCE</h6>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
         </div>
          <div class="modal-body">
            <form class="row g-3 needs-validation" id="sub" novalidate  method="POST" action="<?php $_SERVER["PHP_SELF"];?>">
              <div class="form-row">
                <div class="form-group col-auto">
                  <label for="cour">Cource Id</label>
                  <input type="text" name="cid" class="form-control" id="cour ">
                </div>
                <div class="form-group col-auto">
                  <label for="subj">Subject name</label>
                  <input type="text" name="sub" class="form-control" id="subj ">
                </div>
                <div class="form-group col-12">
                <label for="auth">Author</label>
                <input type="text" name="author" class="form-control" id="auth">
               </div>
               <div class="form-group col-4">
                  <label for="depa">Department</label>
                  <select id="depa" class="form-control" name="depart">
                    <option selected>select depart</option>
                    <option value="sos computer science & application">sos computer science & application</option>
                    <option value="sos chemical sales & marketing management">sos chemical sales & marketing management</option>
                  </select>
                </div>
               <div class="form-group col-4">
                  <label for="class">Class</label>
                  <select id="class" class="form-control" name="class">
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
         <h6 class="modal-title">EDIT COURCE</h6>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
        </div>
        <div class="modal-body">
          <form class="row g-3 needs-validation" id="edit" novalidate  method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
            <input type="hidden" name="coedit" id="coedit">
           <div class="form-row">
              <div class="form-group col-auto">
                <label for="cources">Cource Id</label>
                <input type="text" name="cid" class="form-control" id="cources">
              </div>
              <div class="form-group col-auto">
                <label for="subjects">Subject name</label>
                <input type="text" name="sub" class="form-control" id="subjects">
              </div>
              <div class="form-group col-12">
                <label for="authors">Author</label>
                <input type="text" name="author" class="form-control" id="authors">
              </div>
              <div class="form-group col-4">
                  <label for="departs">Department</label>
                  <select id="departs" class="form-control" name="depart">
                    <option selected>select semester</option>
                    <option value="sos computer science & application">sos computer science & application</option>
                    <option value="sos chemical sales & marketing management">sos chemical sales & marketing management</option>
                  </select>
                </div>
              <div class="form-group col-4">
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
        <input type="hidden" name="codel" id="codel">
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
 <div class="card-header"><h6>Cource List Details</h6></div>
    <div class="card-body" style="width: 100%;">
     <div class="col-md-12"><button class="btn btn-primary float-right badge-pill"  style="height:30px; font-size:x-small;"data-toggle="modal" data-target="#add">ADD</button></div>
      <div class="container">
        <table class="table table-striped  table-center table-sm table-hover" >
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Cource Id</th>
              <th>Subject</th>
              <th>Author</th>
              <th>Class</th>
              <th>Semester</th>
              <th>Department</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $sql="select * from cource";
                $res = mysqli_query($conn,$sql) or die("connection faild.");
                $sno=0;
               while($row=mysqli_fetch_assoc($res)){
                 $sno=$sno+1;
            ?>
            <tr style="font-size:small">
              <th> <?php echo "$sno" ?></th>
              <td> <?php echo $row['cid'] ?></td>
              <td> <?php echo $row['sub'] ?></td>
              <td> <?php echo $row['author'] ?></td>
              <td> <?php echo $row['class'] ?></td>
              <td> <?php echo $row['sem'] ?></td>
              <td> <?php echo $row['depart'] ?></td>
              <td><button class="editt btn btn-success badge-pill" style="height:30px; font-size:x-small;" data-toggle="modal" data-target="#edi" id="<?php echo $row['cid'] ?>">EDIT</button></td>
              <td><button class="delett btn btn-danger badge-pill" style="height:30px; font-size:x-small;"data-toggle="modal" data-target="#del" id="<?php echo $row['cid'] ?>">DELETE</button></td>
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
    cid=tr.getElementsByTagName("td")[0].innerText;
    subject=tr.getElementsByTagName("td")[1].innerText;
    author=tr.getElementsByTagName("td")[2].innerText;
    clas=tr.getElementsByTagName("td")[3].innerText;
    semester=tr.getElementsByTagName("td")[4].innerText;
    depart=tr.getElementsByTagName("td")[5].innerText;
    console.log(cid,subject,author,clas,semester,depart);
    cources.value=cid;
    subjects.value=subject;
    authors.value=author;
    classes.value=clas;
    semesters.value=semester;
    departs.value=depart;
    coedit.value=e.target.id;
    console.log(e.target.id);
     })
  })
  deleted=document.getElementsByClassName('delett');
  Array.from(deleted).forEach((element)=>{
    element.addEventListener("click",(e)=>{
    console.log("delett");
    codel.value=e.target.id;
    console.log(e.target.id);
    })
    })   
 

</script>

</body>
</html>
<?php } 
else{
  header('location:index.php');
  die();
}
?>
