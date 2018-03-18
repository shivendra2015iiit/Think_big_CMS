<?php
	$localhost="localhost";
	$user="root";
	$password="";
	
	if(mysqli_connect($localhost,$user,$password)){
		$database=mysqli_select_db('betateam');
		
		$query="SELECT * FROM tech_quiz";
		$query_res=mysqli_query($query);
echo mysqli_error();
		
	}
	
	
?>
<html>
<head>
	<title>B-team</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/jquery-3.1.1.min.js"></script>
	<style>
		
	</style>
</head>
<?php

	@session_start();
	$uname=$_SESSION['uname'];
	//$uname="Subbu";
?>
<body>
	<div class="container-fluid">
	<div class="jumbotron">
		<center><h3>Question paper</h3></center>
		<p style='float:right;'>Welcome <?= $uname;?></p>
	</div>
	<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<form method="POST" action="done.php">
			<div class="questions">
				<?php 
					$i=1;
					while($query_row=mysqli_fetch_assoc($query_res)){
							echo $i.'&nbsp;&nbsp;&nbsp;'.$query_row['question'].'<br><br>';
							echo '<table class="table">';
								echo '<tbody>';
									echo '<tr>';
										echo '<td>';
											echo '<input type="radio" name="'.$query_row['s.no'].'" method="POST" value="1">&nbsp;&nbsp;&nbsp;'.$query_row['opt1'];
										echo '</td>';
										echo '<td>';
											echo '<input type="radio" name="'.$query_row['s.no'].'" method="POST" value="2">&nbsp;&nbsp;&nbsp;'.$query_row['opt2'];
										echo '</td>';
									echo '</tr>';
									echo '<tr>';
										echo '<td>';
											echo '<input type="radio" name="'.$query_row['s.no'].'" method="POST" value="3">&nbsp;&nbsp;&nbsp;'.$query_row['opt3'];
										echo '</td>';
										echo '<td>';
											echo '<input type="radio" name="'.$query_row['s.no'].'" method="POST" value="4">&nbsp;&nbsp;&nbsp;'.$query_row['opt4'];
										echo '</td>';
									echo '</tr>';
								echo '</tbody>';
	
							echo '</table>';
							
						$i++;
						
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

