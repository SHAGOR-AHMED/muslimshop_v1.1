<?php include('header.php'); ?>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids"> 
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Add New Photo</div>
            </div>
              <?php
                $message=$this->session->userdata('message');
                if($message)
                {
                  print '<span style="color:green;font-size:16px;margin:10px;">'.$message.'</span>';
                  $this->session->unset_userdata('message');
                }
              ?>
            <div class="block-content collapse in">
                <div class="span12">
                  <form action="<?php echo base_url('super_admin/save_photo');?>" enctype="multipart/form-data" method="post">
                        <div class="control-group">
                          <label class="control-label" for="userfile">Select Category</label>
                          <div class="controls">
                            <select name="category" class="form-control">
                              <option value="">--Select Category--</option>
                                <option value="1">Slide</option>
                                <option value="2">Client</option>
                                <option value="3">Gallery</option>
                            </select>
                          </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" for="userfile">Upload Image</label>
                          <div class="controls">
                            <input type="file" name="image" class="form-control" required>
                            <span style="color: #ff0000;">*For Slide: Image Dimention 860x420, Clients Company Logo Image Dimention 280x100 and Gallery Image Dimension 300x200</span>
                          </div>
                        </div>
                        <br>
                        <div class="form-actions">
                          <button type="submit" name="submit" class="btn btn-primary">Save Photo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
			</div>							
		</div>
	</div>
<?php include('footer.php'); ?>