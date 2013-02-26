
		<div class="canvas">
			<h2>Manage customers</h2>
			<br>
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Type</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Options</th>
				</tr>
				<?php 
					foreach($records->result() as $customer)
					{
						echo '<tr>';
						echo '<td>'.$customer->id.'</td>';
						echo '<td>'.$customer->name.'</td>';
						echo '<td>'.$customer->type.'</td>';
						echo '<td>'.$customer->email.'</td>';
						echo '<td>'.$customer->mobile.'</td>';
						echo '<td><a href="' . base_url() . 'customers/details/' . $customer->id . '" class="greenbuttontable" rel="facebox">Manage</a></td>';
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