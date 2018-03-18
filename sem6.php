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

  <style>
.parallax { 
    /* The image used */
    background-image: url("img/slider3.jpg");

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
    echo"<script>alert(\"Please login\")</script>";
    header("Refresh:0:url='index.php'");
    die();
    }
    else{
        if($_SESSION['admin']==1){
            header("Refresh:0;url='admin/verification.php'");
            die();
        }
      $query=mysqli_query($dbc,'SELECT * from sem6 where user_id='.$_SESSION['userid']);
       echo mysqli_error($dbc);
while($row=mysqli_fetch_assoc( $query ) ){
	 
                $r_useid=$row['user_id'];
                 $r_courseid=$row['course_id'];
                  $r_subjectid=$row['subject_id'];
                   $r_internal=$row['internal1'];
                    $r_internal2=$row['internal2'];
                     $r_endsem_marks=$row['endsem_marks'];
                      $r_quiz=$row['quiz'];
                       $r_project=$row['project'];
                       
            echo "<div class=\"col-md-offset-2 col-md-8 form-group-lg form-control-static panel panel-default\"><form >
                <div style=\"padding-bottom:10px\">
				<b class=\"h4\">Course Id :</b>
			    <input type=\"text\" name=\"course id\" class=\"form-control\" value=\"".$r_courseid."\" readonly  ></div>
                <div style=\"padding-bottom:10px\">
				<b class=\"h4\">Subject id :</b>
				<input type=\"text\" name=\"subject id\" class=\"form-control\" value=\"".$r_subjectid."\" readonly ></div>
                <div style=\"padding-bottom:10px\">
				<b class=\"h4\">Internal 1 :</b>
				<input type=\"text\" name=\"internal 1\" class=\"form-control\" value=\"".$r_internal."\" readonly ></div>
                <div style=\"padding-bottom:10px\">
				<b class=\"h4\">Internal 2 :</b>
				<input type=\"text\" name=\"interna 2\" class=\"form-control\" value=\"".$r_internal2."\" readonly ></div>
                <div style=\"padding-bottom:10px\">
				<b class=\"h4\">Quiz :</b>
				<input type=\"text\" name=\"quiz\" class=\"form-control\" value=\"".$r_quiz."\" readonly ></div>
                <div style=\"padding-bottom:10px\">
				<b class=\"h4\">Project :</b>
				<input type=\"text\" name=\"project name\" class=\"form-control\" value=\"".$r_project."\" readonly ></div>
                <div style=\"padding-bottom:10px\">
				<b class=\"h4\">End Sem 1 :</b>
				<input type=\"text\" name=\"end sem marks\" class=\"form-control\" value=\"".$r_endsem_marks."\" readonly ></div>
				</form></div>";

    }	
    }
    ?>

</body>
</html>