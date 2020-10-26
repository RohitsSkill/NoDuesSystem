<?php

	$username=$_POST['username'];
	$newstatus="done";
	
						$host="localhost";
						$user="root";
						$password="";
						$db="nd";
						$conn = new mysqli($host,$user,$password,$db);
			
						if(!mysqli_connect_error()){

							$select="SELECT status From stud_sub Where username = ? Limit 1";
							$update="UPDATE stud_sub SET status = ? where username = ?";
						//	$remove="UPDATE  users SET post = 'NULL' WHERE username = ?";


							$stmt=$conn->prepare($select);
							$stmt->bind_param("s",$username);
							$stmt->execute();
							$result=$stmt->get_result();
							$res=$result->fetch_assoc();
			
							if($res['status'] =="done"){
								echo "Already Done...!!";
								echo "<script>alert('Already Done....!!');
							window.location.href='hod_home.php';</script>";	

							}
							else{
								$stmt->close();
								$stmt=$conn->prepare($update);
								$stmt->bind_param("ss",$newstatus,$username);
								$stmt->execute();
								echo "Done..!!";	
								echo "<script>alert('Done...!!');
							window.location.href='hod_home.php';</script>";	
							}
							$stmt->close();
							$conn->close();
						}
						else{
								echo("Connection is not successful.");
								echo "<script>alert('Connection is not successful...!!');
							window.location.href='hod_home.php';</script>";	
								echo mysqli_connect_error();

						}
					

?>

