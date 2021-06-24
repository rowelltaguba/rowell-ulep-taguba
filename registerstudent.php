
<!DOCTYPE html>
<html lang="en">
<head>
<title>ISU-A Students Registration</title>
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
<link rel="stylesheet" href="css/login.css" />

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
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        
        <li class="divider"></li>
        <li><a href="userlogout.php"><i class="icon-key"></i> Logout</a></li>
      </ul>
    </li>
  </ul>

</div>
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
    if (isset($_REQUEST['studentID'])){
    $studentID = stripslashes($_REQUEST['studentID']); 
    $studentID = mysqli_real_escape_string($con,$studentID);
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($con,$name);
        $course = stripslashes($_REQUEST['course']);
    $course = mysqli_real_escape_string($con,$course);
        $department = stripslashes($_REQUEST['department']);
    $department = mysqli_real_escape_string($con,$department);
        $semester = stripslashes($_REQUEST['semester']);
    $semester = mysqli_real_escape_string($con,$semester);
        $address = stripslashes($_REQUEST['address']);
    $address = mysqli_real_escape_string($con,$address);
            $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

    $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `students` (studentID, name, course, department, semester, address, password, email, trn_date) VALUES ('$studentID', '$name', '$course','$department', '$semester', '$address',  '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='userlogin.php'><font color=yellow>Login</font></a></div>";
        }
    }else{

?>

<div class="header";>
   <h1 id="heading" style="color: yellow;">
  <center><font face="Times New Roman" size="50">
Students Registration</font></h1>
</div>
<br>
<div class="row">
  <div class="column middle">
<center><center><br><br>
<form name="registration" action="" method="post">
<input type="text" name="studentID" placeholder="Student ID" required /><br><br>
<input type="password" name="password" placeholder="Password" required /><br><br>
<input type="text" name="name" placeholder="Students Name" required /><br><br>
<select name="course" class="form-control select2" style="width: 30%;">
                    <option selected="selected">Courses</option>
                    <option>BSInfo.Tech.</option>
                    <option>BSIndustrial Tech.</option>
                    <option>BSHM</option>
                    <option>BSCrim.</option>
                    <option>BSED</option>
                    <option>BTVTED</option>
                  </select><br>
<select name="department" class="form-control select2" style="width: 30%; height: 5%;">
                    <option selected="selected">Departments</option>
                    <option>Info.Tech.</option>
                    <option>Industrial Tech.</option>
                    <option>Hospitality Management</option>
                    <option>College of Criminal Justice Education</option>
                    <option>College of Education</option>
                  </select><br>
<select name="semester" class="form-control select2" style="width: 30%;">
                    <option selected="selected">Semesters</option>
                    <option>1st</option>
                    <option>2nd</option>
                    <option>Summer</option>
                  </select>
<input type="email" name="email" placeholder="Email" required />
<input type="text" name="address" placeholder="Address" required /><br><br>

<input type="submit" name="submit" value="Register" /></center><br/><br/><br/>
</form>
<?php
echo "<div class='form'><h3>Already have an account...</h3>Click here to <a href='userlogin.php'><font color=yellow>Login</font></a></div>";
?>
  </div>
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
