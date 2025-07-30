 <?php


error_reporting(E_ALL);
ini_set('display_errors', 1);


require('pdffile/tfpdf.php');


$name = $_POST['name'];
$enrollment_no = $_POST['enrollment_no'];
$cert_no = $_POST['cert_no'];
$department = $_POST['department'];
$startdate = $_POST['start_date'];  
$enddate = $_POST['end_date'];




// Create instance of tFPDF
$pdf = new tFPDF();
$pdf->AddPage();


// Set text color
// $pdf->SetTextColor(87, 5, 2);


// Get page dimensions
$pageWidth = $pdf->GetPageWidth();
$pageHeight = $pdf->GetPageHeight();


// Path to the image
$imagePath = 'img/certificate-intern5.png';


// Get original image dimensions
list($imgWidth, $imgHeight) = getimagesize($imagePath);


// Calculate scaling ratio to fit image within page dimensions
$scale = min($pageWidth / $imgWidth, $pageHeight / $imgHeight);


// Calculate new image dimensions
$newWidth = $imgWidth * $scale;
$newHeight = $imgHeight * $scale;


// Calculate position to center the image on the page
$xPos = ($pageWidth - $newWidth) / 2;
$yPos = ($pageHeight - $newHeight) / 2;


// Insert the image into the PDF
$pdf->Image($imagePath, $xPos, $yPos, $newWidth, $newHeight);
// Add Certificate No.
$pdf->SetFont('Helvetica', 'B', 15.6);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(115, 191);
$pdf->Cell(80, 10, $cert_no, 0, 1, 'L');


// Add Enrollment No.
$pdf->SetFont('Helvetica', 'B', 15.6);
$pdf->SetXY(95, 201);
$pdf->Cell(80, 10, $enrollment_no, 0, 1, 'L');




// Add Student Name (Centered)
$pdf->SetFont('Times', '', 65);
$pdf->SetTextColor(18, 101, 123);
$textWidth = $pdf->GetStringWidth($name);
$xPosition = ($pageWidth - $textWidth) / 2;
$pdf->SetXY($xPosition, 148);
$pdf->Cell($textWidth + 10, 10, $name, 0, 1, 'C');


// Add Internship Completion Text (Multiline, Centered)


$pdf->SetFont('Helvetica', '', 13);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(30, 172);
$pdf->MultiCell(150, 8, "We are happy to certify that $name has completed their internship as a \"$department\" from $startdate to $enddate.", 0, 'C');


// Output the PDF to the browser
$pdf->Output('D', 'internship_certificate.pdf');


















?>







