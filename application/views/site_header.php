<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>includes/stylesheet.css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    	var max = 0;
    	$("label").each(function(){
        	if ($(this).width() > max)
        	    max = $(this).width();    
    	});
    	$("label").width(max);
	});	
</script>
</head>
<body>
	<div class="header">
		Sharman's Cab Company
	</div>
