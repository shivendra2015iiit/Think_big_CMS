<?php
session_start();
require_once('../../mysqli_connect.php');
if(!isset($_SESSION['userid'])){
	echo "<script>alert(\"Please Login\")</script>";
	header("Refresh:0;url='../index.php'");
	die();
}
else{
	
		if($_SESSION['admin']==0){
		header("Refresh:0;url='../homepages.php'");
	die();
		}
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['submit']))
   {    
       //checking all fields filled
	  if(empty($_POST['data']))
	  {
		  // creating a dialog box using javascript
		  echo "<script>alert(\"please fill all mandatory fields\")</script>" ;                                       
	  }	
		
   
   else{
	   $semester=test_input($_POST["semester"]);
	   $expirydate=test_input($_POST["expirydate"]);
	   $data=test_input($_POST["data"]);
	   $course_id=test_input($_POST["course_id"]);
	   $sub_id=test_input($_POST["subject_id"]);
	   
	   if($course_id=="" && $subject_id==""){
		 $sql = mysqli_query($dbc,"INSERT INTO `notification` (`semester`,`expiry_date`,`data`) values('".$semester."','".$expirydate."','".$data."')");  
	   }
	   elseif($course_id=="" && $subject_id!=""){
	    $sql = mysqli_query($dbc,"INSERT INTO `notification` (`semester`,`expiry_date`,`data`,`subject_id`) values('".$semester."','".$expirydate."','".$data."','".$subject_id."')");
	   }
	    elseif($$course_id!="" && $subject_id==""){
	    $sql = mysqli_query($dbc,"INSERT INTO `notification` (`semester`,`expiry_date`,`data`,`course_id`) values('".$semester."','".$expirydate."','".$data."','".$course_id."')");
	   }
	   else{
		 $sql = mysqli_query($dbc,"INSERT INTO `notification` (`semester`,`expiry_date`,`data`,`course_id`,`subject_id`) values('".$semester."','".$expirydate."','".$data."','".$course_id."','".$subject_id."')");
	   }
		if ($sql) {
                echo "<script>alert(\"NOTIFICATION ADDED\")</script>";
           } else {
                echo "Error: " . $sql . "<br>" . $dbc->error;
                   }

  }
   }
}
    @mysqli_close($dbc);
	header("Refresh:0;url='verification.php'");	
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);          //remove html tags
  $data = htmlspecialchars($data);      //remove special charachters
  return $data;
}
	?>