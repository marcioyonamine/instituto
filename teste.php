<?php 
//criar sessão de segurança
session_start();
include "inc/functions.php";
$con = bancoMysqli();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<?php 
$tudo = array(1,2,3,4,5,6,7);
$caixa = array(6,3,7,2);

	$dif =  array_diff($tudo, $caixa); // compara as duas arrays
var_dump($dif);
?>

</body>
</html>