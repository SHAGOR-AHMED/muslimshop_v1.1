
<style type="text/css">
	.pending{
        color:#000;
        padding: 5px;
    }

    .delivered{
        color:green;
        padding: 5px;
    }

    .cancle{
        color:#ff0000;
        padding: 5px;
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
	                        <th>Unit Price</th>
	                        <th>Quantity</th>
	                        <th>Total Price</th>
	                        <th>Photo</th>
	                        <th>Status</th>
	                    </tr>
	                </thead>   
	                <tbody>
	                    <?php
	                        $i=1;
	                        foreach($cancel_order as $val){  
	                    ?>
	                    <tr>
	                        <td><?php echo $i++;?></td>
	                        <td class="center"><?php echo $val->product_name;?></td>
	                        <td class="center">BDT <?php echo $val->product_price;?></td>
	                        <td class="center">BDT <?php echo $val->product_sales_quantity;?></td>
	                        <td class="center">BDT <?php echo $val->product_sales_quantity * $val->product_price;?></td>
	                        <td class="center">
	                            <img src="<?= base_url($val->product_image);?>" height="100px" width="100px">
	                        </td>
	                        <td class="center">
                        		<?php
                                    if($val->product_status == 0){

                                        echo '<label class="pending">'.'Pending'.'</label>';

                                    }else if($val->product_status == 1){

                                        echo '<label class="delivered">'.'Order Delivered'.'</label>';

                                    }else if($val->product_status == 2){

                                        echo '<label class="cancle">'.'Order Cancle'.'</label>';
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