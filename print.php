<?php

				require('fpdf181/fpdf.php');
				$pdf=new FPDF('L','mm','A4');
				$pdf->AddPage();
				$pdf->SetFont('Arial','B',20);
				$pdf->Cell(285,10,'JIT LAB MANAGEMENT SYSTEM',0,1,'C',false);
				$pdf->Cell(285,10,'REPORT',0,1,'C',false);

				$pdf->Ln();
			//	$pdf->Cell("REPORT");

				$pdf->SetFont('Arial','B',10);


		
				$width_cell=array(15,15,15,30,130,30,30,20);
				$pdf->SetFillColor(1,93,229,252);

				$pdf->Cell($width_cell[0],10,'PID',1,0,'L',false);
				$pdf->Cell($width_cell[1],10,'LAB NO',1,0,'L',false);
				$pdf->Cell($width_cell[2],10,'PC NO',1,0,'L',false);
				$pdf->Cell($width_cell[3],10,'CREATE BY',1,0,'L',false);
				$pdf->Cell($width_cell[4],10,'DESCRIPTION',1,0,'L',false);
				$pdf->Cell($width_cell[5],10,'CREATE DATE',1,0,'L',false);
				$pdf->Cell($width_cell[6],10,'SOLVED DATE',1,0,'L',false);
				$pdf->Cell($width_cell[7],10,'STATUS',1,1,'L',false);
		

				$pdf->SetFont('Arial','',10);

	
				$host="localhost";
				$user="root";
				$password="";
				$db="lms";
				$conn = new mysqli($host,$user,$password,$db);
			
				if(!mysqli_connect_error()){

					$select="SELECT * FROM pc_problems ORDER BY status";

					$stmt=$conn->prepare($select);
					$stmt->execute();
					$result=$stmt->get_result();



					while($row=$result->fetch_assoc()){

						$pdf->Cell($width_cell[0],10,$row['pid'],1,0,'L',false);
						$pdf->Cell($width_cell[1],10,$row['lab_no'],1,0,'L',false);
						$pdf->Cell($width_cell[2],10,$row['pc_no'],1,0,'L',false);
						$pdf->Cell($width_cell[3],10,$row['created_by'],1,0,'L',false);
						$pdf->Cell($width_cell[4],10,$row['description'],1,0,'L',false);
						$pdf->Cell($width_cell[5],10,$row['create_on'],1,0,'L',false);
						$pdf->Cell($width_cell[6],10,$row['solved_on'],1,0,'L',false);
						$pdf->Cell($width_cell[7],10,$row['status'],1,1,'L',false);

					}
					
					$pdf->SetFont('Arial','B',15);
					$array=array(45,225);
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Ln();
					$pdf->Cell(45,10,'Admin Sign',0,0,'R',false);
					$pdf->Cell(215,10,'HOD Sign',0,1,'R',false);
					$pdf->Cell(45,10,'(_ _ _ _ _ _ _ _ _ _)',0,0,'L',false);
					$pdf->Cell(225,10,'(_ _ _ _ _ _ _ _ _ _)',0,1,'R',false);
				
					}
					else{
						echo("due to connection it get failled!!");
					}
			
				
				$pdf->Output('lms_report.pdf','D');

?>
