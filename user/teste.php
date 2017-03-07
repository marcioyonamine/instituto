<?php 
@ini_set('display_errors', '1');
error_reporting(E_ALL); 

require_once("../../wp-load.php"); //carrega WP
require_once("../inc/functions.php"); //carrega as funcoes
require_once("../inc/lib/fpdf/fpdf.php"); //carrega a biblioteca PDF

$con = bancoMysqli();
					$sql_rec = "SHOW COLUMNS FROM iap_aceite";
					$query_rec = mysqli_query($con,$sql_rec);
					while($x = mysqli_fetch_assoc($query_rec)){	
						$desrec[$x['Field']] = "";	
					}
echo "<pre>";
print_r($desrec);
echo "</pre>";
