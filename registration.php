<?php
$nameErr="";
require_once('../mysqli_connect.php');
//reading data from form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['submit']))
   {    
       //checking all fields filled
	  if(empty($_POST['firstname'] || $_POST['lastname'] || $_POST['title']|| $_POST['dob'] || $_POST['address']                        
	   || $_POST['city'] || $_POST['pin'] || $_POST['state'] || $_POST['country'] || $_POST['phone'] 
	   ||  $_POST['email']||  $_POST['pphone'] ||  $_POST['photo']))
	  {
		  // creating a dialog box using javascript
		  echo "<script>alert(\"please fill all mandatory fields\")</script>" ;                                       
	  }
	  else{
		  //test_input will remove all html tags,extra spaces if availabe
		$fname = test_input($_POST["firstname"]);
		$mname = test_input($_POST["middlename"]);
		$lname = test_input($_POST["lastname"]);
		$title = test_input($_POST["title"]);
		$dob = test_input($_POST["dob"]);
		$address = test_input($_POST["address"]);
		$city = test_input($_POST["city"]);
		$pin = test_input($_POST["pin"]);
		$state = test_input($_POST["state"]);
		$country = test_input($_POST["country"]);
		$phone = test_input($_POST["phone"]);
		$email = test_input($_POST["email"]);
		$pphone = test_input($_POST["pphone"]);
	  
	  
	      
	  if (!preg_match("/^[a-zA-Z ]*$/",$fname) || !preg_match("/^[a-zA-Z ]*$/",$lname)) 
	   {
          $nameErr="No special charachters allowed<br>";
        }
	  else{
        //checking formate of email valid or not
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	       {
          echo "<script>alert(\"Email-ID is invalid RE_ENTER DATA\")</script>" ; 
            }
	    else{
			// function to upload and check photo
			if(photo_upload()!= True)
			{             echo "<script>alert(\"PHOTO is invalid RE_ENTER DATA\")</script>" ;      }
             else{		
		  $sql = mysqli_query($dbc,"INSERT INTO `registered` (`firstname`,`middlename`,`lastname`,`title`,`dob`,`email`,`contact`,`address`,`pincode`,`city`,`state`,`country`,`pphone`) VALUES ('".$fname."','".$mname."','".$lname."','".$title."','".$dob."','".$email."','".$phone."','".$address."','".$pin."','".$city."','".$state."','".$country."','".$pphone."')");  
		 
		  if ($sql) {
                echo "<script>alert(\"Request had been forwarded sucessfully. PLEASE WAIT FOR EMAIL FROM ADMINISTRATOR\")</script>";
           } else {
                echo "Error: " . $sql . "<br>" . $dbc->error;
                   }
				     header("Refresh:0;url='index.php'");
                      die();
                mysqli_close($dbc);
			 }
		 }
		}
	  }
   }
}
//test_input will remove all html tags,extra spaces if availabe
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);          //remove html tags
  $data = htmlspecialchars($data);      //remove special charachters
  return $data;
}

function photo_upload(){
	$imgdir="userphotos/";
	 $uploadOk = True;
	
	$file=$imgdir. trim($_POST['email']).".jpg";
	
	
	// Check if file already exists
  if (file_exists($file)) {
    echo "<script>alert(\"Sorry,data already exists.\")";
    $uploadOk = False;
}
	
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == False) {
    echo "<script>alert(\"Sorry,Photo upload error.\")";
	
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $file)) {
       
    } else {
        echo "<script>alert(\"Sorry,Photo upload error.\")";
		
    }
	return $uploadOk;
}
}
?>


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
        <script src="jquery2.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
		
		
		
		
				<style>
.parallax { 
    /* The image used */
    background-image: url("img/Book.jpg");

    /* Set a specific height */
    height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
	
	
}
.parallax1 { 
    /* The image used */
    background-image: url("img/pen-macro.jpg");

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
                <li><a href="contact.html">About us</a>
                </li>
                <li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">facilites <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="Learnmore.html">Learn more</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="index.php">Faculity login</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index.php">Student login</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="contact.html">Contact us</a>
                </li>
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="jumbotron img-responsive parallax1" style="background-image:url(img/pen-macro.jpg) ; background-repeat:round;color:white ;">
    <h1 style="color:inherit">Ur buddy </h1>
    <p>Simple course management system , yet effective component for school and college</p>
    <p>&nbsp;</p>
    <p><a class="btn btn-primary btn-lg" href="Learnmore.html" role="button">Learn more</a>
    </p>
</div>

<div class="row">

<div class="panel panel-default col-md-offset-2 col-md-8">
    <div class="panel-heading"><h1>Enter your details to register</h1></div>
    <div class="panel-body">
    
    <!--reg form-->
        <form action="registration.php" method="post" enctype="multipart/form-data" class="navbar-form row">
                <div style="padding-bottom:20px;">
                 
				 <div class="form-group-lg form-horizontal">
                  <p class="h3">Name</p>
				  <span class="error">* <?php echo $nameErr;?></span>
                  <input type="text" name="firstname" class="form-control " placeholder="first name *">
                  <input type="text" name="middlename" class="form-control" placeholder="middle name">
                  <input type="text" name="lastname" class="form-control" placeholder="lastname name *">
                    
                    
                    <p class="h3">Title</p>
                    
                <input type="radio" name="title" value="student" class="form-control"> Student<br>
                <input type="radio" name="title" value="professor" class="form-control"> ProfesSor<br>
                <input type="radio" name="title" value="hod" class="form-control"> HOD<br>
                 
				 
                 <div class="form-group-lg" style="padding:10px;">         
                  <p class="h3">Date of Birth</p>
                   <input type="date" name="dob" class="form-control-static">	

                            
                 			

 <!--Address division-->
				  <p class="h3">Address</p> 
                    <input type="text"  name="address" class="form-control-static" placeholder="House no./Area/Locality" style="margin:10px;"><br>
                    <input type="text"  name="city" class="form-control-static" placeholder="city/village" style="margin:10px;">
                    <input type="number"  name="pin" class="form-control-static" placeholder="Zip code" style="margin:10px;"><br>
                    <input type="text"  name="state" class="form-control-static" placeholder="State" style="margin:10px;"><br>
					 <input type="text"  name="country" class="form-control-static" placeholder="Country" style="margin:10px;"><br>
                    

                    
                   </div>
                   
                   <div class="form-group-lg" style="padding:10px;">          <!--Contact details-->
                   <p class="h3">Contact details</p>
                    <input type="tel"  name="phone" class="form-control-static" placeholder="Mobile Number *" style="margin:10px;"><br>
                    <input type="email" name="email" class="form-control-static" placeholder="Email-ID *" style="width:500px" placeholder="email-id">
					<p class="h3">Guardian/Parents contact details</p>
                    <input type="tel"  name="pphone" class="form-control-static" placeholder="Guardien/Parents Number *" style="margin:10px;"><br>
                    </div>
                    
                    <div class="form-group-lg" style="padding:10px;">          <!--Photo details-->
                   
				      <p class="h3">Photograph</p>
                       <span class="form-group-lg" style="padding:10px;"><span class="form-group-lg" style="padding:10px;">
                      <input type="file"  name="photo" class="form-control" placeholder="PHOTO" style="margin:10px;">
                      </span></span>
					  </div>
                    
                     </div>	
                </div>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
			 <!--reg form ends-->
            <div class="panel-footer text-center" style="acolor:white;background-color:skyblue;">Fill correct information and contact CMS admin to get username and password</div>
    </div>
</div>
</div>

</body>
</html>