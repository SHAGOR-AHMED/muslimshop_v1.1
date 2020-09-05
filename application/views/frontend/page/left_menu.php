<div style="border:1px dotted #e2e2e2;padding: 10px;">
	<p>My Account</p>
	<?php
		$MerchantID = $this->session->userdata('merchant_id');
	?>
	<ul style="list-style: none;line-height: 40px;">
		<li style="background-color: #e2e2e2; text-align: center;margin:5px;"><a href="<?= base_url('Merchant/');?>">Dashboard</a></li>
		<li style="background-color: #e2e2e2; text-align: center;margin:5px;"><a href="<?= base_url('Merchant/uploadProduct');?>">Upload Product</a></li>
		<li style="background-color: #e2e2e2; text-align: center;margin:5px;"><a href="<?= base_url('Merchant/manageOrder');?>">Manage Order</a></li>
		<li style="background-color: #e2e2e2; text-align: center;margin:5px;"><a href="<?= base_url('Merchant/deliveredOrder');?>">Order Delivered</a></li>
		<li style="background-color: #e2e2e2; text-align: center;margin:5px;"><a href="<?= base_url('Merchant/cancelOrder');?>">Cancel Order</a></li>
		<li style="background-color: #e2e2e2; text-align: center; margin:5px;"><a href="<?= base_url('Merchant/MyProfile/'.$MerchantID)?>">Update Profile</a></li>
		<li style="background-color: #e2e2e2; text-align: center; margin:5px;"><a href="<?= base_url('Merchant/ChangePassword/'.$MerchantID)?>">Change Password</a></li>
	</ul>
</div>