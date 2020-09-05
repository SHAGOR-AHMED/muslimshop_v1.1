<!-- modals -->
<!-- log in -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center">Log In</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Merchant/check_merchant_login');?>" method="post">
					<div class="form-group">
						<label class="col-form-label">Email</label>
						<input type="email" class="form-control" placeholder=" " name="email" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Password</label>
						<input type="password" class="form-control" placeholder=" " name="password" required="">
					</div>
					<div class="right-w3l">
						<input type="submit" class="form-control" value="Log in">
					</div>
					<div class="sub-w3l">
						<div class="custom-control custom-checkbox mr-sm-2">
							<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
							<label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
						</div>
					</div>
					<p class="text-center dont-do mt-3">Don't have an account?
						<a href="#" data-toggle="modal" data-target="#exampleModal2">
							Register Now</a>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- register -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Register</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Welcome/save_merchant');?>" method="post">
					<div class="form-group">
						<label class="col-form-label">Your Name</label>
						<input type="text" class="form-control" placeholder=" " name="merchant_name" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Email</label>
						<input type="email" class="form-control" placeholder=" " name="email" required="">
					</div>

					<div class="form-group">
						<label class="col-form-label">Mobile No</label>
						<input type="number" class="form-control" placeholder=" " name="mobile_no" required="">
					</div>

					<div class="form-group">
						<label class="col-form-label">Password</label>
						<input type="password" class="form-control" placeholder=" " name="password" id="password1" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Confirm Password</label>
						<input type="password" class="form-control" placeholder=" " name="confirm_password" id="password2" required="">
					</div>

					<div class="form-group">
						<label class="col-form-label">Address</label>
						<textarea class="form-control" name="address" required=""></textarea>
					</div>

					<div class="form-group">
						<label class="col-form-label">NID</label>
						<input type="number" class="form-control" placeholder=" " name="nid" required="">
					</div>

					<div class="right-w3l">
						<input type="submit" class="form-control" value="Register">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- //modal -->