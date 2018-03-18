

<!doctype html>
<html>
 <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ThinkBIG CMS</title>
		<style type="text/css">
        <link href="btstrap/css/bootstrap.min.css" rel="stylesheet">
        
        </style>
        <link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="jquery2.js"></script>
		
		
		<style>
.parallax { 
    /* The image used */
    background-image: url("img/bg.jpg");

    /* Set a specific height */
    height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
	
}
</style>
    </head>
    <body class="parallax">
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
                <li><a href="Learnmore.html">About us</a>
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
                        <li><a href="quiz.php">Quiz</a>
                        </li>
                        <li><a href="contact.html">Motivation</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="about.html">Reach us</a>
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


    
    
</div>
 <?php
@session_start();
require_once('../mysqli_connect.php');
if(!isset($_SESSION['userid'])){
	echo "<script>alert(\"Please Login\")</script>";
	$URL='index.php';
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		
	die();
}
else{
	if($_SESSION['instructor']==1){
		$URL='ins_homepages.php';
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		
	die();
	}
	else{
		if($_SESSION['admin']==1){
		
	$URL='admin/verification.php';
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		
	die();
	}
	}
$query=mysqli_query($dbc,'SELECT * FROM details where user_id='.$_SESSION['userid']);
if($query){
	 $row = mysqli_fetch_assoc( $query );
	 
	

$q2=mysqli_query($dbc,'SELECT * FROM notification where course_id='.$row['course_id'] .' OR course_id is NULL');
	$r1 = mysqli_fetch_assoc( $q2);
}
else{
	echo "error";
}
}

 ?>

<div class="row">
<div style="margin-top:30px; color:blue;"><marquee><h3><?php  echo $r1['data'];?></h3></marquee></div>
                               <!--this section will contain users name and profile photo-->
	<div class="col-sm-2">
    <iframe src="todolist.html" height="400" width="500"></iframe>
   </div>
<div class="panel panel-default col-sm-offset-8 col-sm-2">
<h3><b>Welcome : </b> <?php  echo $row['firstname']; $variable="userphotos/".$row['email'].".jpg";?></h3>
<image src=<?php echo $variable;?> alt="user's_photo"  class="img-circle img-responsive"/>
   </div>
   
</div>
   
  <div class="row col-sm-6 col-md-offset-3 "  style="background-color:#b3ff1a;margin-top:100px;">
  <div class="text-center col-sm-6 col-md-offset-3">
      <h3>Score card </h3>
	  </div>
	  </div>
	  <div  style="margin-top:200px;">
      <table class="table table-hover" style="background-color:;"><tr> 
	  <th class="btn btn-info" style="margin-left:40px;">
	  <h4><a href="sem1.php">Sem 1</th></h4><th class="btn btn-info" style="margin-left:80px;">
	  <h4><a href="sem2.php">Sem 2</th></h4><th class="btn btn-info" style="margin-left:80px;"> 
	  <h4><a href="sem3.php">Sem 3</th></h4><th class="btn btn-info" style="margin-left:80px;">
	  <h4><a href="sem4.php">Sem 4</th></h4><th class="btn btn-info" style="margin-left:80px;">
	  <h4><a href="sem5.php">Sem 5</th></h4><th class="btn btn-info" style="margin-left:80px;">
	  <h4><a href="sem6.php">Sem 6</th></h4><th class="btn btn-info" style="margin-left:80px;">
	  <h4><a href="sem7.php">Sem 7</th></h4><th class="btn btn-info" style="margin-left:80px;">
	  <h4><a href="sem8.php">Sem 8</th></h4></tr><table>
     <div class="row col-sm-6 col-md-offset-3"  style="background-color:#b3ff1a">
  <div class="text-center col-sm-6 col-md-offset-3">
  
      
	  </div>
	  </div>
	  </div>
  
  
   
   <hr>
  <div class="row"  style="background-color:#895098">
  <div class="text-center col-md-6 col-md-offset-3">
      <h4>Course Management System </h4>
      <p>Copyright &copy; 2016 &middot; All Rights Reserved &middot; 
      <a href="http://iiitkottayam.ac.in/" >IIIT Kottayam</a></p>
    </div>
   
</body>
</html>
