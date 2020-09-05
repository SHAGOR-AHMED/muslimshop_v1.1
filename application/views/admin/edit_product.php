<?php include('header.php'); ?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
  
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids"> 
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="alert alert-info">Update Product</div>
                <?php
                  $img_msg = $this->session->userdata('img_msg');
                  if (isset($img_msg)) {
                    echo '<div class="alert alert-danger">' . $img_msg . "</div>";
                    $this->session->unset_userdata('img_msg');
                  }
                ?>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="<?php echo base_url('Super_admin/UpdateProduct');?>" enctype="multipart/form-data" method="post">

                        <div class="control-group">
                          <label class="control-label" for="userfile">Product Name</label>
                          <div class="controls">
                            <input type="text" name="name" value="<?= $selected_product->prod_name; ?>" class="form-control" required>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="userfile">Product Description</label>
                          <div class="controls">
                            <textarea name="description"><?= $selected_product->prod_desc; ?></textarea>
                          </div>
                        </div>

                        <br>
                        <div class="control-group">
                          <div class="controls">
                            <img src="<?= base_url($selected_product->file); ?>" height="120px" width="80px" class="img-responsive">
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="userfile">Upload image</label>
                          <div class="controls">
                            <input type="file" name="file" class="form-control">
                          </div>
                        </div>
                        <br>

                        <input type="hidden" name="prod_id" value="<?= $selected_product->prod_id; ?>" class="form-control">

                        <div class="form-actions">
                          <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
			</div>							
		</div>
	</div>

<?php include('footer.php'); ?>