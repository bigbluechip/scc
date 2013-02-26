
		<div class="canvas">
			<h2>Manage drivers</h2>
			<br>
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Register number</th>
					<th>Options</th>
				</tr>
				<?php 
					foreach($records->result() as $driver)
					{
						echo '<tr>';
						echo '<td>'.$driver->id.'</td>';
						echo '<td>'.$driver->firstName.' '.$driver->lastName.'</td>';
						echo '<td>'.$driver->mobile.'</td>';
						echo '<td>'.$driver->regNum.'</td>';
						echo '<td><a href="' . base_url() . 'drivers/details/' . $driver->id . '" class="greenbuttontable" rel="facebox">Manage</a></td>';
						echo '</tr>';
					}
				?>
			</table>
			<?php 
				echo $this->pagination->create_links();
			?>
		</div>
	</div>
</body>
</html>