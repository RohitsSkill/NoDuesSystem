<?php
	session_start();
	
	$username=$_POST['user'];
	$password=$_POST['pass'];


				$host="localhost";
				$user="root";
				$pass="";
				$db="nd";
				$conn = new mysqli($host,$user,$pass,$db);
			
				if(!mysqli_connect_error()){

					$select_for_pass="SELECT * From student Where username = ? and password = ? Limit 1";
					
					$stmt=$conn->prepare($select_for_pass);
					$stmt->bind_param("ss",$username,$password);
					$stmt->execute();
					$stmt->store_result();
					$row_num=$stmt->num_rows;

					if($row_num>0){
						$select_post='SELECT * FROM student WHERE username = ? Limit 1';
						$stmt=$conn->prepare($select_post);
						$stmt->bind_param("s",$username);
						$stmt->execute();
						$result=$stmt->get_result();
						$user=$result->fetch_assoc();

						$_SESSION["username"]=$user['username'];
						
						header("Location:student_home.php");
					//	echo('username'.$_SESSION['username']);
					//	echo "<script>alert('Welcome...!!');
					//		window.location.href= 'student_home.php';</script>";

					}
					else{
						echo "<script>alert('Wrong Password...!!');
							window.location.href='login_student.html';</script>";
					}
				}
				else{
					echo "<script>alert('CONNECTION FAILLED...!!');
							window.location.href='login_student.html';</script>";


				}
?>