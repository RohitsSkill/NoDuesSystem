<?php
//session_start();
$username=$_SESSION["username"];

				$host="localhost";
				$user="root";
				$pass="";
				$db="nd";
				$conn = new mysqli($host,$user,$pass,$db);
			
				if(!mysqli_connect_error()){

					$select_data="SELECT sub,status,t_status From stud_sub Where username = ? order by sub";
					
					
					$stmt=$conn->prepare($select_data);
					$stmt->bind_param("s",$username);
					$stmt->execute();
					$result=$stmt->get_result();
					$stmt->close();
					
						$status="done";
						$row=$result->fetch_assoc();
						if($row['status']!=null){
							echo "<table><tr><td><h3>Regarding</h3></td><td><h3>-----------</h3></td><td><h3>Status</h3></td></tr>";

						
							while($row!=null){

									if($row['status']!='done'){
										$status="notdone";
									}
									  echo "<tr><td><h3>";
									  echo  $row['sub'] ;
									  echo "</h3></td><td><h3>-----------</h3></td><td><h3>" ;
									  echo  $row['t_status'];
									  echo "</h3></td></tr>";

									  $row=$result->fetch_assoc();
						  
							}
							echo "<tr><td><h3>";
							echo  "hod";
							echo "</h3></td><td><h3>-----------</h3></td><td><h3>" ;
							echo  $status;
							echo "</h3></td></tr>";
							echo "</table>";
	
						}	  
						else{
								echo "NO SUBJECT ADDED BY TEACHER IN SELECTED SEMESTER";
						}
							
                       //         $status[$i]=[
						//			"subject"=>$row['sub'],
						//			"h_status"=>$row['status'],
						//			"t_status"=>$row['t_status']
						//		];
							
						//		$i++; 
                        
					//	}      
					//	$data=[
					//		"subject"=>$status
					//	];
						//echo json_encode($data); 
				}
				else{
					echo "connection_failled";


				}
?>