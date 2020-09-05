<?php include('header.php'); ?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
  
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids"> 
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="alert alert-info">Add New Product</div>
                <?php
                  $img_msg = $this->session->userdata('img_msg');
                  if (isset($img_msg)) {
                    echo '<div class="alert alert-danger">' . $img_msg . "</div>";
                    $this->session->unset_userdata('img_msg');
                  }
                ?>
            </div>
              <?php
                $message=$this->session->userdata('message');
                if($message){
                  
                  echo '<div class="alert alert-success">' . $message . "</div>";
                  $this->session->unset_userdata('message');
                }
              ?>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="<?php echo base_url('product_save');?>" enctype="multipart/form-data" method="post">
                        <div class="control-group">
                          <label class="control-label" for="userfile">Product Name</label>
                          <div class="controls">
                            <input type="text" name="prod_name" class="form-control" required>
                          </div>
                        </div>

                         <div class="form-group">
                          <label class="control-label" for="userfile">Category Select</label>
                          <div class="controls">
                            <select class="form-control" name="prod_catid" id="category">
                                <option value="">Select Categoty</option>
                                <?php getAllcategory(); ?>
                            </select>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="userfile">SubCategory Select</label>
                          <div class="controls">
                             <select name="prod_subcatid" id="subcat_name" class="form-control">
                                  <option value="">Select Sub Categoty</option>
                              </select>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="userfile">Product Description</label>
                          <div class="controls">
                            <textarea name="prod_desc"></textarea>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="userfile">Product Code</label>
                          <div class="controls">
                            <input type="text" name="prod_code" class="form-control" required>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="userfile">Product Price</label>
                          <div class="controls">
                            <input type="number" name="prod_price" class="form-control" required>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="userfile">Upload image</label>
                          <div class="controls">
                            <input type="file" name="file[]" value="" /><br />
                            <input type="file" name="file[]" value="" /><br />
                            <input type="file" name="file[]" value="" /><br />
                          </div>
                        </div>

                        <br>
                        <div class="form-actions">
                          <button type="submit" name="submit" class="btn btn-primary">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
			</div>							
		</div>
	</div>

<?php include('footer.php'); ?>

<script type="text/javascript">

    $('#category').change(function () {
      $.get("<?php echo base_url()?>Super_admin/getSubcatByCatId/" + this.value, function (data, status) {
          $('#subcat_name').html(data);
      });
    });

</script>