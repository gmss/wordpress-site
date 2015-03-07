<?php

global $eo_event_loop,$eo_event_loop_args;

//Date % Time format for events
$date_format = get_option('date_format');
$time_format = get_option('time_format');

//The list ID / classes
$id = ( $eo_event_loop_args['id'] ? 'id="'.$eo_event_loop_args['id'].'"' : '' );
$classes = $eo_event_loop_args['class'];

?>