<?php
session_start();
//echo print_r($_SESSION['user_cart']);
//echo print_r($array);	
date_default_timezone_set('Asia/Colombo');
require('fpdf183/fpdf.php');
$date = date("l jS \of F Y h:i:s A") ;
$date = getdate();
$order_id = "$date[year]$date[mon]$date[mday]$date[hours]$date[minutes]$date[seconds]$_SESSION['user_id']";

$total_price=0;
$name = $_SESSION['user_name'];
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,"NIMNDAA's FOOD",0,0);
$pdf->Cell(59	,5,'Name:'.$name,0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(15	,5,'Date:',0,0);
$pdf->Cell(20	,5,$date,0,1);//end of line


$pdf->Cell(15	,5,'Order ID:',0,0);
$pdf->Cell(20	,5,$order_id,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(50	,5,'Item',1,0);
$pdf->Cell(25	,5,'portion',1,0);
$pdf->Cell(25	,5,'Quantity',1,0);
//$pdf->Cell(25	,5,'Unit_Price',1,0);
$pdf->Cell(50	,5,'Aditional_item_price',1,0);
$pdf->Cell(40	,5,'Item_Total',1,1);
$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

 foreach ($_SESSION["user_cart"] as $items) {
     $pdf->Cell(50, 5, $items[1], 1, 0);
     $pdf->Cell(25, 5,'LKR.'. $items[5].'.00', 1, 0);
     $pdf->Cell(25, 5, $items[2], 1, 0);
     $pdf->Cell(50, 5,'LKR.'. $items[4].'.00', 1, 0);
     $pdf->Cell(40, 5,'LKR.'. ($items[6] + ((int)$items[4] * (int)$items[2])).'.00', 1, 1);
     
 }
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(150,5,'Total Bill:',1,0);
    $pdf->Cell(40	,5,'LKR.'. $_SESSION['total'].'.00',1,1);//end of line
 

$pdf->Output("Nimndaa's Food-$name.pdf",'D');
?>
