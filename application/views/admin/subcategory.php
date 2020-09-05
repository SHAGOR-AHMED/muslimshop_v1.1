<?php include('header.php'); ?>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids">
				<div class="navbar navbar-inner block-header">
                    <div class="alert alert-info">All Subcategory &nbsp;
                        <a href="<?php print base_url('add_subcategory');?>">
                            <i class="fa fa-plus"></i> ADD NEW
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
                        <table id="sample-table-2 roni" class="table table-striped table-bordered table-hover roni">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Subcategory Name</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php
                            		$i=1;
                            		foreach ($subcategory as $value) {                         			
                            	?> 
                                    <tr>
                                        <td class="center"><?php print $i++;?></td>  
                                        <td class="center"><?php print $value->subcategory;?></td>
                                        <td class="center"><?php print $value->category;?></td>
                                        <td class="center">
                                            <a href="<?php print base_url('edit_subcategory'.'/'.$value->subcat_id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                        <a href="<?php print base_url('delete_subcategory'.'/'.$value->subcat_id);?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                               <?php }?>
                            </tbody>
                        </table>

                        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
                        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

                        <div id="pagination">
                            <?php //echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>				         
			</div>							
		</div>
	</div>
<?php include('footer.php'); ?>
