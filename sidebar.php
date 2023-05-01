<?php 
  //session_start(); 
if(!isset($_SESSION['IS_LOGIN'])){
  header('location:login.php');
  die();
}
  ?>
<aside id="sidebar" class="sidebar">
<ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
   <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#Student-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-people"></i><span>Student</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="Student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="Student-alerts.html">
          <i class="bi bi-circle"></i><span>Attendance</span>
        </a>
      </li>
      <li>
        <a href="interform.php">
          <i class="bi bi-circle"></i><span>Check internal marks</span>
        </a>
      </li>
      <li>
        <a href="sfform.php">
          <i class="bi bi-circle"></i><span>Faculty details</span>
        </a>
      </li>
      <li>
        <a href="timeform.php">
          <i class="bi bi-circle"></i><span>Time table</span>
        </a>
      </li>
      <li>
        <a href="notesform.php">
          <i class="bi bi-circle"></i><span>Access notes</span>
        </a>
      </li>
      <li>
        <a href="sgroup.php">
          <i class="bi bi-circle"></i><span>Group</span>
        </a>
      </li>
      <li>
        <a href="Student-list-group.html">
          <i class="bi bi-circle"></i><span>Voting</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <?php if( $_SESSION['ROLE']==2 ||  $_SESSION['ROLE']==1 ){?>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#Faculty-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-plus"></i><span>Faculty</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="Faculty-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
     <li>
        <a href="Faculty-elements.html">
          <i class="bi bi-circle"></i><span>Add attendance</span>
        </a>
      </li>
      <li>
        <a href="editmark.php">
          <i class="bi bi-circle"></i><span>Add marks</span>
        </a>
      </li>
      <li>
        <a href="edittime.php">
          <i class="bi bi-circle"></i><span>Add time_table</span>
        </a>
      </li>
      <li>
        <a href="editevent.php">
          <i class="bi bi-circle"></i><span>Add Event</span>
        </a>
      </li>
      <li>
        <a href="editcource.php">
          <i class="bi bi-circle"></i><span>Add cource</span>
        </a>
      </li>
      <li>
        <a href="editnotes">
          <i class="bi bi-circle"></i><span>Upload notes</span>
        </a>
      </li>
      <li>
        <a href="fgroup">
          <i class="bi bi-circle"></i><span>Group</span>
        </a>
      </li>
      <li>
        <a href="Faculty-validation.html">
          <i class="bi bi-circle"></i><span>Generate report</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
      
      
  <?php } ?>
  
  <?php if( $_SESSION['ROLE']==1){?>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#Admin-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="Admin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="idissue.php">
          <i class="bi bi-circle"></i><span>Id issue</span>
        </a>
      </li>
      <li>
        <a href="deluser.php">
          <i class="bi bi-circle"></i><span>Delete user</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
  <?php  } ?>


  <li class="nav-heading">More</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="notice.php">
      <i class="bi bi-easel"></i>
      <span>Notice board</span>
    </a>
  </li><!-- End Notice board Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="eventdetail.php">
      <i class="bi bi-calendar3-event"></i>
      <span>Event</span>
    </a>
  </li><!-- End Event Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="courceform.php">
      <i class="bi bi-book"></i>
      <span>Cource</span>
    </a>
  </li><!-- End research Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="research.php">
      <i class="bi bi-cloud-arrow-down"></i>
      <span>Research/Project</span>
    </a>
  </li><!-- End research Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="contri.php">
      <i class="bi bi-hand-thumbs-up"></i>
      <span>Contribution</span>
    </a>
  </li><!-- End contribuion Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="leave.php">
      <i class="bi bi-eyedropper"></i>
      <span>Apply leave</span>
    </a>
  </li><!-- End applyleave Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="issues.php">
      <i class="bi bi-check2"></i>
      <span>Raise issues</span>
    </a>
  </li><!-- End Contact Page Nav -->
 <li class="nav-item">
    <a class="nav-link collapsed" href="contact.php">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->
 <li class="nav-item">
    <a class="nav-link collapsed" href="about.php">
      <i class="bi bi-question-circle"></i>
      <span>About</span>
    </a>
  </li><!-- End About page Nav -->
 </ul>
</aside><!-- End Sidebar-->

