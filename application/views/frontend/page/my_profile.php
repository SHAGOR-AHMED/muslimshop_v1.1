
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
				        My Profile
				    </div>
				    
				    <div class="panel-body">
				        <form class="form-vertical" action="<?php print base_url('Merchant/update_merchant');?>" method="post">
				        	<br>
				            <div class="form-group">
				                <label for="email">Merchant Name</label>
				                <input  type="text" value="<?= $selected_info->merchant_name; ?>" name="merchant_name" class="form-control" placeholder="Enter your full name" required>
				            </div>

				            <div class="form-group">
				                <label for="email">Mobile No</label>
				                <input  type="text" value="<?= $selected_info->mobile_no; ?>" name="mobile_no" class="form-control" placeholder="Enter your mobile number" required>
				            </div>

				            <div class="form-group">
				                <label for="email">Email</label>
				                <input  type="email" value="<?= $selected_info->email; ?>" name="email" class="form-control" placeholder="Enter your E-mail">
				            </div>

				            <div class="form-group">
				                <label for="email">Address</label>
				                <textarea class="form-control" name="address"><?= $selected_info->address; ?></textarea>
				            </div>

				            <input  type="hidden" value="<?= $selected_info->merchant_id; ?>" name="merchant_id" class="form-control">

				            <div class="form-group">
				                <button class="btn btn-success" type="submit" name="login">Update</button>
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