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
            <a class="navbar-brand" href="index.php">Ur buddy</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="homepages.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="sr-only">(current)</span></a>
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
<?php

session_start();
require_once('../mysqli_connect.php');
if(!isset($_SESSION['userid'])){
	echo "<script>alert(\"Please Login\")</script>";
	header("Refresh:0;url='index.php'");
	die();
}
else{
	if($_SESSION['instructor']==1){
		header("Refresh:0;url='ins_homepage.php'");
	die();
	}
	else{
		if($_SESSION['admin']==1){
		header("Refresh:0;url='admin/adm_homepage.php'");
	die();
	}
	}
	  $q1=mysqli_query($dbc,'SELECT course_id FROM details where user_id='.$_SESSION['userid']);
	  $row1 = mysqli_fetch_assoc($q1);
            $q2=mysqli_query($dbc,'SELECT * FROM notification where course_id='.$row1['course_id'] .' OR course_id is NULL');
             
			 echo "<div class=\"col-md-offset-2 col-md-8\"><table class=\"table table-striped table-hover table-reponsive\"><tr><th>Sem</th><th>Expiry Date</th><th>NOTIFICATION</th><th>Course id</th><th>Subject id</th></tr>";
             while( $row=mysqli_fetch_assoc($q2) ){
			  
		      echo "<tr><td>{$row['semester']}</td><td>{$row['expiry_date']}</td><td>{$row['data']}</td><td>{$row['course_id']}</td><td>{$row['subject_id']}</td></tr>";
                } 
			  echo "</table></div>";
			  mysqli_close($dbc);
}

   ?>
   
 
</body>
</html>