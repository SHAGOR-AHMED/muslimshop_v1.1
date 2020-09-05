<?php include('header.php'); ?>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
				 <div class="navbar navbar-inner block-header">
                    <div class="alert alert-info">All Category &nbsp;
                        <a href="<?php print base_url('super_admin/add_photo');?>">
                            <i class="fa fa-plus"></i> ADD NEW PHOTO
                        </a>
                    </div>
                </div>	
                <?php
                	if($this->session->userdata('update')){

                		echo '<div class="alert alert-success">' . $this->session->userdata('update') . "</div>";
                		$this->session->unset_userdata('update');

                	}elseif($this->session->userdata('delete')){

                		echo '<div class="alert alert-danger">' . $this->session->userdata('delete') . "</div>";
                		$this->session->unset_userdata('delete');

                	}
                ?>
				 <div class="block-content collapse in">				 
                    <div class="span12">
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Image Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		$i=1;
                            		foreach ($all_photo as $value) {
                            	?>
                                    <tr>
                                        <td class="center"><?php print $i++;?></td>
                                        <td class="center">
                                            <?php
                                                if($value->category == 1){
                                                    echo "SLIDE";
                                                }elseif($value->category == 2){
                                                    echo "CLIENT";
                                                }elseif($value->category == 3){
                                                    echo "GALLERY";
                                                }
                                            ?>  
                                        </td>
                                        <td class="center"><img src="<?= base_url($value->image);?>" height="100px" width="120px"></td>
                                        <td class="center"><a href="<?php print base_url('super_admin/edit_photo/'.$value->photo_id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                       <!--  <td class="center"><a href="<?php //print base_url('delete_category'.'/'.$value->cat_id);?>"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a></td> -->
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