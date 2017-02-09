<?php $page_title = "iAP | Próximos eventos"; ?>
<?php include '../inc/header.php';?>



<div class="container">
	<?php include '../inc/fixed-navbar-user.php'; ?>
	<?php include '../inc/menu-principal.php'; ?>

	<div class="jumbotron">
		<?php echo "<h1>Agenda</h1>"; ?>
	</div>

<?php 
      $events = eo_get_events(array(
              'numberposts'=>5,
              'event_start_after'=>'today',
              'showpastevents'=>true,//Will be deprecated, but set it to true to play it safe.
         ));

       if($events):
          echo '<ul>';
          foreach ($events as $event):
               //Check if all day, set format accordingly
               $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );
               printf(
                  '<li><a href="%s"> %s </a> on %s </li>',
                  get_permalink($event->ID),
                  get_the_title($event->ID),
                  eo_get_the_start( $format, $event->ID, $event->occurrence_id )
               );
          endforeach;
          echo '</ul>';
       endif;

?>

	
		<?php include '../inc/footer.php'; ?>
	

</div>