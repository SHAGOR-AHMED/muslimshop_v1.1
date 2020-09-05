<?php include('header.php'); ?>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids"> 
        <div class="block">
            <div class="navbar navbar-inner block-header" style="background-color: #e2e2e2; padding: 10px;">
                <div class="muted pull-left" >Add New Category</div>
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
                <div class="span12" style="border:1px solid #e2e2e2;padding: 10px;">
                    <form action="<?php echo base_url('category_save');?>" enctype="multipart/form-data" method="post">
                        <div class="control-group">
                          <label class="control-label" for="userfile">Category Name</label>
                          <div class="controls">
                            <input type="text" name="name" class="form-control" required placeholder="Enter category name">
                          </div>
                        </div>
                        <br>
                        <div class="form-actions">
                          <button type="submit" name="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
			</div>							
		</div>
	</div>
<?php include('footer.php'); ?>