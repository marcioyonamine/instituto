<?php
 session_start();
 setcookie('PHPSESSID', '', -3600, '/cv');
 session_destroy();
 header('location:http://ialtaperformance.com');
?>