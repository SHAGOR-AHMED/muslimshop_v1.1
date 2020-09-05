<?php include('header.php'); ?>
<style type="text/css">
    #status{
        color: green;
        text-transform: uppercase;
    }
</style>
    <div class="inner_content">
        <!-- /inner_content_w3_agile_info-->
        <div class="inner_content_w3_agile_info">
            <!-- /agile_top_w3_grids-->
            <div class="agile_top_w3_grids">
                <div class="block-content collapse in"> 
                    <div class="alert alert-info" style="text-align: center;font-size: 16px;">
                        All Delivered Order List
                    </div>             
                    <div class="span12">
                        <?php
                            if($this->session->userdata('msg')){

                                print '<div class="alert alert-success">'.$this->session->userdata('msg').'</div>';
                                $this->session->unset_userdata('msg');
                            }
                        ?>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Order Id</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    foreach ($result as $order) {                                   
                                        $i++;
                                ?>
                                    <tr>
                                        <td class="center"><?php echo $i;?></td> 
                                        <td class="center"><?php echo $order->order_id;?></td> 
                                        <td class="center"><?php echo 'BDT '.$order->order_total;?></td>   
                                        <td class="center" id="status"><?php print $order->order_status;?></td>
                                           
                                        <td class="center">

                                            <a href="<?= base_url('Super_admin/ViewOrderDetails/'.$order->order_id) ?>">
                                                View
                                            </a>

                                        </td>                        
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>                       
            </div>                          
        </div><!-- //inner_content_w3_agile_info-->
    </div>
<?php include('footer.php'); ?>