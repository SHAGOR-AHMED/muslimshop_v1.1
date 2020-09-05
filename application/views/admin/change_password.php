<?php include('header.php'); ?>

<div class="inner_content_w3_agile_info">	
	<div class="registration admin_agile">								
		<div class="signin-form profile admin">
			<h4>Change Password</h4>
			<?php
				$userID = $this->session->userdata('id');
				if($this->session->userdata('exception')){
					echo '<div class="alert alert-danger">' . $this->session->userdata('exception') . "</div>";
					$this->session->unset_userdata('exception');
				}
			?>
			<div class="login-form">
				<form action="<?php print base_url('Admin/update_password');?>" method="post">
					<input type="password" name="old_password" value="" required="" placeholder="Enter Old Password">
					<input type="password" name="new_password" value="" required="" placeholder="New Password">
					<input type="password" name="confirm_password" value="" required="" placeholder="Confirm_password">
					<div class="tp">
						<input type="submit" name="submit" value="Update Password">
						<input type="hidden" name="id" value="<?= $userID ?>">
					</div>
				</form>
			</div>																					 
		</div>	
    </div>
</div>

<?php include('footer.php');?>