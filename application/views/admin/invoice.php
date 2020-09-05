<?php include('header.php'); ?>

<style type="text/css">
        
    body,td,input,select {
        font-family: Tahoma;
        font-size: 11px;
        color: #000000;
    }

    form {
        margin: 0px;
    }

    a {
        color: #000000;
    }

    #wrapper {
        width: 600px;
    }

    #invoicetoptables {
        width: 100%;
        background-color: #cccccc;
        border-collapse: seperate;
    }

    td#invoicecontent {
        background-color: #ffffff;
        color: #000000;
        font-size: 14px;
    }

    .unpaid {
        font-size: 16px;
        color: #cc0000;
        font-weight: bold;
    }

    .paid {
        font-size: 16px;
        color: #779500;
        font-weight: bold;
    }

    .refunded {
        font-size: 16px;
        color: #224488;
        font-weight: bold;
    }

    .cancelled {
        font-size: 16px;
        color: #cccccc;
        font-weight: bold;
    }

    .collections {
        font-size: 16px;
        color: #ffcc00;
        font-weight: bold;
    }

    #invoiceitemstable {
        width: 100%;
        background-color: #cccccc;
        border-collapse: seperate;
    }

    td#invoiceitemsheading {
        background-color: #efefef;
        color: #000000;
        font-weight: bold;
        text-align: center;
    }

    td#invoiceitemsrow {
        background-color: #ffffff;
        color: #000000;
    }

    .creditbox {
        border: 1px dashed #cc0000;
        font-weight: bold;
        background-color: #FBEEEB;
        text-align: center;
        width: 100%;
        padding: 10px;
        color: #cc0000;
        margin-left: auto;
        margin-right: auto;
    }

    #prod_info td{

        text-align: center;
        font-size: 14px;

    }

    #summary tr td{
        font-size: 14px;
        padding: 8px;
    }

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
<body>
    <div class="inner_content">
        <div class="inner_content_w3_agile_info">
            <div class="agile_top_w3_grids">
                <div class="block-content collapse in" style="padding: 20px;">              
                    <div class="span12" >
                        <table cellspacing="1" width="80%" cellpadding="10" border="1px" align="center">
                            <tbody>
                                <tr>
                                    <td bgcolor="#ffffff">
                                        <h2>Order View</h2>
                                        <hr/>
                                        <table width="80%" id="invoicetoptables" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" id="invoicecontent" style="border:1px solid #cccccc">

                                                        <table width=100%" height="100" cellspacing="0" cellpadding="10" id="invoicetoptables">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="50%" valign="top" id="invoicecontent" style="border:1px solid #cccccc; padding: 10px;">
                                                                        <strong><u>Invoice To</u></strong><br>
                                                                        <b>Name :</b> <?php echo $customer_info->firstname.' '.$customer_info->lastname?><br>
                                                                        <b>Email :</b> <?php echo $customer_info->email_address?><br>
                                                                        <b>Mobile :</b> <?php echo $customer_info->mobile_no?><br>
                                                                        <b>Address :</b> <?php echo $customer_info->address?>
                                                                    </td>

                                                                    <td width="50%" valign="top" id="invoicecontent" style="border:1px solid #cccccc; padding: 10px;">
                                                                        <strong><u>Ship To</u></strong><br>
                                                                        <b>Name :</b> <?php echo $shipping_info->name?><br>
                                                                        <b>Email :</b> <?php echo $shipping_info->email?><br>
                                                                        <b>Mobile :</b> <?php echo $shipping_info->phone?><br>
                                                                        <b>Address :</b> <?php echo $shipping_info->address?>, <br>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <p style="padding: 10px;">
                                            <strong><u>Invoice</u> #inv-<?php echo $order_info->order_id?></strong><br>
                                            <b>Invoice Date :</b> <?php echo $order_info->order_date?><br>
                                            <b>Due Date :</b> <?php echo date('Y-m-d', strtotime($order_info->order_date. ' + 7 day'))?>
                                        </p>
                                        <hr/>
                                        <h2>Order Details</h2>
                                        <hr/>

                                        <?php
                                            $message = $this->session->userdata('message');
                                            if(!empty($message)){ ?>
                                                <div class="alert alert-block alert-success">
                                                    <?php echo $message;?>
                                                </div>
                                        <?php }else{
                                                echo '';
                                            }
                                        ?>
                                        
                                        <table class="table table-striped table-bordered table-hover roni" border="1" width="100%" id="invoicetoptables" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="image">Merchant Code</th>
                                                    <th class="image">Image</th>
                                                    <th class="name">Product Name</th>
                                                    <th class="quantity">Quantity</th>
                                                    <th class="price">Unit Price</th>
                                                    <th class="total">Total</th>
                                                    <th class="total">Status</th>
                                                    <th class="total">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $total=0;
                                                    foreach($order_details_info as $v_order_info){

                                                    // $merchantID = $v_order_info->merchant_id;
                                                    // $merchantCode = $this->db->select('merchant_code')->from('tbl_merchant')->where('merchant_id', $merchantID)->get()->row();
                                                ?>
                                                <tr id="prod_info">

                                                    <td class="name">
                                                        <a href="#">Merchent ID: <?php echo $v_order_info->merchant_id ?></a>
                                                    </td>
                                                    <td class="image">
                                                        <img src="<?php echo base_url().$v_order_info->product_image;?>" width="50" height="50" />
                                                    </td>
                                                    <td class="name">
                                                        <?php echo $v_order_info->product_name;?>
                                                    </td>
                                                    
                                                    <td class="quantity">
                                                       <?php echo $v_order_info->product_sales_quantity;?>
                                                    </td>

                                                    <td class="price">
                                                        BDT <?php echo $v_order_info->product_price;?>
                                                    </td>
                                                    <td class="total">
                                                        BDT <?php echo $v_order_info->product_sales_quantity * $v_order_info->product_price;?>
                                                    </td>
                                                    <td class="total">
                                                        <?php
                                                            if($v_order_info->product_status == 0){

                                                                echo '<label class="pending">'.'Pending'.'</label>';

                                                            }else if($v_order_info->product_status == 1){

                                                                echo '<label class="delivered">'.'Order Delivered'.'</label>';

                                                            }else if($v_order_info->product_status == 2){

                                                                echo '<label class="cancle">'.'Order Cancle'.'</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="total">
                                                        <a href="<?= base_url('Order_details/orderDelivered/'.$v_order_info->order_details_id);?>"><button type="submit" class="btn btn-success">Delivered</button></a>
                                                        <a href="<?= base_url('Order_details/orderCancel/'.$v_order_info->order_details_id);?>"><button type="submit" class="btn btn-danger">Cancel</button></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                
                                                    $total = $total+$v_order_info->product_sales_quantity * $v_order_info->product_price;
                                                
                                                    } 
                                                ?>
                                            </tbody>
                                        </table>

                                        <table  align="right" width="30%" border="1px" id="summary" style="padding: 10px;">
                                            <tbody>
                                                <tr>
                                                    <td class="right"><b>Sub-Total</b></td>
                                                    <td class="right numbers">BDT <?php echo $total;?></td>
                                                </tr>

                                                <tr>
                                                    <td class="right numbers_total"><b>Grand Total</b></td>
                                                    <td class="right numbers_total">
                                                        <?php echo 'BDT&nbsp;'.$total; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <?php
                                            if($order_info->order_status == 'pending'){ ?>

                                            <table  align="center">
                                                <tbody>
                                                    <tr>
                                                        <td class="right">
                                                            <button class="btn btn-danger">
                                                            Order Status:
                                                            </button>
                                                        </td>
                                                        <td class="right numbers">
                                                            <div class="dropdown">
                                                                <button class="btn btn-primary" type="button"
                                                                    data-toggle="dropdown">Delivery Pending <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a href="<?= base_url('super_admin/ProductDelivered/'.$order_info->order_id) ?>">
                                                                            Order Delivered
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= base_url('super_admin/CancleOrder/'.$order_info->order_id) ?>">
                                                                            Cancel Order
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        <?php } ?>

                                    </td>
                                </tr>
                            </tbody>
                       </table>
                        
                    </div>
                </div>
            </div>                       
        </div>                          
    </div><!-- //inner_content_w3_agile_info-->

<?php include('footer.php'); ?>