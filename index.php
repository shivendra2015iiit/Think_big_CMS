<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ThinkBIG CMS</title>
        <link href="btstrap/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
        </style>
        <link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="jquery2.js"></script>
		
		
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
    <body>


<div class="jumbotron img-responsive parallax" style="margin-top:10px; background-image:url(img/pen-macro.jpg) ; background-repeat:round;color:white ;">
    <h1 style="color:inherit">Ur buddy </h1>
    <p>Simple course management system , yet effective component for school and college</p>
    <p>&nbsp;</p>
    <p><a class="btn btn-primary btn-lg" href="about.html" role="button">Learn more</a>
    </p>
</div>

 <div class="row">

<div class="panel panel-default col-md-offset-2 col-md-8">
    <div class="panel-heading"><h1>Enter your credentials</h1></div>
    <div class="panel-body">
    
    <!--login form-->
        <form action="index.php" method="post" class="navbar-form row">
                <div style="padding-bottom:20px;">
                  <div class="form-group-lg form-horizontal">
                  <input type="text" name="username" class="form-control " placeholder="Username">
                    <div class="form-group-lg form-horizontal" style="padding-top:10px;">
                    <input type="password" name="password" class="form-control" placeholder="Password"></div>
                   <div class="text-danger text-left">Forgot password ?</div>
                    </div>
                </div>
                <button type="submit" name="login" class="btn btn-success">Login</button>
            </form>
            <div class="panel-footer text-center">Not Yet Registered ? <a href="registration.php"> <button type="submit" class="btn btn-warning">Sign up</button></a></div>
    </div>
</div>
</div>
    
        <?php     
		session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
                    		// code here
        require_once('../mysqli_connect.php');
		if(isset($_POST['login'])){
			if(empty($_POST['username']) || empty($_POST['password'])){
		    echo "<script type=\"text/javascript\">alert('Please Enter Username and Password');</script>";           }
			else
			{
				$username = htmlentities(trim($_POST['username']));
				$password = htmlentities(trim($_POST['password']));
				
				$query = "select * from users where username='".$username."'";
			    $response = mysqli_query($dbc,$query);
				
				if($response)
				{
					$row = mysqli_fetch_array($response);
					 if($row['password'] == $password){
						 if($row['active'] == 1){                          // 1 for active 2 for inactive
						            session_start();
						            $_SESSION['userid']=$row['id'];
									$_SESSION['instructor']=$row['instructor'];
									$_SESSION['admin']=$row['admin'];
						  
							  	if($row['instructor'] == 0){
									
									header("Refresh:0;url='homepages.php'");
									die();
									
									//is student have to open his homepage (homepages.html have to make first .php to check session)
									//have to change into homepage.php
								}
								else{
									if($row['admin'] == 1)
										header("Refresh:0;url='admin/verification.php'");
									die();
									//have to open istructor page and only privilaged instructor can edit his marks
								}
						  }
						  else{
							  echo "<script type=\"text/javascript\">alert(\"Your registration is being cancelled\");</script>";
						  }
					 }
					 else
					 {
						 echo "<script type=\"text/javascript\">alert(\"Please try again\");</script>";
					 }
				}
				
			}
			
			}
	  mysqli_close($dbc);
        ?>
       
       <script src="btstrap/js/bootstrap.min.js"></script>
        <hr>
  <div class="row"  style="background-color:#895098">
  <div class="text-center col-md-6 col-md-offset-3">
      <h4>Course Management System </h4>
      <p>Copyright &copy; 2016 &middot; All Rights Reserved &middot; 
      <a href="http://iiitkottayam.ac.in/" >IIIT Kottayam</a></p>
    </div>
  </div>
   </body>
    
</html>