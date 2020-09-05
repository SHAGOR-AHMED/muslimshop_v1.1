<?php include('header.php'); ?>

    <style type="text/css">
        .pending{
            background-color: #ff0000;
            color:#fff;
            padding: 5px;
            border-radius: 5px;
        }

        .published{
            background-color: green;
            color:#fff;
            padding: 5px;
            border-radius: 5px;
        }
    </style>

	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
				 <div class="navbar navbar-inner block-header">
                    <div class="alert alert-info">All Product(s) &nbsp;
                        <a href="<?php print base_url('add_product');?>">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a>
                    </div>
                </div>	
                <?php
                	if($this->session->userdata('update')){

                		print '<div class="alert alert-success">'.$this->session->userdata('update').'</div';
                		$this->session->unset_userdata('update');
                		
                	}elseif($this->session->userdata('delete')){

                		print '<div class="alert alert-danger">'.$this->session->userdata('delete').'</div>';
                		$this->session->unset_userdata('delete');
                		
                	}elseif($this->session->userdata('message')){

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
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		$i=1;
                            		foreach ($result as $value) {

                                    $this->db->select('tbl_image.file');
                                    $this->db->from('tbl_image'); 
                                    $this->db->join('product','tbl_image.img_prodid=product.prod_id');
                                    $this->db->where('tbl_image.img_prodid',$value->prod_id);
                                    $query = $this->db->get(); 
                                    $imgQuery =  $query->row();                            			
                            	?>
                                    <tr>
                                        <td class="center"><?php print $i++;?></td>      
                                        <td class="center"><?php print $value->prod_name;?></td>
                                        <td class="center"><?php print $value->category;?></td>
                                        <td class="center">BDT <?php print $value->prod_price;?></td>
                                        <td class="center">
                                            <a href="<?php print base_url($imgQuery->file);?>" target="_blank">
                                                <img src="<?php print base_url($imgQuery->file);?>" width="100" height="100"> 
                                            </a>
                                        </td>

                                        <td class="center">
                                            <?php 
                                                if($value->is_approved == 1){
                                                    echo '<label class="published">'.'Published'.'</label>';
                                                }else{
                                                    echo '<label class="pending">'.'Pending'.'</label>';
                                                }
                                            ?>
                                        </td>

                                        <td class="center">
                                            <?php 
                                                if($value->is_approved == 1){ ?>

                                                    <a href="<?php print base_url('Super_admin/reject_product/'.$value->prod_id);?>" onclick="return confirm('Are you sure?');">Reject</a> | 

                                                <?php }else{ ?>

                                                    <a href="<?php print base_url('Super_admin/published_product/'.$value->prod_id);?>" onclick="return confirm('Are you sure?');">Published</a> | 

                                            <?php } ?>
                                            <a href="<?php print base_url('Super_admin/edit_product/'.$value->prod_id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | 
                                            <a href="<?php print base_url('delete_product/'.$value->prod_id);?>" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
	</div>
<?php include('footer.php'); ?>