<?php

	$username=$_POST['user'];
	$lab_no=$_POST['lab_no'];
	$pass=$_POST['pass'];
	$cnf_pass=$_POST['cnf_pass'];
	$name=$_POST['name'];

	$post="non";

	if(!empty($name) || !empty($username) || !empty($pass) || !empty($lab_no)){
		if(preg_match("/^[\sa-zA-Z]*$/",$name)){
			$host="localhost";
			$user="root";
			$password="";
			$db="nd";
			$conn = new mysqli($host,$user,$password,$db);
			
			if(!mysqli_connect_error()){
				if($pass==$cnf_pass){
						$select="SELECT username From users Where username = ? Limit 1";
						$insert="INSERT Into users (name,post,lab_no,username,password) Values(?,?,?,?,?)";

						$stmt=$conn->prepare($select);
						$stmt->bind_param("s",$username);
						$stmt->execute();
						$stmt->bind_result($username);
						$stmt->store_result();
						$row_num=$stmt->num_rows;
			
						if($row_num==0){
								$stmt->close();
								$stmt=$conn->prepare($insert);
								$stmt->bind_param("ssiss",$name,$post,$lab_no,$username,$pass);
								$stmt->execute();
								echo "<script>alert('Registration successfull...!!');
									window.location.href='login_teacher.html';</script>";
									
						}
						else{
								echo "<script>alert('Someone already registered for same username...!!');
										window.location.href='registration_teacher.html';</script>";
						}
				}
				else{
						echo "<script>alert('Carefully conform your password...!!');
								window.location.href='registration_teacher.html';</script>";
				}
				
				$stmt->close();
				$conn->close();
							
						
			}
			else{
					echo "<script>alert('Connection is not successful...!!');
							window.location.href='registration_teacher.html';</script>";
					echo mysqli_connect_error();

			}
						
		}
		else{
			echo "<script>alert('Name not valid...!!');
							window.location.href='registration_teacher.html';</script>";		
		}
			

	}	
	else{
		echo "<script>alert('Empty field...!!');
							window.location.href='registration_teacher.html';</script>";
		die();
	}

?>

