<?php $page_title = "iAP | Próximos eventos"; ?>
<?php include '../inc/header.php';?>



<div class="container">
	<?php include '../inc/fixed-navbar-user.php'; ?>
	<?php include '../inc/menu-principal.php'; ?>

	<div class="jumbotron">
		<?php echo "<h1>Agenda</h1>"; ?>
	

<?php 
                $events = eo_get_events(array(
              'numberposts'=>5,
              'event_start_after'=>'today',
              'showpastevents'=>true,//Will be deprecated, but set it to true to play it safe.
         ));

       if($events):
          
          foreach ($events as $event):
			  echo '<p>';
               //Check if all day, set format accordingly
               $format2 = ( eo_is_all_day($event->ID) ? get_option('time_format') : get_option('time_format') );
               $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format') );
				
				$evento = get_post($event->ID);
				$descricao = $evento->post_content;
				//echo $descricao;
				//var_dump($evento);
				
				//Arrumar aqui pra abrir dentro do lightbox..
               echo eo_get_the_start( $format, $event->ID, $event->occurrence_id ) . ' - ' . '<a class="lightbox-home-evento" href="#' . $event->ID . '">' . get_the_title($event->ID) . '</a><div class="lightbox-target-bloco-home" id="' . $event->ID . '"><h2>' . get_the_title($event->ID) . '</h2><br /><p class="lead">' . eo_get_the_start( $format, $event->ID, $event->occurrence_id ) . '</p><p class="lead">' . $descricao . '</p><a class="lightbox-close" href="#"></a></div>';
			   			echo '</p>';   
          endforeach;
          
       endif;
	   ?>
</div>
	
		<?php include '../inc/footer.php'; ?>
	

</div>