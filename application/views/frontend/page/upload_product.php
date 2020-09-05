
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
				        Post your upload here
				    </div>
				    
				    <div class="panel-body">
				        <br>
				        <form class="form-vertical" action="<?php echo base_url('Merchant/product_save');?>" method="post" enctype="multipart/form-data">
				           
				            <div class="form-group">
				                <label for="email">Product Name</label>
				                <input  type="text" value="" name="prod_name" class="form-control" required>
				                <div class="help-block"><?php echo form_error('prod_name'); ?></div>
				            </div>
				            <br>
					        <div class="form-group">
	                          	<label class="control-label" for="userfile">Category Select</label>
	                            <select class="form-control" name="prod_catid" id="category">
	                                <option value="">Select Categoty</option>
	                                <?php getAllcategory(); ?>
	                            </select>
	                        </div>
	                        <br>
	                        <div class="control-group">
	                          	<label class="control-label" for="userfile">Sub-Category Select</label>
	                            <select name="prod_subcatid" id="subcat_name" class="form-control">
	                                <option value="">Select Sub Categoty</option>
	                            </select>
	                        </div>
	                        <br>
	                        <div class="form-group">
					            <label for="email">Product Description</label>
					            <textarea name="prod_desc"  class="form-control" id="textarea2" rows="3"></textarea>
					            <div class="help-block"><?php echo form_error('prod_desc'); ?></div>
					        </div>
					        <br>
	                        <div class="control-group">
	                          	<label class="control-label" for="userfile">Product Code</label>
	                            <input type="text" name="prod_code" class="form-control" required>
	                        </div>
	                        <br>
	                        <div class="control-group">
	                          	<label class="control-label" for="userfile">Product Price</label>
	                            <input type="number" name="prod_price" class="form-control" required>
	                        </div>
				            <br>
	                        <div class="control-group">
	                          	<label class="control-label" for="userfile">Upload image</label><br>
	                            <input type="file" name="file[]" value="" /><br />
	                            <input type="file" name="file[]" value="" /><br />
	                            <input type="file" name="file[]" value="" /><br />
	                        </div>
	                        <br>
				            <div class="form-group">
				                <button class="btn btn-success" type="submit">Upload Product</button>
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