<?php
$post='hod';
$check=array();
$flag="nf";
$year="se";
$year=$_POST['year'];
				$host="localhost";
				$user="root";
				$pass="";
				$db="nd";
				$conn = new mysqli($host,$user,$pass,$db);
			
				if(!mysqli_connect_error()){

					$select_data="SELECT s.name,ss.username,s.year,s.sem,ss.status,ss.t_status From stud_sub ss,student s Where ss.year = ? and ss.username=s.username order by ss.status";
					
					
					$stmt=$conn->prepare($select_data);
					$stmt->bind_param("s",$year);
					$stmt->execute();
                    
                        $users=array();
						$i=0;
						$j=0;
						$result=$stmt->get_result();
						$stmt->close();
						
						while($user=$result->fetch_assoc()){

							for($j=0; $j<sizeof($check) ; $j++){
								if($check[$j]==$user['username']){
										$flag="found";
										if($user['t_status']=="notdone"){
											$users[$j]=[
												"name"=>$user['name'],
												"username"=>$user['username'],
												"year"=>$user['year'],
												 "sem"=>$user['sem'],
												"status"=>$user['status'],
												"t_status"=>$user['t_status']
											];
										}
								}
							}	
							if($flag!="found"){


								$check[$j]=$user['username'];
                                $users[$i]=[
									"name"=>$user['name'],
									"username"=>$user['username'],
									"year"=>$user['year'],
									"sem"=>$user['sem'],
									"status"=>$user['status'],
									"t_status"=>$user['t_status']

								];
							
								$i++; 
								
							}
							else{
								$flag="reset";
							}
                        
						}      
						$student=[
							"student"=>$users
						];
						echo json_encode($student); 
				}
				else{
					echo "connection_failled";


				}
?>