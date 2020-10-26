<?php
$post='hod';
$check=array();
$flag="nf";
$year="te";//$_POST['year'];
				$host="localhost";
				$user="root";
				$pass="";
				$db="nd";
				$conn = new mysqli($host,$user,$pass,$db);
			
				if(!mysqli_connect_error()){

					$select_data="SELECT s.name,ss.username,ss.status From stud_sub ss,student s Where ss.year = ? and ss.username=s.username order by s.name";
					
					
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
								}
							}	
							if($flag!="found"){

								$check[$j]=$user['username'];
                                $users[$i]=[
									"name"=>$user['name'],
									"status"=>$user['status']
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