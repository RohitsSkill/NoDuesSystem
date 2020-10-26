<?php
$post='hod';
$totle = array();
				$host="localhost";
				$user="root";
				$pass="";
				$db="nd";
				$conn = new mysqli($host,$user,$pass,$db);
			
				if(!mysqli_connect_error()){

					$select_data="SELECT * From users Where post !=?";
					
					$stmt=$conn->prepare($select_data);
					$stmt->bind_param("s",$post);
					$stmt->execute();
                    
                        $arr;
                        $i=0;
						$result=$stmt->get_result();
						while($user=$result->fetch_assoc()){
                                
                                $temp = [
									"name"=>$user['name'],
									"username"=>$user['username'],
									"lab_no"=>$user['lab_no']
								];

								array_push($totle,$temp);
                               // $users[$i];
                                $i++;
                      
                        
						}      
						$data = [
							"users"=>$totle
						];
                        echo json_encode($data);          
					$stmt->close();
				}
				else{
					echo "connection_failled";


				}
?>