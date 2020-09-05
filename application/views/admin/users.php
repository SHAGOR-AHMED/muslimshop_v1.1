<?php include('header.php'); ?>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
				 <div class="navbar navbar-inner block-header">
                    <div class="alert alert-info">All Users &nbsp;
                        <a href="<?php print base_url('Admin/add_user');?>">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                </div>	
                <?php
                	if($this->session->userdata('message')){
                		echo '<div class="alert alert-success">' . $this->session->userdata('message') . "</div>";
                		$this->session->unset_userdata('message');
                	}
                ?>
				 <div class="block-content collapse in">				 
                    <div class="span12">
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Username</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                                    $i = 1;
                            		foreach ($all_users as $value) {
                            	?>
                                    <tr>
                                        <td class="center"><?= $i++;?></td>
                                        <td class="center"><?= $value->username?></td>
                                        <td class="center"><?= $value->registrationtime?></td>
                                        <td class="center">   
                                            <a href="<?php print base_url('Admin/Edit_user/'.$value->id);?>">Edit</a> | 
                                            <a href="<?php print base_url('Admin/Delete_user/'.$value->id);?>" onclick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>     
                    </div>
                </div>				         
			</div>							
		</div>
	</div>
<?php include('footer.php'); ?>