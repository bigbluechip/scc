		<?php
			$drivers = $this->db->query("SELECT firstName,lastName FROM drivers");
			$customers = $this->db->query("SELECT name FROM customers");
		?>
		<script type="text/javascript">
    		$(document).ready(function() {
    			//list of drivers for autocomplete
    			var availableDrivers = [
    				<?php
    					//spit out all the drivers from the DB
    					if($drivers->num_rows > 0)
						{
							foreach ($drivers->result() as $row)
							{
   								echo '"' . $row->firstName . ' ' . $row->lastName . '",';
							}
						}
    				?>
    				""
    			];
    			
    			//list of customers for autocomplete
    			var availableCustomers = [
    				<?php
    					if($customers->num_rows > 0)
						{
							foreach ($customers->result() as $row)
							{
   								echo '"' . $row->name . '",';
							}
						}
    				?>
    				""
    			];
    			//pin the div to autocomplete
    			$( "#driver" ).autocomplete({
					source: availableDrivers
				});
				$( "#customer" ).autocomplete({
					source: availableCustomers
				});
			});	
		</script>
		<script>
			function endpointNeeded(){
				//checks if an endpoint is needed
				$customer = $('#customer').val()
				//get a JSON reply from the function called endpoint_needed, send the customer name after URL encoding
				$.getJSON("<?php echo base_url();?>bookings/endpoint_needed/" + encodeURIComponent($customer), function(response){
        			//toggle the visibility of the input field for endpoint as you wish
        			if(response.needed == "yes")
        				$('#endpointDiv').css('visibility', 'visible');
        			else
        				$('#endpointDiv').css('visibility', 'hidden');
    			});
			}
		</script>
		<div class="canvas">
			<h2>Add a new booking</h2>
			<?php 
				if($message == "toadd")
				{
					echo form_open('bookings/add_booking_validate');
					echo '<div class="formErrors">' . validation_errors() . '</div>';
					
					echo '<p>';
					echo form_label("Car type: ", "carType");
					$options = array(
                	  'indica'  => 'Tata Indica',
                	  'indigo'    => 'Tata Indigo',
                	  'corolla'   => 'Toyota Corolla',
                	  'innova' => 'Toyota Innova',
                	  'temp' => 'Tempo Traveler'
                	);
					echo form_dropdown('carType', $options, 'indica');
					echo '</p>';
					
					echo '<p>';
					echo form_label("Driver: ", "driver");
					$data = array(
						"name" => "driver",
						"id" => "driver",
						"value" => ""
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("Customer: ", "customer");
					$data = array(
						"name" => "customer",
						"id" => "customer",
						"value" => "",
						"onblur" => "endpointNeeded()"
					);
					echo form_input($data);
					echo '</p><br>';
						
					echo '<div id="endpointDiv" style="visibility:hidden"><p>';
					echo form_label("Endpoint: ", "endpoint");
					$data = array(
						"name" => "endpoint",
						"id" => "endpoint",
						"value" => ""
					);
					echo form_input($data);
					echo '<br></p></div>';
						
					echo '<p>';
					echo form_label("Distance: ", "distance");
					$data = array(
						"name" => "distance",
						"id" => "distance",
						"value" => ""
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("Booking date: ", "bookingDate");
					$data = array(
						"name" => "bookingDate",
						"id" => "dateFromNow",
						"value" => ""
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("Time: ", "hours");
					$options = array(
                	  '00'  => '00',
                	  '01'  => '01',
                	  '02'  => '02',
                	  '03'  => '03',
                	  '04'  => '04',
                	  '05'  => '05',
                	  '06'  => '06',
                	  '07'  => '07',
                	  '08'  => '08',
                	  '09'  => '09',
                	  '10'  => '10',
                	  '11'  => '11',
                	  '12'  => '12',
                	  '13'  => '13',
                	  '14'  => '14',
                	  '15'  => '15',
                	  '16'  => '16',
                	  '17'  => '17',
                	  '18'  => '18',
                	  '19'  => '19',
                	  '20'  => '20',
                	  '21'  => '21',
                	  '22'  => '22',
                	  '23'  => '23'
                	);
					echo form_dropdown('hours', $options, '00');
					$options = array(
                	  '00'  => '00',
                	  '15'  => '15',
                	  '30'  => '30',
                	  '45'  => '45'
                	);
					echo form_dropdown('minutes', $options, '00');
					echo '</p>';
					
					echo '<p>';
					$data = array(
						"name" => "addBooking",
						"value" => "Add",
						"class" => "bluebutton",
						"style" => "clear:both"
					);
					echo form_submit($data);
					echo '</p>';
					echo form_close();
				}
				elseif($message == "added"){
					echo '<p>Congratulations! the booking was added!</p>';
				}
				else
				{
					echo '<p>Sorry, the booking was not added due to an error. Please contact the administrator.</p>';
				}	
			?>
		</div>
	</div>
</body>
</html>