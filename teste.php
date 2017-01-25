<?php 
//criar sessão de segurança
@ini_set('display_errors', '1');
error_reporting(E_ALL); 
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
$teste = array("desafio" => array(15,18,52,57,106));
$desafios = array(15, 17, 52, 58, 107, 108, 60, 19);
$objetivo = 4;
$fase = 5;

$res = desFas($objetivo,$desafios,$fase,$teste);

echo "teste";
echo "<br />";
var_dump($teste);
echo "<br />";
echo "<br />";
echo "desafios";
echo "<br />";
var_dump($desafios);
echo "<br />";
echo "<br />";
echo "res";
echo "<br />";
var_dump($res);
echo "<br />";

$con = bancoMysqli();
$sql_des = "SELECT id,desafio FROM iap_aceite WHERE objetivo = '$objetivo'"; //Seleciona todos os desafios do nível atual
$query_des = mysqli_query($con,$sql_des);
$k = mysqli_fetch_array($query_des);

echo "<pre>";
var_dump($k);
echo "<pre>";


?>

</body>
</html>