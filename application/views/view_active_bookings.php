<!-- View the active bookings-->
		<div class="canvas">
			<h2>Active bookings</h2>
			<br>
			<table>
				<!-- Table headers-->
				<tr>
					<th>ID</th>
					<th>Booked On</th>
					<th>Driver</th>
					<th>Car type</th>
					<th>Endpoint</th>
					<th>Service date</th>
					<th>Options</th>
				</tr>
				<!-- Generate rows-->
				<?php 
					foreach($records->result() as $booking)
					{
						//play with the datetime
						list($bookingDate,$bookingTime) = explode(' ',$booking->timestamp);
						list($bookingYear,$bookingMonth,$bookingDay) = explode('-',$bookingDate);
						
						echo '<tr>';
						echo '<td>'.$booking->id.'</td>';
						echo '<td>'.$bookingDay.'-'.$bookingMonth.'-'.$bookingYear.'</td>';
						echo '<td><a href="' . base_url() . 'drivers/details/' . $booking->driverId . '" class="greenbuttontable" rel="facebox">View</a></td>';
						echo '<td>'.$booking->carType.'</td>';
						echo '<td><a href="'. base_url() .'customers/details/' . $booking->customerId . '" rel="facebox">'.$booking->endpoint.'</a></td>';
						
						list($bookingDate,$bookingTime) = explode(' ',$booking->bookingDate);
						list($bookingYear,$bookingMonth,$bookingDay) = explode('-',$bookingDate);
						
						echo '<td>'.$bookingDay.'-'.$bookingMonth.'-'.$bookingYear.' @ ' . $bookingTime .'</td>';
						echo '<td><a href="' . base_url() . 'bookings/details/' . $booking->id . '" class="greenbuttontable" rel="facebox">Manage</a></td>';
						echo '</tr>';
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>