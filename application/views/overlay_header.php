<?php 
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	header("Cache-Control: no-store, no-cache, must-revalidate"); 
	header("Cache-Control: post-check=0, pre-check=0", false); 
	header("Pragma: no-cache");
?>
<!doctype html>
<html>
	<head>
		<!-- This contains all the common elements for overlay pages-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
    	$(document).ready(function() {
    		//makes sure the form elements are aligned properly
    		var max = 0;
    		$("label").each(function(){
    	    	if ($(this).width() > max)
    	    	    max = $(this).width();    
    		});
    		$("label").width(max);
    		
    		//pin the datepicker to the div
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
			
			//alternate colors on tables
			$('tr:odd').css('background','#e3e3e3');
			
			//pin facebox to links with rel="facebox"
			$('a[rel*=facebox]').facebox()
		});	
	</script>
	</head>