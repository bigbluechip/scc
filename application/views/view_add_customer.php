
		<div class="canvas">
			<h2>Add a new customer</h2>
			<?php 
				if($message == "not added")
				{
					echo form_open('customers/add_customer_validate');
					echo '<div class="formErrors">' . validation_errors() . '</div>';
					
					echo '<p>';
					echo form_label("Name: ", "name");
					$data = array(
						"name" => "name",
						"id" => "name",
						"value" => ""
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("Type: ", "type");
					$options = array(
                		'corporate'  => 'Corporate',
                		'individual'    => 'Individual'
                	);
					echo form_dropdown('type', $options, 'corporate');
					echo '</p>';
					
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
				echo form_label("Email: ", "email");
				$data = array(
					"name" => "email",
					"id" => "email",
					"value" => ""
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				$data = array(
					"name" => "addCustomer",
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
					echo '<p class="formErrors" >An entry for this customer already exists!</p>';
				}
				elseif($message == "added")
				{
					echo "<p>Congrats! you've added a new customer!</p>";
				}
			?>
		</div>
	</div>
</body>
</html>