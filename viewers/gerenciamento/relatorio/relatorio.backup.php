<?php
require('../../../fpdf/fpdf.php');
require('../../../engine/bd/bd.php');

// Funções para conversão de caracteres especiais

function em($word) {

    $word = str_replace("@","%40",$word);
    $word = str_replace("`","%60",$word);
    $word = str_replace("¢","%A2",$word);
    $word = str_replace("£","%A3",$word);
    $word = str_replace("¥","%A5",$word);
    $word = str_replace("|","%A6",$word);
    $word = str_replace("«","%AB",$word);
    $word = str_replace("¬","%AC",$word);
    $word = str_replace("¯","%AD",$word);
    $word = str_replace("º","%B0",$word);
    $word = str_replace("±","%B1",$word);
    $word = str_replace("ª","%B2",$word);
    $word = str_replace("µ","%B5",$word);
    $word = str_replace("»","%BB",$word);
    $word = str_replace("¼","%BC",$word);
    $word = str_replace("½","%BD",$word);
    $word = str_replace("¿","%BF",$word);
    $word = str_replace("À","%C0",$word);
    $word = str_replace("Á","%C1",$word);
    $word = str_replace("Â","%C2",$word);
    $word = str_replace("Ã","%C3",$word);
    $word = str_replace("Ä","%C4",$word);
    $word = str_replace("Å","%C5",$word);
    $word = str_replace("Æ","%C6",$word);
    $word = str_replace("Ç","%C7",$word);
    $word = str_replace("È","%C8",$word);
    $word = str_replace("É","%C9",$word);
    $word = str_replace("Ê","%CA",$word);
    $word = str_replace("Ë","%CB",$word);
    $word = str_replace("Ì","%CC",$word);
    $word = str_replace("Í","%CD",$word);
    $word = str_replace("Î","%CE",$word);
    $word = str_replace("Ï","%CF",$word);
    $word = str_replace("Ð","%D0",$word);
    $word = str_replace("Ñ","%D1",$word);
    $word = str_replace("Ò","%D2",$word);
    $word = str_replace("Ó","%D3",$word);
    $word = str_replace("Ô","%D4",$word);
    $word = str_replace("Õ","%D5",$word);
    $word = str_replace("Ö","%D6",$word);
    $word = str_replace("Ø","%D8",$word);
    $word = str_replace("Ù","%D9",$word);
    $word = str_replace("Ú","%DA",$word);
    $word = str_replace("Û","%DB",$word);
    $word = str_replace("Ü","%DC",$word);
    $word = str_replace("Ý","%DD",$word);
    $word = str_replace("Þ","%DE",$word);
    $word = str_replace("ß","%DF",$word);
    $word = str_replace("à","%E0",$word);
    $word = str_replace("á","%E1",$word);
    $word = str_replace("â","%E2",$word);
    $word = str_replace("ã","%E3",$word);
    $word = str_replace("ä","%E4",$word);
    $word = str_replace("å","%E5",$word);
    $word = str_replace("æ","%E6",$word);
    $word = str_replace("ç","%E7",$word);
    $word = str_replace("è","%E8",$word);
    $word = str_replace("é","%E9",$word);
    $word = str_replace("ê","%EA",$word);
    $word = str_replace("ë","%EB",$word);
    $word = str_replace("ì","%EC",$word);
    $word = str_replace("í","%ED",$word);
    $word = str_replace("î","%EE",$word);
    $word = str_replace("ï","%EF",$word);
    $word = str_replace("ð","%F0",$word);
    $word = str_replace("ñ","%F1",$word);
    $word = str_replace("ò","%F2",$word);
    $word = str_replace("ó","%F3",$word);
    $word = str_replace("ô","%F4",$word);
    $word = str_replace("õ","%F5",$word);
    $word = str_replace("ö","%F6",$word);
    $word = str_replace("÷","%F7",$word);
    $word = str_replace("ø","%F8",$word);
    $word = str_replace("ù","%F9",$word);
    $word = str_replace("ú","%FA",$word);
    $word = str_replace("û","%FB",$word);
    $word = str_replace("ü","%FC",$word);
    $word = str_replace("ý","%FD",$word);
    $word = str_replace("þ","%FE",$word);
    $word = str_replace("ÿ","%FF",$word);
    return $word;
}



if(empty($_POST['mes'])){            //a condição deve ser !empty
	//$f_mes=$_POST['mes'];
	//$f_curso=$_POST['curso'];
	

$pdf = new FPDF();
$pdf->AddPage();
										//INÍCIO DO CABEÇALHO
$pdf->Image('../../../img/logo_brasao_republica.png', 10,8,25,26,'PNG');
$pdf->Image('../../../img/logo_ufvjm.gif', 168,8,36,30,'GIF');
$pdf->SetFont('Arial','',10);
$str_minist = "MINISTÉRIO DA EDUCAÇÃO"; //string ministerio
$str_minist = em($str_minist);
$str_minist = urldecode($str_minist);
$pdf->Cell(190,10,$str_minist, 0,0,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial','B',11);
$str_bol = "RELATÓRIO DE AFASTAMENTO"; //string ministerio
$str_bol = em($str_bol);
$str_bol = urldecode($str_bol);
$pdf->Cell(190,10,$str_bol, 0,0,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'UNIVERSIDADE FEDERAL DOS VALES DO JEQUITINHONHA E MUCURI', 0,0,'C');
$pdf->Ln(6);
$pdf->Image('../../../img/logo_brasao_republica.png', 10,8,25,26,'PNG');
$str_ict = "INSTITUTO DE CIÊNCIA E TECNOLOGIA"; //string ministerio
$str_ict = em($str_ict);
$str_ict = urldecode($str_ict);
$pdf->Cell(190,10,$str_ict, 0,0,'C');
$pdf->Ln(6);
$pdf->Image('../../../img/logo_brasao_republica.png', 10,8,25,26,'PNG');
$str_curso = "NOME DO CURSO"; //string ministerio
$str_curso = em($str_curso);
$str_curso = urldecode($str_curso);
$pdf->Cell(190,10,$str_curso, 0,0,'C');
$pdf->Ln(10);
										// FIM DO CABEÇALHO
$pdf->SetFont('Arial','',9);
$pdf->Cell(180,10,'Emitido em: '.date('d/m/Y').'',0,0,'R');
$pdf->Ln(10);

$pdf->Cell(10,10,'');
$pdf->SetFont('Arial','B',10);
$str_peri = "PERÍODO: "; //string ministerio
$str_peri = em($str_peri);
$str_peri = urldecode($str_peri);
$pdf->Cell(20,10,$str_peri, 0,0,'J');
$pdf->SetFont('Arial','',10);
$str_mes = "JUNHO/2016 "; //string ministerio
$str_mes = em($str_mes);
$str_mes = urldecode($str_mes);
$pdf->Cell(30,10,$str_mes, 0,0,'J');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(3,8,'');
$pdf->Cell(20,8,'SIAPE', 1,0,'C');
$pdf->Cell(50,8,'SERVIDOR', 1,0,'C');
$pdf->Cell(20,8,'INICIO', 1,0,'C');
$pdf->Cell(20,8,'FIM', 1,0,'C');
$pdf->Cell(20,8,'COD.', 1,0,'C');
$str_obs = "OBSERVAÇÃO "; //string especial
$str_obs = em($str_obs);
$str_obs = urldecode($str_obs);
$pdf->Cell(60,8,$str_obs, 1,0,'C');



//$pdf->Cell(190,10,$f_mes, 0,0,'C');




$pdf->Output();			//Exibe o documento em pdf
}

else{
	 echo "<h2 align='center'><br> Falha ao abrir relatório!</h2>";
	}
?>

