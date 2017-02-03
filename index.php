<?php
   require_once("../wp-load.php");
   
    if(is_user_logged_in()){
		header("location: user/index.php");
	}else{
		header("location: ../index.php");	
	}
   
?>