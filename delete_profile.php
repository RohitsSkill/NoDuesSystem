<?php
session_start();
$username=$_SESSION['username'];

				$host="localhost";
				$user="root";
				$pass="";
				$db="nd";
				$conn = new mysqli($host,$user,$pass,$db);
			
				if(!mysqli_connect_error()){

					$delete_own="DELETE  FROM student where username = ?";
					$delete_data="DELETE  FROM stud_sub where username = ?";
					$check_delete="SELECT * FROM student WHERE username = ?";
					
					$stmt=$conn->prepare($delete_own);
					$stmt->bind_param("s",$username);
					$stmt->execute();
					$stmt->store_result();
					$stmt->close();

					$stmt=$conn->prepare($delete_data);
					$stmt->bind_param("s",$username);
					$stmt->execute();
					$stmt->store_result();
					$stmt->close();

					$stmt=$conn->prepare($check_delete);
					$stmt->bind_param("s",$username);
					$stmt->execute();
					$stmt->store_result();
					$found=$stmt->num_rows;
                    if($found>0){
						echo "<script>alert('PROFILE NOT DELETED...!!');
							window.location.href='login_student.html';</script>";
					}
					else{
						echo "<script>alert('PROFILE SUCCESSFULLY DELETED...!!');
							window.location.href='login_student.html';</script>";

					}
				}
				else{
					echo "connection_failled";


				}
?>