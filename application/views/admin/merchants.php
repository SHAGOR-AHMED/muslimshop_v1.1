<?php include('header.php'); ?>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
				 <div class="navbar navbar-inner block-header">
                    <div class="alert alert-info">All Merchants &nbsp;
                        
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
                                    <th>Merchant ID</th>
                                    <th>Merchant Name</th>
                                    <th>Merchant Code</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		foreach ($all_merchants as $value) {
                            	?>
                                    <tr>
                                        <td class="center"><?= $value->merchant_id?></td>
                                        <td class="center"><?= $value->merchant_name?></td>
                                        <td class="center"><?= $value->merchant_code?></td>
                                        <td class="center"><?= $value->email?></td>
                                        <td class="center"><?= $value->mobile_no?></td>
                                        <td class="center"><?= $value->address?></td>
                                        <td class="center">
                                            <?php
                                                if($value->status == 1){
                                                    echo 'Active';
                                                }else{
                                                    echo 'Pending';
                                                }
                                            ?>
                                        </td>
                                        <td class="center">
                                            <?php
                                                if($value->status == 1){ ?>
                                                    
                                                    <a href="<?php print base_url('Super_admin/inactiveMerchant/'.$value->merchant_id);?>" onclick="return confirm('Are you sure?');">Inactive</a>

                                            <?php }else{ ?>
                                                    
                                                    <a href="<?php print base_url('Super_admin/activeMerchant/'.$value->merchant_id);?>" onclick="return confirm('Are you sure?');">Active</a>

                                            <?php } ?>
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