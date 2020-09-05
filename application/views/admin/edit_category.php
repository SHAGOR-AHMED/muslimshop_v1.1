<?php include('header.php'); ?>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
				 <div class="block-content collapse in">
            <div class="span12">
                <form action="<?php echo base_url('edit_category_save');?>" enctype="multipart/form-data" method="post">
                    <div class="control-group">
                      <label class="control-label" for="userfile">Category Name</label>
                      <input type="hidden" name="id" value="<?php print $result->cat_id;?>" class="form-control">
                      <div class="controls">
                        <input type="text" name="category" value="<?php print $result->category;?>" class="form-control" required>
                      </div>
                    </div>
                    
                    <br>
                    <div class="form-actions">
                      <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                    </div><br>
                    <div class="form-actions">
                      <button type="cancle" class="btn btn-danger">Cancle</button>
                    </div>
                </form>
            </div>
          </div>   
			</div>							
		</div>
	</div>
<?php include('footer.php'); ?>