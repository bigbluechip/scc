	<!-- This page is viewed via facebox-->
	<body>
		<div class="overlay">
			<h2><?php echo $name; ?><hr></h2>
			<?php echo '<table><tr><td><b>Address:</b></td><td>' . $address . '</td></tr><tr><td><b>Mobile:</b></td><td>' . $mobile . '</td></tr><tr><td><b>Email:</b></td><td>' . $email . '</td></tr><tr><td><b>Type:</b></td><td>' . $type . '</td></tr></table>'; ?>
			<p><a href="<?php echo base_url(); ?>customers/edit/<?php echo $id; ?>" class="greenbuttontable">Edit</a></p>
		</div>
	</body>
</html>