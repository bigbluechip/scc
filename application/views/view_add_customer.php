
		<div class="canvas">
			<h2><?php if($message == "edit" || $message == "editError" || $message == "edited"){ echo "Edit customer"; } else echo "Add a new Customer"; ?></h2>
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
				elseif($message == "editNotFound")
				{
					echo '<p class="formErrors" >No customer found!</p>';
				}
				elseif($message == "editError")
				{
					echo '<p class="formErrors" >An unknown error occured, please contact the administrator.</p>';
				}
				elseif($message == "edit")
				{
					echo form_open('customers/edit_customer_validate');
					echo '<div class="formErrors">' . validation_errors() . '</div>';
					echo form_hidden('id', $id);
					echo '<p>';
					echo form_label("Name: ", "name");
					$data = array(
						"name" => "name",
						"id" => "name",
						"value" => $name
					);
					echo form_input($data);
					echo '</p><br>';
					
					echo '<p>';
					echo form_label("Type: ", "type");
					$options = array(
                		'corporate'  => 'Corporate',
                		'individual'    => 'Individual'
                	);
					echo form_dropdown('type', $options, $type);
					echo '</p>';
					
					echo '<p>';
					echo form_label("Address : ", "address");
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
				echo form_label("Email: ", "email");
				$data = array(
					"name" => "email",
					"id" => "email",
					"value" => $email
				);
				echo form_input($data);
				echo '</p><br>';
				
				echo '<p>';
				$data = array(
					"name" => "editCustomer",
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
					echo "<p>Congrats! you've added a new customer!</p>";
				}
				elseif($message == "edited")
				{
					echo "<p>Congrats! you've edited the customer's details!</p>";
				}
			?>
		</div>
	</div>
</body>
</html>