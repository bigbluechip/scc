
		<div class="canvas">
			<h2><?php if($message == "edit" || $message == "editError" || $message == "edited"){ echo "Edit driver"; } else echo "Add a new driver"; ?></h2>
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
					echo form_dropdown('sex', $options, 'male');
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
            	      'tempo' => 'Tempo Traveler'
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
				elseif($message == "editNotFound")
				{
					echo '<p class="formErrors" >No driver found!</p>';
				}
				elseif($message == "editError")
				{
					echo '<p class="formErrors" >An unknown error occured, please contact the administrator.</p>';
				}
				elseif($message == "edit")
				{
					echo form_open('drivers/edit_driver_validate');
					echo '<div class="formErrors">' . validation_errors() . '</div>';
					echo form_hidden('id', $id);
					echo '<p>';
					echo form_label("First Name: ", "firstName");
					$data = array(
						"name" => "firstName",
						"id" => "firstName",
						"value" => $firstName
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("Last Name: ", "lastName");
					$data = array(
						"name" => "lastName",
						"id" => "lastName",
						"value" => $lastName
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("Sex: ", "sex");
					$options = array(
                	  'male'  => 'Male',
                	  'female'    => 'Female'
                	);
					echo form_dropdown('sex', $options, $sex);
					echo '</p>';
					
					echo '<p>';
					echo form_label("Date of birth: ", "dob");
					$data = array(
						"name" => "dob",
						"id" => "dob",
						"value" => $dob
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("Address: ", "address");
					$data = array(
						"name" => "address",
						"id" => "address",
						"value" => $address
					);
					echo form_input($data);
					echo '</p><br>';
										
					echo '<p>';
					echo form_label("Mobile: ", "mobile");
					$data = array(
						"name" => "mobile",
						"id" => "mobile",
						"value" => $mobile
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("DL number: ", "dlNum");
					$data = array(
						"name" => "dlNum",
						"id" => "dlNum",
						"value" => $dlNum
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("DL expiry: ", "dlExpiry");
					$data = array(
						"name" => "dlExpiry",
						"id" => "dateFromNow",
						"value" => $dlExpiry
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
            	      'tempo' => 'Tempo Traveler'
            	    );
					echo form_dropdown('carType', $options, $carType);
					echo '</p>';
					
					echo '<p>';
					echo form_label("Registration number: ", "regNum");
					$data = array(
						"name" => "regNum",
						"id" => "regNum",
						"value" => $regNum
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					$data = array(
						"name" => "editDriver",
						"value" => "Save",
						"class" => "bluebutton",
						"style" => "clear:both"
					);
					echo form_submit($data);
					echo '</p>';
					echo form_close();
				}
				elseif($message == "added")
				{
					echo "<p>Congrats! you've added a new driver!</p>";
				}
				elseif($message == "edited")
				{
					echo "<p>Congrats! you've edited the driver's details!</p>";
				}
			?>
		</div>
	</div>
</body>
</html>