		<?php
			$drivers = $this->db->query("SELECT firstName,lastName FROM drivers");
			$customers = $this->db->query("SELECT name FROM customers");
		?>
		<script type="text/javascript">
    		$(document).ready(function() {
    			var availableDrivers = [
    				<?php
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
    			$( "#driver" ).autocomplete({
					source: availableDrivers
				});
				$( "#customer" ).autocomplete({
					source: availableCustomers
				});
			});	
		</script>
		<div class="canvas">
			<h2>Add a new booking</h2>
			<?php 
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
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
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
				$data = array(
					"name" => "addBooking",
					"value" => "Add",
					"class" => "bluebutton",
					"style" => "clear:both"
				);
				echo form_submit($data);
				echo '</p>';
				echo form_close();	
			?>
		</div>
	</div>
</body>
</html>