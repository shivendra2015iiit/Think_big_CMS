<html>
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ThinkBIG CMS</title>
		<style type="text/css">
        <link href="../btstrap/css/bootstrap.min.css" rel="stylesheet">
        
        </style>
        <script src="../jquery2.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

                          <!------navigation bar---------> 
  <nav class="navbar navbar-inverse navbar-static-top" style="padding-bottom:0px; margin-bottom:0px;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Ur buddy</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="sr-only">(current)</span></a>
                </li>
                <li><a href="../contact.html">About us</a>
                </li>
  
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="notification.php">Notifications</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="todolist.html">To do list</a>
                        </li>
                        <li><a href="#">Another action</a>
                        </li>
                        <li><a href="#">Something else here</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a>
                        </li>
                    </ul>
                </li>
					<li><a href="logout.php" class="btn-warning">Logout</a>
                </li>
            </ul>
			
           
        </div>
        
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="jumbotron img-responsive" style="margin-top:10px; background-image:url(../img/pen-macro.jpg) ; background-repeat:round;color:white ;">
    <h1 style="color:inherit">Ur buddy </h1>
    
    </p>
</div>

<div class="row">

<!--this section will contain users name and profile photo-->
<div class="panel panel-default">
<div class="panel panel-default col-md-offset-0 col-md-3">

<!--form to insert notification-->
<h3><b>INSERT NOTIFICATION</b></h3>
<form class="navbar-form row" action="notification.php" method="post">
<div style="padding-bottom:10px;">
<input type="number" name="semester" placeholder="sem"></div>
<div style="padding-bottom:10px;">
<input type="date" name="expirydate" placeholder="Expiry date"></div>
<div style="padding-bottom:10px;">
<textarea row="5" name="data" placeholder="Notification"></textarea></div>
<div style="padding-bottom:10px;">
<input type="number" name="course_id" placeholder="course_id"></div>
<div style="padding-bottom:10px;">
<input type="number" name="subject_id" placeholder="subject_id"></div>
<div style="padding-bottom:10px;">
<button type="submit" name="submit" class="btn btn-Success" >SUBMIT</button></div>

</form>
</div>
<div class="panel panel-default col-md-offset-7  col-md-2">
<h3><b>Welcome : </b>ADMINISTRATOR</h3>
<image src="image/admin.jpg" alt="admin's_photo"  class="img-circle img-responsive"/>
   </div>
</div>   

<?php

@session_start();
require_once('../../mysqli_connect.php');
if(!isset($_SESSION['userid'])){
	echo "<script>alert(\"Please Login\")</script>";
	
	
$URL='../index.php';
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

	
	die();
}
else{
	
		if($_SESSION['admin']==0){
			$URL='../homepages.php';
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		
	die();
	}
	
$query=mysqli_query($dbc,'SELECT * FROM registered');
          echo "<div class=\"col-md-offset-2 col-md-8\"><table class=\"table table-striped table-hover table-reponsive\"><caption><center><b><h2>NEW REQUESTs</h2></b></center></caption><tr><th>Firstname</th><th>Middlename</th><th>Lastname</th><th>Title</th><th>Email-ID</th><th>View Details</th></tr>";
          while( $row = mysqli_fetch_assoc( $query ) ){
			  $email=$row['email'];
		  echo "<tr><td>{$row['firstname']}</td><td>{$row['middlename']}</td><td>{$row['lastname']}</td><td>{$row['title']}</td><td>{$row['email']}</td><td><form action=\"details.php\" method=\"post\"><input type=\"hidden\" name=\"email\" value=\"".htmlentities($email)."\"><input type=submit value=\"OPEN\"></form></td></tr>";
                } 
			echo "</table></div>";
}
?>
 </div>
  <div class="row"  style="background-color:#895098">
  <div class="text-center col-md-6 col-md-offset-3">
      <h4>Course Management System </h4>
      <p>Copyright &copy; 2016 &middot; All Rights Reserved &middot; 
      <a href="http://iiitkottayam.ac.in/" >IIIT Kottayam</a></p>
    </div>
  </div>
</body>
</html>


