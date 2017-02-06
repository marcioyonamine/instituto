<?php 

require_once("../../wp-load.php");
$user = wp_get_current_user();
include "../inc/functions.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Instituto de Alta Performance">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>IAP - Busca de objetivos</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../user/justified-nav.css" rel="stylesheet">
    <link rel="alternate" type="application/json+oembed" href="http://amarelinha.cc/wordpress/index.php/wp-json/oembed/1.0/embed?url=http%3A%2F%2Famarelinha.cc%2Fwordpress%2Findex.php%2Fcalendario%2F">
<link rel="alternate" type="text/xml+oembed" href="http://amarelinha.cc/wordpress/index.php/wp-json/oembed/1.0/embed?url=http%3A%2F%2Famarelinha.cc%2Fwordpress%2Findex.php%2Fcalendario%2F&amp;format=xml">
<div class="container">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel='stylesheet' id='eo_front-css'  href='http://amarelinha.cc/wordpress/wp-content/plugins/event-organiser/css/eventorganiser-front-end.min.css?ver=3.1.7' type='text/css' media='all' />
<link rel='stylesheet' id='eo_calendar-style-css'  href='http://amarelinha.cc/wordpress/wp-content/plugins/event-organiser/css/fullcalendar.min.css?ver=3.1.7' type='text/css' media='all' />
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-includes/js/admin-bar.min.js?ver=4.7.2'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var twentyseventeenScreenReaderText = {"quote":"<svg class=\"icon icon-quote-right\" aria-hidden=\"true\" role=\"img\"> <use href=\"#icon-quote-right\" xlink:href=\"#icon-quote-right\"><\/use> <\/svg>"};
/* ]]> */
</script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-content/themes/twentyseventeen/assets/js/skip-link-focus-fix.js?ver=1.0'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-content/themes/twentyseventeen/assets/js/global.js?ver=1.0'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-content/themes/twentyseventeen/assets/js/jquery.scrollTo.js?ver=2.1.2'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-includes/js/wp-embed.min.js?ver=4.7.2'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-content/plugins/event-organiser/js/qtip2.js?ver=3.1.7'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-includes/js/jquery/ui/button.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-includes/js/jquery/ui/datepicker.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-content/plugins/event-organiser/js/moment.min.js?ver=1'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-content/plugins/event-organiser/js/fullcalendar.min.js?ver=3.1.7'></script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-content/plugins/event-organiser/js/event-manager.min.js?ver=3.1.7'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var EOAjaxFront = {"adminajax":"http:\/\/amarelinha.cc\/wordpress\/wp-admin\/admin-ajax.php","locale":{"locale":"pt","isrtl":false,"monthNames":["janeiro","fevereiro","mar\u00e7o","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro"],"monthAbbrev":["jan","fev","mar","abr","maio","jun","jul","ago","set","out","nov","dez"],"dayNames":["domingo","segunda-feira","ter\u00e7a-feira","quarta-feira","quinta-feira","sexta-feira","s\u00e1bado"],"dayAbbrev":["dom","seg","ter","qua","qui","sex","s\u00e1b"],"dayInitial":["D","S","T","Q","Q","S","S"],"ShowMore":"Mais","ShowLess":"Menos","today":"hoje","day":"dia","week":"semana","month":"m\u00eas","gotodate":"ir para a data","cat":"Exibir todas as categorias","venue":"Exibir todos os locais","tag":"View all tags","nextText":">","prevText":"<"}};
var eventorganiser = {"ajaxurl":"http:\/\/amarelinha.cc\/wordpress\/wp-admin\/admin-ajax.php","calendars":[{"headerleft":"title","headercenter":"","headerright":"prev next today","defaultview":"month","aspectratio":false,"compact":false,"event-category":"","event_category":"","event-venue":"","event_venue":"","event-tag":"","author":false,"author_name":false,"timeformat":"HH:mm","axisformat":"HH:mm","tooltip":true,"weekends":true,"mintime":"0:00","maxtime":"24:00","slotduration":"00:30:00","nextdaythreshold":"06:00:00","alldayslot":true,"alldaytext":"Dia todo","columnformatmonth":"ddd","columnformatweek":"ddd M\/D","columnformatday":"dddd M\/D","titleformatmonth":"MMMM YYYY","titleformatweek":"MMM D, YYYY","titleformatday":"dddd, MMM D, YYYY","year":false,"month":false,"date":false,"defaultdate":false,"users_events":false,"event_series":false,"event_occurrence__in":[],"theme":false,"reset":true,"isrtl":false,"responsive":true,"responsivebreakpoint":514,"hiddendays":[],"event_tag":"","event_organiser":0,"timeformatphp":"H:i","axisformatphp":"H:i","columnformatdayphp":"l n\/j","columnformatweekphp":"D n\/j","columnformatmonthphp":"D","titleformatmonthphp":"F Y","titleformatdayphp":"l, M j, Y","titleformatweekphp":"M j, Y"}],"widget_calendars":[],"fullcal":{"firstDay":0,"venues":[],"categories":[],"tags":[]},"map":[]};
/* ]]> */
</script>
<script type='text/javascript' src='http://amarelinha.cc/wordpress/wp-content/plugins/event-organiser/js/frontend.min.js?ver=3.1.7'></script>
	<!--[if lte IE 8]>
		<script type="text/javascript">
			document.body.className = document.body.className.replace( /(^|\s)(no-)?customize-support(?=\s|$)/, '' ) + ' no-customize-support';
		</script>
	<![endif]-->
	<!--[if gte IE 9]><!-->
		<script type="text/javascript">
			(function() {
				var request, b = document.body, c = 'className', cs = 'customize-support', rcs = new RegExp('(^|\\s+)(no-)?'+cs+'(\\s+|$)');

						request = true;
		
				b[c] = b[c].replace( rcs, ' ' );
				// The customizer requires postMessage and CORS (if the site is cross domain)
				b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
			}());
		</script>
    
  </head>

  <body>