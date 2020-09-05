<?php include('header.php'); ?>
  
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids"> 
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="alert alert-info">Update New User</div>
            </div>
              <?php
                $message = $this->session->userdata('message');
                if($message){
                  
                  echo '<div class="alert alert-success">' . $message . "</div>";
                  $this->session->unset_userdata('message');
                }
              ?>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="<?php echo base_url('Admin/update_user');?>" method="post">
                        <div class="control-group">
                          <label class="control-label" for="userfile">Username</label>
                          <div class="controls">
                            <input type="text" name="username" class="form-control" value="<?= $result->username; ?>" required>
                          </div>
                        </div>
                        <br>

                        <input type="hidden" name="id" class="form-control" value="<?= $result->id; ?>">

                        <br>
                        <div class="form-actions">
                          <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
			</div>							
		</div>
	</div>

<?php include('footer.php'); ?>