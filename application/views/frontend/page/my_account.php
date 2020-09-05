
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
<div class="welcome py-5" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p style="background: #2da2bf; color: #fff; font-size: 18px; text-align: center;padding: 10px; text-transform: uppercase;">My Dashboard</p>
				<?php
	                $message=$this->session->userdata('message');
	                if($message){
	                  
	                  echo '<div class="alert alert-success">' . $message . "</div>";
	                  $this->session->unset_userdata('message');
	                }
	            ?>
			</div>
		</div>
		<div class="row py-xl-4">
			<div class="col-lg-3 welcome-left pr-lg-5" style="border:1px solid #e2e2e2;padding: 10px;">
				<?php include('left_menu.php'); ?>
			</div>
			<div class="col-lg-9" style="border:1px solid #e2e2e2;">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
	                <thead>
	                    <tr>
	                        <th>SN</th>
	                        <th>Product Name</th>
	                        <th>Category</th>
	                        <th>Price</th>
	                        <th>Photo</th>
	                        <th>Status</th>
	                    </tr>
	                </thead>   
	                <tbody>
	                    <?php
	                        $i=1;
	                        foreach($all_product as $val){ 

                        	$this->db->select('tbl_image.file');
                            $this->db->from('tbl_image'); 
                            $this->db->join('product','tbl_image.img_prodid=product.prod_id');
                            $this->db->where('tbl_image.img_prodid',$val->prod_id);
                            $query = $this->db->get(); 
                            $imgQuery =  $query->row(); 
	                    ?>
	                    <tr>
	                        <td><?php echo $i++;?></td>
	                        <td class="center"><?php echo $val->prod_name;?></td>
	                        <td class="center"><?php echo $val->category;?></td>
	                        <td class="center">BDT <?php echo $val->prod_price;?></td>
	                        <td class="center">
	                            <img src="<?= base_url($imgQuery->file);?>" height="100px" width="100px">
	                        </td>
	                        <td class="center">
	                            <?php 
	                                if($val->is_approved == 1){
	                                    echo '<label class="published">'.'Published'.'</label>';
	                                }else{
	                                    echo '<label class="pending">'.'Pending'.'</label>';
	                                }
	                            ?>
	                        </td>
	                    </tr>
	                    <?php } ?>
	                </tbody>
	            </table> 
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>