<?php 

require_once("../../wp-load.php");
$user = wp_get_current_user();
if(!is_user_logged_in()):

      /*** REMEMBER THE PAGE TO RETURN TO ONCE LOGGED IN ***/      $_SESSION["return_to"] = $_SERVER['REQUEST_URI'];

      /*** REDIRECT TO LOGIN PAGE ***/      header("location: /wordpress/login/login.php");

   endif;
   
  
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

    <title><?php echo $page_title; ?></title>

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
		
		<style type="text/css" media="all">
#box-toggle {
	width:auto;
	margin:0 auto;
	text-align:center;
	font:12px/1.4 Arial, Helvetica, sans-serif;
	}
#box-toggle .tgl {margin-bottom:30px;}
#box-toggle span {
	display:block;
	cursor:pointer;
	font-weight:bold;
	font-size:14px;
	color:#23527c; 
	margin-top:15px;
	}

/*TOOLTIP DESAFIOS*/
.tooltip-explica {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip-explica .tooltiptext-explica {
    visibility: hidden;
    width: 250px;
    height:auto;
    background-color: #183F76;
    color: #ffffff;
    text-align: center;
    border-radius: 6px;
    padding: 8px;
    top: -5px;
    left: 105%; 

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip-explica:hover .tooltiptext-explica {
    visibility: visible;
}

/*LIGHTBOX FOCO E CORPOS*/
a.lightbox img {
/*height: 150px;*/
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
/*margin: 94px 20px 20px 20px;*/
}

/* Styles the lightbox, removes it from sight and adds the fade-in transition */

.lightbox-target {
position: absolute;
top: -100%;
left:0;
width: 100%;
height:100%;
background: rgba(0,0,0,.7);
/*width: 100%;*/
opacity: 0;
-webkit-transition: opacity .5s ease-in-out;
-moz-transition: opacity .5s ease-in-out;
-o-transition: opacity .5s ease-in-out;
transition: opacity .5s ease-in-out;
overflow: scroll;
padding:2%;
color:#ffffff;
}


/* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */


/* Styles the close link, adds the slide down transition */

a.lightbox-close {
display: block;
width:50px;
height:50px;
box-sizing: border-box;
background: white;
color: black;
text-decoration: none;
position: absolute;
top: -80px;
right: 0;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
z-index:1;
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:before {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
-o-transform:rotate(45deg);
transform:rotate(45deg);
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:after {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(-45deg);
-moz-transform:rotate(-45deg);
-o-transform:rotate(-45deg);
transform:rotate(-45deg);
}

/* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

.lightbox-target:target {
opacity: 1;
top: 0;
bottom: 0;
}

.lightbox-target:target a.lightbox-close {
top: 0px;
}

/*LIGHTBOX EVENTOS HOME*/
a.lightbox-home-evento img {
/*height: 150px;*/
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
/*margin: 94px 20px 20px 20px;*/
}

/* Styles the lightbox, removes it from sight and adds the fade-in transition */

.lightbox-target-home-evento {
position: absolute;
top: -100%;
left:0;
width: 100%;
height:100%;
background: rgba(255,255,255,1);
/*width: 100%;*/
opacity: 0;
-webkit-transition: opacity .5s ease-in-out;
-moz-transition: opacity .5s ease-in-out;
-o-transition: opacity .5s ease-in-out;
transition: opacity .5s ease-in-out;
overflow: hidden;
padding:2%;
color:#333333;
border: solid 8px #183f76;
/*left:25%;*/
z-index:10;
}

/* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */


/* Styles the close link, adds the slide down transition */

a.lightbox-close-home-evento {
display: block;
width:50px;
height:50px;
box-sizing: border-box;
background: white;
color: black;
text-decoration: none;
position: absolute;
top: -80px;
right: 0;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
z-index:1;
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close-home-evento:before {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
-o-transform:rotate(45deg);
transform:rotate(45deg);
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close-home-evento:after {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(-45deg);
-moz-transform:rotate(-45deg);
-o-transform:rotate(-45deg);
transform:rotate(-45deg);
}

/* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

.lightbox-target-home-evento:target {
opacity: 1;
top: 0;
bottom: 0;
}

.lightbox-target-home-evento:target a.lightbox-close {
top: 0px;
}

======================

/*LIGHTBOX EVENTOS HOME*/
a.lightbox-target-bloco-home img {
/*height: 150px;*/
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
/*margin: 94px 20px 20px 20px;*/
}

/* Styles the lightbox, removes it from sight and adds the fade-in transition */

.lightbox-target-bloco-home {
position: absolute;
top: -100%;
left:0;
width: 100%;
height:100%;
background: rgba(255,255,255,1);
/*width: 100%;*/
opacity: 0;
-webkit-transition: opacity .5s ease-in-out;
-moz-transition: opacity .5s ease-in-out;
-o-transition: opacity .5s ease-in-out;
transition: opacity .5s ease-in-out;
overflow: hidden;
padding:2%;
color:#333333;
border: solid 8px #183f76;
/*left:25%;*/
z-index:10;
position:fixed;
text-align:center;
}

/* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */


/* Styles the close link, adds the slide down transition */

a.lightbox-target-bloco-home {
display: block;
width:50px;
height:50px;
box-sizing: border-box;
background: white;
color: black;
text-decoration: none;
position: absolute;
top: -80px;
right: 0;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
z-index:1;
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-target-bloco-home:before {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
-o-transform:rotate(45deg);
transform:rotate(45deg);
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-target-bloco-home:after {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(-45deg);
-moz-transform:rotate(-45deg);
-o-transform:rotate(-45deg);
transform:rotate(-45deg);
}

/* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

.lightbox-target-bloco-home:target {
opacity: 1;
top: 0;
bottom: 0;
}

.lightbox-target-bloco-home:target a.lightbox-close {
top: 0px;
}

.tbl-yy{
	width:300px;
	
}

.tbl-yy-left{
	float: left !important;
	width:150px;
	
}


</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript"> 
jQuery.fn.toggleText = function(a,b) {
return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
}

$(document).ready(function(){
	$('.tgl').before('<span>Visualizar</span>');
	$('.tgl').css('display', 'none')
	$('span', '#box-toggle').click(function() {
		$(this).next().slideToggle('slow')
		.siblings('.tgl:visible').slideToggle('fast');
	
		$(this).toggleText('Visualizar','Esconder')
		.siblings('span').next('.tgl:visible').prev()
		.toggleText('Visualizar','Esconder')
	});
})
</script>

<script type="text/javascript">
	function validaMensagem() {

		var mensagem = document.forms["contactform"]["mensagem"].value;

		if (mensagem == '') {
			alert('Ops..parece que você esqueceu de inserir a sua mensagem...');
			return false;
		} 
		

	}
</script>
   
  </head>

  <body>