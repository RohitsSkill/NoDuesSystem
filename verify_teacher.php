<?php

	$username=$_POST['username'];

    	$post="teacher";
	
						$host="localhost";
						$user="root";
						$password="";
						$db="nd";
						$conn = new mysqli($host,$user,$password,$db);
			
						if(!mysqli_connect_error()){

							$select="SELECT post From users Where username = ? Limit 1";
							$update="Update users Set post = ? Where username = ?";

							$stmt=$conn->prepare($select);
							$stmt->bind_param("s",$username);
							$stmt->execute();
							$result=$stmt->get_result();
				    		$user=$result->fetch_assoc();
			
							if($user['post']!="hod"){
								$stmt->close();
								$stmt=$conn->prepare($update);
								$stmt->bind_param("ss",$post,$username);
								$stmt->execute();

								
									echo ("Verify successfull !!");	
									echo "<script>alert('Verify successfull...!!');
							window.location.href='verify_tech.php';</script>";				
							}
							else{
									echo ("Sorry This is HOD...!!");
							}
							$stmt->close();
							$conn->close();
						}
						else{
								echo("Connection is not successful.");
								echo "<script>alert('Connection is not successful...!!');
							window.location.href='verify_tech.php';</script>";	
								echo mysqli_connect_error();

						}
					
	
?>

