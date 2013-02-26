	<div class="login">
		<h2>Login</h2>
		<?php 
			echo form_open('main/login');
			echo '<div class="formErrors">' . validation_errors() . '</div>';
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
			echo form_label("Password: ", "password");
			$data = array(
				"name" => "password",
				"id" => "password",
				"value" => ""
			);
			echo form_password($data);
			echo '</p><br><br>';
			
			echo '<p>';
			$data = array(
				"name" => "loginSubmit",
				"value" => "Login",
				"class" => "bluebutton",
				"style" => "clear:both"
			);
			echo form_submit($data);
			echo '</p>';
			echo form_close();
		?>
	</div>	
</body>
</html>