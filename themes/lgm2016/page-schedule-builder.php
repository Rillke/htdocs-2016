<?php
/**
 * Template for building the schedule
 */
 // get_stylesheet_directory_uri()
 
 $fullcal = get_stylesheet_directory_uri().'/lib/fullcalendar/';
 
?>
<!doctype html>
<html class="no-js" lang="" moznomarginboxes mozdisallowselectionprint>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>LGM Schedule Builder</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="robots" content="noindex, nofollow">
				
				<link href='<?php echo $fullcal ?>/fullcalendar.css' rel='stylesheet' />
				<link href='<?php echo $fullcal ?>/fullcalendar.print.css' rel='stylesheet' media='print' />
				<script src='<?php echo $fullcal ?>/lib/moment.min.js'></script>
				<script src='<?php echo $fullcal ?>/lib/jquery.min.js'></script>
				<script src='<?php echo $fullcal ?>/lib/jquery-ui.custom.min.js'></script>
				<script src='<?php echo $fullcal ?>/fullcalendar.min.js'></script>
				
    </head>
    <script>
    
    	$(document).ready(function() {
    
    
    		/* initialize the external events
    		-----------------------------------------------------------------*/
    
    		$('#external-events .fc-event').each(function() {
    
    			// store data so the calendar knows to render an event upon drop
    			$(this).data('event', {
    				title: $.trim($(this).text()), // use the element's text as the event title
    				stick: true // maintain when user navigates (see docs on the renderEvent method)
    			});
    
    			// make the event draggable using jQuery UI
    			$(this).draggable({
    				zIndex: 999,
    				revert: true,      // will cause the event to go back to its
    				revertDuration: 0  //  original position after the drag
    			});
    
    		});
    
    
    		/* initialize the calendar
    		-----------------------------------------------------------------*/
    
    		$('#calendar').fullCalendar({
    			header: {
    				left: 'prev,next today',
    				center: 'title',
    				right: 'agendaDay'
    			},
    			editable: true,
    			droppable: true, // this allows things to be dropped onto the calendar
    			
    			// LGM Custom Settings:
    			timeFormat: 'H(:mm)',
    			defaultView: 'agendaDay',
    			slotDuration: '00:10:00',
    			defaultTimedEventDuration: '00:20:00',
    			defaultDate: '2016-04-15',
    			// end LGM custom settings
    			
    			drop: function() {
    					$(this).remove();
    			}
    		});
    
    
    	});
    
    </script>
    <style>
    
    	body {
    		margin-top: 40px;
    		text-align: center;
    		font-size: 14px;
    		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    	}
    		
    	#wrap {
    		width: 1100px;
    		margin: 0 auto;
    	}
    		
    	#external-events {
    		float: left;
    		width: 150px;
    		padding: 0 10px;
    		border: 1px solid #ccc;
    		background: #eee;
    		text-align: left;
    	}
    		
    	#external-events h4 {
    		font-size: 16px;
    		margin-top: 0;
    		padding-top: 1em;
    	}
    		
    	#external-events .fc-event {
    		margin: 10px 0;
    		cursor: pointer;
    	}
    		
    	#external-events p {
    		margin: 1.5em 0;
    		font-size: 11px;
    		color: #666;
    	}
    		
    	#external-events p input {
    		margin: 0;
    		vertical-align: middle;
    	}
    
    	#calendar {
    		float: right;
    		width: 900px;
    	}
    
    </style>
    
    
    <body>
    	<div id='wrap'>
    
    		<div id='external-events'>
    			<h4>Draggable Events</h4>
    			<div class='fc-event'>My Event 1</div>
    			<div class='fc-event'>My Event 2</div>
    			<div class='fc-event'>My Event 3</div>
    			<div class='fc-event'>My Event 4</div>
    			<div class='fc-event'>My Event 5</div>
    			
    		</div>
    
    		<div id='calendar'></div>
    
    		<div style='clear:both'></div>
    
    	</div>
   </body>
</html>