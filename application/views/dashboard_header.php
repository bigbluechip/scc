	<!-- Contains all the elements that are common to the dashboard pages-->
	<div class="nav">
		<a href="<?php echo base_url(); ?>dashboard">Dashboard</a> | <a href="<?php echo base_url(); ?>dashboard/logout">Logout</a>
	</div>
	<div class="wrapper">
		<div class="sidebar">
			<!-- The accordion menu on the left-->
			<div id="sidebar">
				<h3><img src="<?php echo base_url(); ?>images/bookings.png"> Bookings</h3>
				<div>
					<p><a href="<?php echo base_url() ?>bookings/add">New booking</a></p>
					<p><a href="<?php echo base_url() ?>bookings/active">Active bookings</a></p>
					<p><a href="<?php echo base_url() ?>#">Booking history</a></p>
				</div>
				<h3><img src="<?php echo base_url(); ?>images/drivers.png"> Drivers</h3>
				<div>
					<p><a href="<?php echo base_url() ?>drivers/add">New driver</a></p>
					<p><a href="<?php echo base_url() ?>drivers/manage">Manage drivers</a></p>
				</div>
				<h3><img src="<?php echo base_url(); ?>images/customers.png"> Customers</h3>
				<div>
					<p><a href="<?php echo base_url() ?>customers/add">New customer</a></p>
					<p><a href="<?php echo base_url() ?>customers/manage">Manage customers</a></p>
				</div>
				<h3><img src="<?php echo base_url(); ?>images/accounts.png"> Accounts</h3>
				<div>
					<p><a href="<?php echo base_url() ?>#">Create invoice</a></p>
					<p><a href="<?php echo base_url() ?>#">Invoice history</a></p>
				</div>
			</div>
		</div>