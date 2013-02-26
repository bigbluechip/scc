<!doctype html>
<html>
<head>
	<!-- Overall site header-->
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/jqueryui/jqueryui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/facebox/facebox.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>includes/facebox/facebox.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    	var max = 0;
    	$("label").each(function(){
        	if ($(this).width() > max)
        	    max = $(this).width();    
    	});
    	$("label").width(max);
    	//pin the sidebar to an accordion
    	$( "#sidebar" ).accordion({ active: <?php echo $menuIndex; ?> });
    	
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
		
		$('tr:odd').css('background','#e3e3e3');
		
		$('a[rel*=facebox]').facebox()
	});	
</script>
</head>
<body>
	<div class="header">
		Sharman's Cab Company
	</div>
