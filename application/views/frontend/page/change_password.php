
<?php
	$MerchantID = $this->session->userdata('merchant_id');
?>
<div class="welcome py-5" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p style="background: #2da2bf; color: #fff; font-size: 18px; text-align: center;padding: 10px; text-transform: uppercase;">My Dashboard</p>
				<?php 
				    if(!empty($message)){
				?>
				    <div class="alert alert-block alert-success">
				        <button type="button" class="close" data-dismiss="alert">
				            <i class="ace-icon fa fa-times"></i>
				        </button>

				        <i class="ace-icon fa fa-check green"></i>
				        <?php echo $message; ?>
				    </div>

				<?php } ?>
			</div>
		</div>
		<div class="row py-xl-4">
			<div class="col-lg-3 welcome-left pr-lg-5" style="border:1px solid #e2e2e2;padding: 10px;">
				<?php include('left_menu.php'); ?>
			</div>
			<div class="col-lg-9 welcome-right mt-lg-0 mt-5" style="border:1px solid #e2e2e2;">
				<div class="panel panel-info" style="padding: 5px;">
				    <div class="panel-heading" style="background: #2DA2BF; color: #fff;padding: 10px; text-align: center; text-transform: uppercase;">
				        Change your password here
				    </div>
				    
				    <div class="panel-body">
				        <form class="form-vertical" action="<?php print base_url('Merchant/update_password');?>" method="post">
				        	<br>
				            <div class="form-group">
				                <label for="password">Old Password</label>
				                <input type="password" value="" name="old_password" class="form-control" placeholder="Enter your old password" required> 
				            </div>

				            <div class="form-group">
				                <label for="password">New Password</label>
				                <input type="password" value="" name="new_password" class="form-control" placeholder="Enter your New password" required> 
				            </div>

				            <div class="form-group">
				                <label for="password">Confirm Password</label>
				                <input type="password" value="" name="confirm_password" class="form-control" placeholder="Re-type password" required> 
				            </div>

				            <input type="hidden" value="<?= $merchantID ?>" name="merchant_id" class="form-control"> 

				            <div class="form-group">
				                <button class="btn btn-success" type="submit">Change Password</button>
				            </div>
				        </form> 

				    </div>
				</div> 
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

    $('#category').change(function () {
      $.get("<?php echo base_url()?>Super_admin/getSubcatByCatId/" + this.value, function (data, status) {
          $('#subcat_name').html(data);
      });
    });

</script>