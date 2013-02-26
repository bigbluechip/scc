	<body>
		<div class="overlay">
			<h2><?php echo $name; ?><hr></h2>
			<?php echo '<table><tr><td><b>Address:</b></td><td>' . $address . '</td></tr><tr><td><b>Mobile:</b></td><td>' . $mobile . '</td></tr><tr><td><b>Car:</b></td><td>' . $carType . '</td></tr><tr><td><b>Reg. number:</b></td><td>' . $regNum . '</td></tr></table>'; ?>
			<p><a href="<?php echo base_url(); ?>drivers/edit/<?php echo $id; ?>" class="greenbuttontable">Edit</a></p>
		</div>
	</body>
</html>