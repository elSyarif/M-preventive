<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>

	 <link rel="stylesheet" href="<?php echo base_url('assets/framework/')?>bower_components/fullcalendar/fullcalendar.css">

	 <script src="<?php echo base_url('assets/framework/')?>bower_components/fullcalendar/lib/jquery.min.js"></script>
	 <script src="<?php echo base_url('assets/framework/')?>bower_components/fullcalendar/lib/moment.min.js"></script>
	 <script src="<?php echo base_url('assets/framework/')?>bower_components/fullcalendar/fullcalendar.js"></script>
	 <script>
	 	$(function() {

			  // page is now ready, initialize the calendar...

			  $('#calendar').fullCalendar({
			    dayClick: function() {
				    alert('a day has been clicked!');
				  }
			  })

			});
	 </script>
</head>
<body>
			<div class="container">
                <!-- Notification -->
                <div class="alert"></div>
            <div class="row clearfix">
                <div class="col-md-12 column">
                        <div id='calendar'></div>
                </div>
            </div>
        </div>
</body>
</html>