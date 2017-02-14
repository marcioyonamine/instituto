<?php
//Exibe erros PHP
//@ini_set('display_errors', '1');
//error_reporting(E_ALL); 

$DBUSER="ialtaper_root";
$DBPASSWD="%T*BKdbLLTSk";
$DATABASE1="ialtaper_instituto";
$DATABASE2="ialtaper_sistema";

$filename1 = "backup-$DATABASE1" . date("YmdHis") . ".sql.gz";
$filename2 = "backup-$DATABASE2" . date("YmdHis") . ".sql.gz";
$mime = "application/x-gzip";

header( "Content-Type: " . $mime );
header( 'Content-Disposition: attachment; filename="' . $filename1 . '"' );

$cmd1 = "mysqldump -u $DBUSER --password=$DBPASSWD -h localhost $DATABASE1 | gzip --best > /home/ialtaperformance/public_html/sistema/sql/$filename1";   

passthru( $cmd1 );

header( "Content-Type: " . $mime );
header( 'Content-Disposition: attachment; filename="' . $filename2 . '"' );

$cmd2 = "mysqldump -u $DBUSER --password=$DBPASSWD -h localhost $DATABASE2 | gzip --best > /home/ialtaperformance/public_html/sistema/sql/$filename2";   

passthru( $cmd2 );




exit(0);
?>