<?php
require('db.php');
include("auth.php");

$id = $_REQUEST['id'];
$query = "SELECT * from semester where id ='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ISU-A Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/style.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="bootstrap.min.css"/>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<style type="text/css">
  #tab1 p{
    color: black;
    font-size: 30px;
    font-family: : Times new roman;
  }
  #tab2 p{
    color: black;
    font-size: 30px;
    font-family: : Times new roman;
  }
  body{
    background-color: darkgreen;
    color: black;
  }
</style>
</head>

<body>
<br>
<img BORDER=0 src="logo.png" width="130" height="110" align="LEFT" hspace="0">
<div class="header";>
  <h1 class="heading"><b>.........................ISABELA STATE UNIVERSITY ANGADANAN CAMPUS...................................</b></h1>
</div>
<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html"></a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Admin</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="registration.php"><i class="icon-user"></i> Register New Admin</a></li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Logout</a></li>
      </ul>
    </li>
  </ul>

</div>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<div id="sidebar"><a href="adminindex.php" class="visible-phone"><i class="icon icon-home"></i>Dashboard</a>
  <ul>
<li class="active"><a href="adminindex.php"><i class="icon icon-home"></i> <span>DASHBOARD</span></a> </li>
    <li class="active"><a href="viewcourse.php"><i class="icon icon-book"></i> <span>COURSES</span></a> </li>
    <li class="active"><a href="viewdepartment.php"><i class="icon icon-book"></i> <span>DEPARTMENTS</span></a> </li>
    <li class="active"><a href="viewyrlvl.php"><i class="icon icon-book"></i> <span>YEAR LEVEL</span></a> </li>
    <li class="active"><a href="viewsection.php"><i class="icon icon-book"></i> <span>SECTIONS</span></a> </li>
    <li class="active"><a href="viewschoolyear.php"><i class="icon icon-book"></i> <span>SCHOOL YEAR</span></a> </li>
    <li class="active"><a href="viewsemester.php"><i class="icon icon-book"></i> <span>SEMESTER</span></a> </li>

</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="adminindex.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      
    </div>
<!--End-Action boxes-->    

<!--Chart-box-->    
    <div class="row-fluid">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$semesters =$_REQUEST['semesters'];
$update="update semester set  semesters='".$semesters."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='viewsemester.php'>View Updated Record</a>";
echo '<center><p style="color:#FF0000;">'.$status.'</p></center>';
}else {
?>
<br>
<div class="row">
  <div class="column middle">
<center><h2><font face="Times New Roman" color="yellow"><b>Update Semester Record</b></font></h2>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="semesters" placeholder="Enter Semester" required value="<?php echo $row['semesters'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
  </div>
</div>
</center>
<?php } ?>
</div>
</div>

    </div>
<!--End-Chart-box--> 


        

<!--end-main-container-part-->

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
