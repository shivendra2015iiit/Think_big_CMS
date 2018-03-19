<?php
require_once('../../mysqli_connect.php');
$email=$_POST['email'];
$query=mysqli_query($dbc,'SELECT * FROM registered where email="'.$email.'"');
    
 $row = mysqli_fetch_assoc( $query ) ;
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
         		 
		  
		 

		 echo  "<form action=\"registration.php\" method=\"post\" enctype=\"multipart/form-data\" class=\"navbar-form row\">
                <div style=\"padding-bottom:20px;\">
                 
				 <div class=\"form-group-lg form-horizontal\">
                  <p class=\"h3\">Name</p>
				  
                  <input type=\"text\" name=\"firstname\" class=\"form-control\" value=".$r_firstname." readonly >
                  <input type=\"text\" name=\"middlename\" class=\"form-control\" value=".$r_middlename." readonly>
                  <input type=\"text\" name=\"lastname\" class=\"form-control\"   value=".$r_lastname." readonly>

				
				  
                    
                    
                    <p class=\"h3\">Title</p>
                    
                <input type=\"text\" name=\"title\" class=\"form-control\" value=".$r_title." readonly>
                
                 
				 
                 <div class=\"form-group-lg\" style=\"padding:10px;\">         
                  <p class=\"h3\">Date of Birth</p>
                   <input type=\"date\" name=\"dob\" class=\"form-control-static\" value=".$r_dob." readonly>

                
				
				<div class=\"form-group-lg\" style=\"padding:10px;\">
                <p class=\"h3\">Time of request</p>
                   <input type=\"text\" name=\"time_of_request\" class=\"form-control-static\" value=".$r__time_of_request." readonly>				   

                            
                 			

 <!--Address division-->
				  <p class=\"h3\">Address</p> 
                    <input type=\"text\"  name=\"address\" class=\"form-control-static  \" value=".$r_address." readonly   style=\"margin:10px;\"><br>
                    <input type=\"text\"  name=\"city\" class=\"form-control-static     \" value=".$r_city." readonly      style=\"margin:10px;\">
                    <input type=\"number\"  name=\"pin\" class=\"form-control-static    \" value=".$r_pincode." readonly   style= \"margin:10px;\"><br>
                    <input type=\"text\"  name=\"state\" class=\"form-control-static    \"value=".$r_state." readonly      style=\"margin:10px;\"><br>
					 <input type=\"text\"  name=\"country\" class=\"form-control-static \" value=".$r_country." readonly   style=\"margin:10px;\"><br>
                    

                    
                   </div>
                   
                   <div class=\"form-group-lg\" style=\"padding:10px;\">          <!--Contact details-->
                   <p class=\"h3\">Contact details</p>
                    <input type=\"tel\"  name=\"phone\" class=\"form-control-static\" value=".$r_contact." readonly  style=\"margin:10px;\"><br>
                    <input type=\"email\" name=\"email\" class=\"form-control-static\" value=".$r_email." readonly   style=\"width:500px\" placeholder=\"email-id\">
					<p class=\"h3\">Guardien/Parents contact details</p>
                    <input type=\"tel\"  name=\"pphone\" class=\"form-control-static\" value=".$r_pphone." readonly  style=\"margin:10px;\"><br>
                    </div>
                    
                    <div class=\"form-group-lg\" style=\"padding:10px;\">          <!--Photo details-->
                   
				      <p class=\"h3\">Photograph</p>
                       <span class=\"form-group-lg\" style=\"padding:10px;\"><span class=\"form-group-lg\" style=\"padding:10px;\">
                      <input type=\"file\"  name=\"photo\" class=\"form-control\" placeholder=\"PHOTO\" style=\"margin:10px;\">
                      </span></span>
					  </div>
                    
                     </div>	
                </div>
                <button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Submit</button>
            </form>
		"
?>

<html>
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ThinkBIG CMS</title>
        <link href="../btstrap/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
        </style>
        <script src="../jquery2.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
</body>
</html>


