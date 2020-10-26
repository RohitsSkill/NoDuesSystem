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

					$select_for_pass="SELECT * From users Where username = ? and password = ? Limit 1";
					
					$stmt=$conn->prepare($select_for_pass);
					$stmt->bind_param("ss",$username,$password);
					$stmt->execute();
					$stmt->store_result();
					$row_num=$stmt->num_rows;

					if($row_num>0){
						$select_post='SELECT * FROM users WHERE username = ? Limit 1';
						$stmt=$conn->prepare($select_post);
						$stmt->bind_param("s",$username);
						$stmt->execute();
						$result=$stmt->get_result();
						$user=$result->fetch_assoc();

						$_SESSION['username']=$user['username'];
						$_SESSION['post']=$user['post'];
						if($_SESSION['post']=='hod'){
							echo "<script>alert('Welcome..HOD!!');
							window.location.href='hod_home.php';</script>";
						}
						if($_SESSION['post']=='teacher'){
							echo "<script>alert('Welcome Teacher..!!');
							window.location.href='teacher_home.php';</script>";
						}
						if($_SESSION['post']=='non'){
							echo "<script>alert('You are not verified by HOD!!');
							window.location.href='login_teacher.html';</script>";
						}

					}
					else{
						echo "<script>alert('Wrong Password...!!');
							window.location.href='login_teacher.html';</script>";
					}
				}
				else{
					echo "<script>alert('CONNECTION FAILLED...!!');
							window.location.href='login_teacher.html';</script>";


				}
?>