<?php
	session_start();
	$username=$_POST['username'];
	$teacher=$_SESSION['username'];

	$newstatus="done";
	
						$host="localhost";
						$user="root";
						$password="";
						$db="nd";
						$conn = new mysqli($host,$user,$password,$db);
			
						if(!mysqli_connect_error()){

							$select="SELECT ss.t_status From stud_sub ss,subject s Where ss.username = ? and s.teacher = ? and ss.sub=s.sub";
							$update="UPDATE stud_sub ss,subject s SET ss.t_status = ? where ss.username = ? and s.teacher = ? and ss.sub=s.sub";
						//	$remove="UPDATE  users SET post = 'NULL' WHERE username = ?";


							$stmt=$conn->prepare($select);
							$stmt->bind_param("ss",$username,$teacher);
							$stmt->execute();
							$result=$stmt->get_result();
							$res=$result->fetch_assoc();
			
							if($res['t_status'] =="done"){
								echo "Already Done...!!";
								echo "<script>alert('Already Done...!!');
       								   window.location.href='teacher_home.php';</script>";

							}
							else{
								$stmt->close();
								$stmt=$conn->prepare($update);
								$stmt->bind_param("sss",$newstatus,$username,$teacher);
								$stmt->execute();
								echo "Done..!!";
								echo "<script>alert('Done...!!');
      							    window.location.href='teacher_home.php';</script>";	
							}
							$stmt->close();
							$conn->close();
						}
						else{
								echo("Connection is not successful.");
								echo "<script>alert('Connection Failled...!!');
    							      window.location.href='teacher_home.php';</script>";
								echo mysqli_connect_error();

						}
					

?>

