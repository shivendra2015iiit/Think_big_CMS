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
         		 
		  
		 

		 echo  "<div class=\" row col-md-offset-2 col-md-8\"><form  class=\"navbar-form\">
                <div style=\"padding-bottom:20px;\">
                 
				 <div class=\"form-group-lg form-horizontal\">
                  <p class=\"h3\">Name</p>
				  
                  <input type=\"text\" name=\"firstname\" class=\"form-control\" value=\"".$r_firstname."\" readonly >
                  <input type=\"text\" name=\"middlename\" class=\"form-control\" value=\"".$r_middlename."\" readonly>
                  <input type=\"text\" name=\"lastname\" class=\"form-control\"   value=\"".$r_lastname."\" readonly>

				
				  
                    
                    
                    <p class=\"h3\">Title</p>
                    
                <input type=\"text\" name=\"title\" class=\"form-control\" value=\"".$r_title."\" readonly>
                
                 
				 
                 <div class=\"form-group-lg\" style=\"padding:10px;\">         
                  <p class=\"h3\">Date of Birth</p>
                   <input type=\"date\" name=\"dob\" class=\"form-control\" value=\"".$r_dob."\" readonly>

                
				
				<div class=\"form-group-lg\" style=\"padding:10px;\">
                <p class=\"h3\">Time of request</p>
                   <input type=\"date-time-local\" name=\"time_of_request\" class=\"form-control\" value=\"".$r_time_of_request."\" readonly>				   

                            
                 			

 <!--Address division-->
				  <p class=\"h3\">Address</p> 
                    <input type=\"text\"  name=\"address\" class=\"form-control  style=\"margin:10px;\" \" value=\"".$r_address."\"   readonly ><br>
                    <input type=\"text\"  name=\"city\" class=\"form-control    \" value=\"".$r_city."\" readonly      style=\"margin:10px;\">
                    <input type=\"number\"  name=\"pin\" class=\"form-control    \" value=\"".$r_pincode."\" readonly   style= \"margin:10px;\"><br>
                    <input type=\"text\"  name=\"state\" class=\"form-control   \"value=\"".$r_state."\" readonly      style=\"margin:10px;\"><br>
					 <input type=\"text\"  name=\"country\" class=\"form-control \" value=\"".$r_country."\" readonly   style=\"margin:10px;\"><br>
                    

                    
                   </div>
                   
                   <div class=\"form-group-lg\" style=\"padding:10px;\">          <!--Contact details-->
                   <p class=\"h3\">Contact details</p>
                    <input type=\"tel\"  name=\"phone\" class=\"form-control\" value=\"".$r_contact."\" readonly  style=\"margin:10px;\"><br>
                    <input type=\"email\" name=\"email\" class=\"form-control\" value=\"".$r_email."\" readonly   style=\"width:500px\" placeholder=\"email-id\">
					<p class=\"h3\">Guardien/Parents contact details</p>
                    <input type=\"tel\"  name=\"pphone\" class=\"form-control	\" value=\"".$r_pphone."\" readonly  style=\"margin:10px;\"><br>
                    </div>
                    
                    <div class=\"form-group-lg\" style=\"padding:10px;\">          <!--Photo details-->
                   
				      <p class=\"h3\">Photograph</p>
                       <span class=\"form-group-lg\" style=\"padding:10px;\"><span class=\"form-group-lg\" style=\"padding:10px;\">
                      <img src=\"../userphotos/".$r_email.".jpg\" alt=\"user photo\" height=\"500px\">
					  </div>
                    
                     </div>	
                </div>
                
            </form>
			</div>
		";
		
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

<!--form to accept registration-->
<div  class="form-group-lg form-control-static">
<form action="reject.php" method="post">

<div class="col-md-2">
<input type="text" name="username" placeholder="Username" class="form-control"  style="width:200px;">
<input type="hidden" value="<?php echo $email;?>" name="email">
</div>
<div class="col-md-2 col-md-offset-1">
<button type="submit" name="accept" class="btn btn-Success" >ACCEPT</button>
</div>
<div class="col-md-2 col-md-offset-3">
<button type="submit" name="reject" class="btn btn-danger" >REJECT</button>

</div>
</form>
</div>
</body>
</html>


