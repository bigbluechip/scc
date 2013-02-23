
		<div class="canvas">
			<h2>Add a new driver</h2>
			<?php 
				if($message == "not added")
				{
					echo form_open('drivers/add_driver_validate');
				echo '<div class="formErrors">' . validation_errors() . '</div>';
				
				echo '<p>';
				echo form_label("First Name: ", "firstName");
				$data = array(
					"name" => "firstName",
					"id" => "firstName",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				echo form_label("Last Name: ", "lastName");
				$data = array(
					"name" => "lastName",
					"id" => "lastName",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				echo form_label("Sex: ", "sex");
				$options = array(
                  'male'  => 'Male',
                  'female'    => 'Female'
                );
				echo form_dropdown('sex', $options, 'indica');
				echo '</p>';
				
				echo '<p>';
				echo form_label("Date of birth: ", "dob");
				$data = array(
					"name" => "dob",
					"id" => "dob",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				echo form_label("Address line 1: ", "address_1");
				$data = array(
					"name" => "address_1",
					"id" => "address_1",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				echo form_label("Address line 2: ", "address_2");
				$data = array(
					"name" => "address_2",
					"id" => "address_2",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				echo form_label("Mobile: ", "mobile");
				$data = array(
					"name" => "mobile",
					"id" => "mobile",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				echo form_label("DL number: ", "dlNum");
				$data = array(
					"name" => "dlNum",
					"id" => "dlNum",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				echo form_label("DL expiry: ", "dlExpiry");
				$data = array(
					"name" => "dlExpiry",
					"id" => "dateFromNow",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
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
				echo form_label("Registration number: ", "regNum");
				$data = array(
					"name" => "regNum",
					"id" => "regNum",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				$data = array(
					"name" => "addDriver",
					"value" => "Add",
					"class" => "bluebutton",
					"style" => "clear:both"
				);
				echo form_submit($data);
				echo '</p>';
				echo form_close();
				}
				elseif($message == "error")
				{
					echo '<p class="formErrors" >An entry for this driver already exists!</p>';
				}
				elseif($message == "added")
				{
					echo "<p>Congrats! you've added a new driver!</p>";
				}
			?>
		</div>
	</div>
</body>
</html>