<?php

header('Content-Type: text/html; charset=utf-8');

$host="localhost"; // Host 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // DB name 
$tbl_name="test_data"; // Table name 

// Connect to server and select database. 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB"); 

mysql_query('SET NAMES utf8');

//include the following 2 files
require_once 'PHPExcel.php';
require_once 'PHPExcel/IOFactory.php';

$path = "sample.xlsx";
$objPHPExcel = PHPExcel_IOFactory::load($path);

foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){
$worksheetTitle = $worksheet->getTitle();
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
}

//Calculationg Columns
$nrColumns = ord($highestColumn) - 64;

//Displaying Sheet Details
/*
echo "File name: " . $path;
echo '<br>';
echo "Sheet name: " . $worksheetTitle;
echo '<br>';
echo "No. of Columns: " . $nrColumns;
echo '<br>';
echo "No. of Rows: " . $highestRow;
echo '<br><br>';
*/

for ($row = 2; $row <= $highestRow; ++ $row) {
$val=array();
for ($col = 0; $col < $highestColumnIndex; ++ $col) {
$cell = $worksheet->getCellByColumnAndRow($col, $row);
$val[] = $cell->getValue();

}

$sql="INSERT INTO $tbl_name (`keyword`, `type`, `code`, `content`, `b`, `c`, `d`, `e`) VALUES ('$val[0]', '$val[1]', '$val[2]', '$val[3]', '$val[4]', '$val[5]', '$val[6]', '$val[7]')"; 
$result = mysql_query($sql);

/* 
if($result)
{
echo "Row " . $row ." : Data successfully inserted. Data No." .$i .'<br>';
}
else
{
echo "Query Failed";
}
*/
}

?>
