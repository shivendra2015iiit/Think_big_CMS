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
    background-image: url("img/bg-grey.png");

    /* Set a specific height */
    height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
	opacity:0.9;
	
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
<div class="container-fluid">
	<div class="jumbotron" style="background-color:grey;">
		<center><h3>Question paper</h3></center>
		
		</div>
	<div class="row" style="background-color:lightgrey;">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<form method="POST" action="done.php">
			<div class="questions">
<?php 
@session_start();
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
		header("Refresh:0;url='admin/verification.php'");
	die();
	}
	}
	echo "<p style='float:right;'>Welcome :".$_SESSION['userid']."</p>";
$query_res=mysqli_query($dbc,'SELECT * FROM quiz');
					$i=1;
					while($query_row=mysqli_fetch_assoc($query_res)){
							echo $i.'&nbsp;&nbsp;&nbsp;<b>'.$query_row['question'].'</b><br><br>';
							echo '<table class="table">';
								echo '<tbody>';
									echo '<tr>';
										echo '<td>';
											echo '<input type="radio" name="'.$query_row['qid'].'" method="POST" value="1">&nbsp;&nbsp;&nbsp;'.$query_row['opt1'];
										echo '</td>';
										echo '<td>';
											echo '<input type="radio" name="'.$query_row['qid'].'" method="POST" value="2">&nbsp;&nbsp;&nbsp;'.$query_row['opt2'];
										echo '</td>';
									echo '</tr>';
									echo '<tr>';
										echo '<td>';
											echo '<input type="radio" name="'.$query_row['qid'].'" method="POST" value="3">&nbsp;&nbsp;&nbsp;'.$query_row['opt3'];
										echo '</td>';
										echo '<td>';
											echo '<input type="radio" name="'.$query_row['qid'].'" method="POST" value="4">&nbsp;&nbsp;&nbsp;'.$query_row['opt4'];
										echo '</td>';
									echo '</tr>';
								echo '</tbody>';
	
							echo '</table>';
							
						$i++;
						
					}
}
				 ?>
				 </div>
			<div class="row">
				<input type="submit" class="button" name="submit" value="Submit" style="float:right;">
			</div>
			</form>
		</div>
		<div class="col-sm-3">
			
		</div>
	</div>

</body>
</html>