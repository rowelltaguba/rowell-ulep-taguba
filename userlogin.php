<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ISU-A Students Login</title>
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
  .column {
  float: center;
}
.column.middle {
  width: 100%
}

.form{
  color: white;
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

<!--close-top-Header-menu-->
<!--sidebar-menu-->
<div id="sidebar"><a href="index.php" class="visible-phone"><i class="icon icon-home"></i>Dashboard</a>
  <ul>
    <li class="active"><a href="index.php"><i class="icon icon-home"></i> <span>DASHBOARD</span></a> </li>

</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
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
  require('db.php');
  session_start();
    
    if (isset($_POST['studentID'])){
    
    $studentID = stripslashes($_REQUEST['studentID']);
    $studentID = mysqli_real_escape_string($con,$studentID);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    
        $query = "SELECT * FROM `students` WHERE studentID='$studentID' and password='".md5($password)."'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['studentID'] = $studentID;
      header("Location: index.php");
            }else{
        echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='userlogin.php'><font color=yellow>Login</font></a></div>";
        }
    }else{
?>


<div class="header";>
  <h1 id="heading" style="color: yellow;">
  <center><font face="Times New Roman" size="50">
Student Login</font></h1>
</div>
  </center>
  <div class="column middle">
  <center>
<form action="" method="post" name="login"><br><br>
<input type="text" name="studentID" placeholder="Student ID" required /><br><br>
<input type="password" name="password" placeholder="Password" required /><br><br>
<input name="submit" type="submit" value="Login" /><p></p><a href='login.php'><font color=yellow>Admin Login</font></a><br>
</form>

<div class="notregis">
<p style="color:white;">Not registered yet? <a href='registerstudent.php'><font color="yellow">Register Here</font></a></p>
</center>
  </div>
<?php } ?>
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
