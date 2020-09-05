<?php include('header.php'); ?>
  
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids"> 
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="alert alert-info">Add New User</div>
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
                    <form action="<?php echo base_url('Admin/save_user');?>" enctype="multipart/form-data" method="post">
                        <div class="control-group">
                          <label class="control-label" for="userfile">Username</label>
                          <div class="controls">
                            <input type="text" name="username" class="form-control" required>
                          </div>
                          <div class="help-block"><?php echo form_error('username'); ?></div>
                        </div>
                        <br>
                         
                        <div class="control-group">
                          <label class="control-label" for="userfile">Password</label>
                          <div class="controls">
                            <input type="password" name="password" class="form-control" required>
                          </div>
                          <div class="help-block"><?php echo form_error('password'); ?></div>
                        </div>
                        <br>

                        <div class="control-group">
                          <label class="control-label" for="userfile">Confirm Password</label>
                          <div class="controls">
                            <input type="password" name="con_password" class="form-control" required>
                          </div>
                          <div class="help-block"><?php echo form_error('con_password'); ?></div>
                        </div>

                        <br>
                        <div class="form-actions">
                          <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
			</div>							
		</div>
	</div>

<?php include('footer.php'); ?>