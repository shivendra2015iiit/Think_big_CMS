<?php
require_once('../../mysqli_connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['reject']))
   { 
 $sql="Delete FROM registered Where email=\"".$_POST['email']."\"";
  if ($dbc->query($sql) === TRUE) {
	header("Refresh:0;url='verification.php'"); 
 }
   }
   if(isset($_POST['accept']))
   { 
if($_POST['username']){
 $sql1="Select * FROM registered Where email=\"".$_POST['email']."\"";
 $query=mysqli_query($dbc,$sql1);
 if($row = mysqli_fetch_assoc( $query ) ){
	  $r_firstname= $row['firstname'];
         $r_middlename= $row['middlename'];
         $r_lastname= $row['lastname'];
         $r_title= $row['title'];
		 $r_dob= $row['dob'];
         $r_email= $row['email'];
         $r_contact= $row['contact'];
         $r_address= $row['address'];
         $r_time_of_request= $row['time_of_request'];
         $r_pincode= $row['pincode'];
		 $r_city= $row['city'];
		 $r_state= $row['state'];
		 $r_country= $row['country'];
		 $r_pphone= $row['pphone'];
		 $password=rand();
 if($row['title']== "professor" || $row['title']=="hod" ){
	 $sqluser = mysqli_query($dbc,"INSERT INTO `users` (`username`,`password`,`instructor`,`admin`,`title`) values('".$_POST['username']."','".$password."',1,0,'".$r_title."')");
	 $qp="SELECT id FROM `users` where username=\"".$_POST['username']."\"";
	
	  $res=mysqli_fetch_assoc(mysqli_query($dbc,$qp));
	  $idof=$res['id'];
     if(mysqli_query($dbc,"INSERT INTO `instructor` (`firstname`,`middlename`,`lastname`,`dob`,`email`,`contact`,`address`,`pincode`,`city`,`state`,`country`,`user_id`) VALUES ('".$r_firstname."','". $r_middlename."','".$r_lastname."','".$r_dob."','".$r_email."','".$r_contact."','".$r_address."','".$r_pincode."','".$r_city."','".$r_state."','".$r_country."',".$idof.")"))
	 {header("Refresh:0;url='verification.php'");
      } 
	 }
	 elseif($row['title']== "student")
	 {
		$sqluser = mysqli_query($dbc,"INSERT INTO `users` (`username`,`password`,`instructor`,`admin`,`title`) values('".$_POST['username']."','".$password."',0,0,'".$r_title."')");
	 $qp="SELECT id FROM `users` where username=\"".$_POST['username']."\"";
	
	  $res=mysqli_fetch_assoc(mysqli_query($dbc,$qp));
	  $idof=$res['id'];
	  $date=date('Y-m-d');
	  $enddate=date('Y-m-d', strtotime('+4 year'));;
	  $cutie1= mysqli_query($dbc,"INSERT INTO `details` (`firstname`,`middlename`,`lastname`,`dob`,`email`,`contact`,`address`,`pincode`,`city`,`state`,`country`,`user_id`,`Date_of_registration`,`home_phone`) VALUES ('".$r_firstname."','". $r_middlename."','".$r_lastname."','".$r_dob."','".$r_email."','".$r_contact."','".$r_address."','".$r_pincode."','".$r_city."','".$r_state."','".$r_country."',".$idof.",'".$r_time_of_request."','".$r_pphone."')");
      echo mysqli_error($dbc);
	  $cutie2=mysqli_query($dbc,"INSERT INTO `calender` (`start_date`,`end_date`,`user_id`) VALUES('".$date."','".$enddate."','".$idof."')");

	require '../../PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = '	smtp.gmail.com';
$mail->Port =465;
$mail->Username = 'robot.thinkbigcms@gmail.com';
$mail->Password = "1234567q";
$mail->setFrom('robot.thinkbigcms@gmail.com');
$mail->addAddress($r_email);
$mail->Subject = 'Course management system logun details';
$mail->Body = 'This is a auto generated mail please do no reply . YOUR USERNAME: '.$_POST['username'].'   PASSWORD: '.$password;

//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
} 	 
 
 }
$sql="Delete FROM registered Where email=\"".$_POST['email']."\"";
  if ($dbc->query($sql) === TRUE) {
	header("Refresh:0;url='verification.php'");
 }
   }
   }
}
}
?>