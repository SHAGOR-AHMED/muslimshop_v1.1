<?php include('header.php'); ?>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
				 <div class="block-content collapse in">
            <div class="span12">
                <form name="edit_photo" id="edit_photo" action="<?php echo base_url('super_admin/update_photo');?>" enctype="multipart/form-data" method="post">
                    <div class="control-group">
                      <label class="control-label" for="userfile">Select Category</label>
                      <div class="controls">
                        <select name="category" class="form-control">
                          <option value="">--Select Category--</option>
                            <option value="1">Slide Photo</option>
                            <option value="2">Client Logo</option>
                            <option value="3">Gallery Photo</option>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <img src="<?= base_url($photo_info->image);?>" height="100px" width="120px">
                    </div>
                    <br>
                    <div class="control-group">
                      <label class="control-label" for="userfile">Upload Image</label>
                      <div class="controls">
                        <input type="file" name="image" class="form-control" value="<?= $photo_info->image;?>">
                        <span style="color: #ff0000;">*For position One: Image Dimention 770x400 and Position Two & Three 370x190</span>
                      </div>
                    </div>
                    <br>
                    <div class="form-actions">
                      <button type="submit" name="submit" class="btn btn-primary">Update Photo</button>
                      <input type="hidden" name="photo_id" class="form-control" value="<?= $photo_info->photo_id;?>">
                    </div>
                </form>
            </div>
          </div>   
			</div>							
		</div>
	</div>
<script type="text/javascript">
   document.forms['edit_photo'].elements['category'].value='<?= $photo_info->category; ?>';
</script>
<?php include('footer.php'); ?>