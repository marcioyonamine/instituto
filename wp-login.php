<?php
/*** PREVENT THE PAGE FROM BEING CACHED BY THE WEB BROWSER ***/header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

require_once("wp-authenticate.php");

/*** REQUIRE USER AUTHENTICATION ***/login();

/*** RETRIEVE LOGGED IN USER INFORMATION ***/$user = wp_get_current_user();

function converterObjParaArray($data) { //função que transforma objeto vindo do json em array

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
}

$usuario = converterObjParaArray($user);

$_SESSION['usuario'] = $usuario['data']['user_login'];
if($usuario['caps']['subscriber']){
$_SESSION['perfil'] = 2;
}
if($usuario['caps']['administrator']){
$_SESSION['perfil'] = 1;
}

$_SESSION['nomeCompleto'] = $usuario['data']['display_name'];
$_SESSION['idUsuario'] = $usuario['data']['ID'];




echo "<pre>";
var_dump($usuario);
echo "</pre>";
header("Location: user/index.php"); 
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";


?>
