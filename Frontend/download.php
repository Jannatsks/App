<?php
//Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complex_rent_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Retrieve shop ID and format from URL parameters
$id = $_GET["id"];
$format = $_GET["format"];

//Fetch rent status of the shop
$sql = "SELECT rent_status FROM shops WHERE id = " . $id;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $rent_status = $row["rent_status"];
    }
} else {
    echo "0 results";
    exit();
}

//Generate file based on requested format
if ($format == "pdf") {
    //Generate PDF file using a PDF library like TCPDF or FPDF
    require('tcpdf/tcpdf.php');
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Write(10, 'Rent Status: ' . $rent_status);
    $pdf->Output('Rent_Status.pdf', 'D');
} else if ($format == "excel") {
    //Generate Excel file using a library like PHPExcel
    require('PHPExcel/Classes/PHPExcel.php');
    $objPHPExcel = new
