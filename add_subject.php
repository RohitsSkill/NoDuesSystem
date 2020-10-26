<?php
	session_start();
	$sub_name=$_POST['sub_name'];
	$teacher=$_SESSION['username'];
	$sem=$_POST['sem'];
	$year=$_POST['year'];
	$status="notdone";

	if(!empty($sub_name) && !empty($sem) && !empty($year) && !empty($teacher)){


						$host="localhost";
						$user="root";
						$password="";
						$db="nd";
						$conn = new mysqli($host,$user,$password,$db);
			
						if(!mysqli_connect_error()){

							$select_sub="SELECT sub From subject Where sub = ? Limit 1";
							$select_sem="SELECT sem From subject Where sem = ? and year = ? and teacher = ? Limit 1";
							$insert_sub="INSERT Into subject (sem,year,sub,teacher) Values(?,?,?,?)";
							$get_username="select username from student where sem=? and year=?";
							$insert_stud_sub="insert into stud_sub values(?,?,?,?,?,?)";

							$stmt=$conn->prepare($select_sub);
							$stmt->bind_param("s",$sub_name);
							$stmt->execute();
							$stmt->bind_result($sub_name);
							$stmt->store_result();
							$row_num=$stmt->num_rows;
			
							if($row_num==0){
								$stmt->close();
								$stmt=$conn->prepare($select_sem);
								$stmt->bind_param("iss",$sem,$year,$teacher);
								$stmt->execute();
								$stmt->bind_result($sem);
								$stmt->store_result();
								$row_num=$stmt->num_rows;

								if($row_num==0){
									if($year=="se" || $year=="te" || $year=="be"){
										$stmt->close();
										$stmt=$conn->prepare($insert_sub);
										$stmt->bind_param("isss",$sem,$year,$sub_name,$teacher);
										$stmt->execute();

										$stmt=$conn->prepare($get_username);	
										$stmt->bind_param("is",$sem,$year);
										$stmt->execute();
										$result=$stmt->get_result();
										while($row=$result->fetch_assoc()){
											$stmt->close();
											$stmt=$conn->prepare($insert_stud_sub);
											$stmt->bind_param("ssisss",$row['username'],$year,$sem,$sub_name,$status,$status);
											$stmt->execute();
										}
										echo "Subject Added successfull !!";
										echo "<script>alert('Subject Added successfull...!!');
    							      window.location.href='add_new_subject.php';</script>";	
									}
									else{
										echo "year should be like se,te,be ";
										echo "<script>alert('Year should be like se,te,be...!!');
    							      window.location.href='add_new_subject.php';</script>";	
									}
								}	
								else{
									echo "You can not add more than 1 subject for same semester...!!";
									echo "<script>alert('You can not add more than 1 subject for same semester..!!');
    							      window.location.href='add_new_subject.php';</script>";

								}			
		
							}
							else{
									echo "This subject already added by someone...!!";
									echo "<script>alert('This subject already added by someone...!!');
    							      window.location.href='add_new_subject.php';</script>";
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
					
		

	}
	
	
	else{
		echo "empty field";
		die();
	}

?>

