<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/jqueryui/jqueryui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    	var max = 0;
    	$("label").each(function(){
        	if ($(this).width() > max)
        	    max = $(this).width();    
    	});
    	$("label").width(max);
    	
    	$( "#sidebar" ).accordion();
    	
    	$( "#dateFromNow" ).datepicker({
			inline: true,
			minDate: 0,
			dateFormat: "dd-mm-yy"
		});
		
		$( "#dob" ).datepicker({
			inline: true,
			maxDate: 0,
			changeMonth: true,
            changeYear: true,
			dateFormat: "dd-mm-yy",
			yearRange: "-100:+0"
		});
	});	
</script>
</head>
<body>
	<div class="header">
		Sharman's Cab Company
	</div>
