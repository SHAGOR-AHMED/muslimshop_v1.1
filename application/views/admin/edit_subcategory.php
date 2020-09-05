<?php include('header.php'); ?>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
				 <div class="block-content collapse in">
            <div class="span12">
                <form action="<?php echo base_url('update_subcategory');?>" enctype="multipart/form-data" method="post">
                    <div class="control-group">
                      <label class="control-label" for="userfile">Subcategory Name</label>
                      <div class="controls">
                        <input type="text" name="subcategory" value="<?php print $result->subcategory;?>" class="form-control" required>
                      </div>
                      <input type="hidden" name="id" value="<?php print $result->subcat_id;?>" class="form-control">
                    </div>
                    <br>
                    <div class="form-actions">
                      <button type="submit" name="submit" class="btn btn-primary">Update Subcategory</button>
                    </div>
                </form>
            </div>
          </div>   
			</div>							
		</div>
	</div>
<?php include('footer.php'); ?>