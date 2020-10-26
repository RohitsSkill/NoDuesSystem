<?php

	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$cnf_pass=$_POST['cnf_pass'];
	$username=$_POST['user'];
	$sem=$_POST['sem'];
	$year=$_POST['year'];
	$status="notdone";

	if(!empty($name) || !empty($sem)  ||  !empty($year) || !empty($username) || !empty($pass)){
				if(preg_match("/^[\sa-zA-Z]*$/",$name)){
						$host="localhost";
						$user="root";
						$password="";
						$db="nd";
						$conn = new mysqli($host,$user,$password,$db);
			
						if(!mysqli_connect_error()){
							if($pass==$cnf_pass){

							$select="SELECT username From student Where username = ?";
							$insert_personal="INSERT Into student (name,year,sem,username,password) Values(?,?,?,?,?)";
							$get_sub="select sub from subject where sem=? and year=?";
							$insert_stud_sub="insert into stud_sub values(?,?,?,?,?,?)";

							$stmt=$conn->prepare($select);
							$stmt->bind_param("s",$username);
							$stmt->execute();
							$stmt->bind_result($username);
							$stmt->store_result();
							$row_num=$stmt->num_rows;
			
							if($row_num==0){
								$stmt->close();
								$stmt=$conn->prepare($insert_personal);
								$stmt->bind_param("ssiss",$name,$year,$sem,$username,$pass);
								$stmt->execute();
								$stmt->close();
								
								$stmt=$conn->prepare($get_sub);
								$stmt->bind_param("is",$sem,$year);
								$stmt->execute();
								$result=$stmt->get_result();
								while($row=$result->fetch_assoc()){
									$stmt->close();
									$stmt=$conn->prepare($insert_stud_sub);
									$stmt->bind_param("ssisss",$username,$year,$sem,$row['sub'],$status,$status);
									$stmt->execute();
								}
								echo "<script>alert('REgistration successfull..!!');
									window.location.href='login_student.html';</script>";					
		
							}
							else{
									echo "<script>alert('Someone already registered for same username...!!');
									window.location.href='registration_student.html';</script>";
							}
							$stmt->close();
							$conn->close();
							}
							else{
								echo "<script>alert('Carefully conform your password...!!');
								window.location.href='registration_student.html';</script>";
							}
						}
						else{
							echo "<script>alert('Connection is not successfull...!!');
							window.location.href='registration_student.html';</script>";
								echo mysqli_connect_error();

						}
					}	
					else{
						echo "<script>alert('Name not valid...!!');
						window.location.href='registration_student.html';</script>";					}
			

	}
	
	
	else{
		echo "empty field";
		die();
	}

?>

