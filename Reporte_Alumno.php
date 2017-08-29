<?php
	include 'pdf_plantilla.php';
	require 'a_conexion2.php';

	$query = "SELECT al.nomAlumno,al.dirAlumno,al.dniAlumno,apo.nomApoderado,apo.traApoderado FROM alumno AS al INNER JOIN apoderado AS apo ON al.idApoderado=apo.idApoderado";
	$resultado = $mysqli->query($query);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(25,6,'NOMBRE',1,0,'L',1);
	$pdf->Cell(50,6,'DIRECCION',1,0,'L',1);
	$pdf->Cell(20,6,'DNI',1,0,'L',1);
	$pdf->Cell(25,6,'APODERADO',1,0,'L',1);
	$pdf->Cell(30,6,'TRABAJO',1,1,'C',1);

	$pdf->SetFont('Arial','',8);

	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(25,6,utf8_decode($row['nomAlumno']),1,0,'C');
		$pdf->Cell(50,6,$row['dirAlumno'],1,0,'C');
		$pdf->Cell(20,6,$row['dniAlumno'],1,0,'C');
		$pdf->Cell(25,6,$row['nomApoderado'],1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['traApoderado']),1,1,'C');
	}
	$pdf->Output();
?>
