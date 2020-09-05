<html>
    <head>
        <title>Order View</title>
    </head>
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
        }

    </style>
    <body>
        
        <table cellspacing="1" width="50%" cellpadding="10" bgcolor="red" align="center">
            <tbody>
                <tr>
                    <td bgcolor="#ffffff">

                        <h2>Order View</h2>
                        <hr/><br>

                        <table width="100%" id="invoicetoptables" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td colspan="2" id="invoicecontent" style="border:1px solid #cccccc">
                                        <table width="100%" height="100" cellspacing="0" cellpadding="10" id="invoicetoptables">
                                            <tbody>
                                                <tr>
                                                    <td width="50%" valign="top" id="invoicecontent" style="border:1px solid #cccccc">
                                                        <strong>Invoice To</strong><br>
                                                        <?php echo $customer_info->firstname.' '.$customer_info->lastname?><br>
                                                        <?php echo $customer_info->email_address?>, <br>
                                                        <?php echo $customer_info->address?>, <br>
                                                        <?php echo $customer_info->mobile_no?>, <?php echo $customer_info->zip_code?><br>
                                                    </td>

                                                    <td width="50%" valign="top" id="invoicecontent" style="border:1px solid #cccccc">
                                                        <strong>Ship To</strong><br>
                                                        <?php echo $shipping_info->name?><br>
                                                        <?php echo $shipping_info->email?><br>
                                                        <?php echo $shipping_info->phone?><br>
                                                        <?php echo $shipping_info->address?>, <br>
                                                        <?php echo $shipping_info->city?><br>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>     
                                </tr>
                            </tbody>
                        </table>

                        <p style="font-size: 14px;">
                            <strong>Invoice #inv-<?php echo $order_info->order_id?></strong><br>
                            Invoice Date: <?php echo $order_info->order_date?><br>
                            Due Date: <?php echo date('Y-m-d', strtotime($order_info->order_date. ' + 7 day'))?>
                        </p>
                        <hr/>
                        <h2>Order Details</h2>
                        <hr/>

                        <table id="sample-table-2" class="table table-striped table-bordered table-hover" border="1" width="100%" id="invoicetoptables" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="name">Product Name</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="price">Unit Price</th>
                                    <th class="total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total=0;
                                    foreach($order_details_info as $v_order_info){
                                ?>
                                <tr id="prod_info">
                                    
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
                                </tr>
                                <?php
                                
                                    $total = $total+$v_order_info->product_sales_quantity * $v_order_info->product_price;
                                
                                    } 
                                ?>
                            </tbody>
                        </table>

                        <br>

                        <table  align="right" width="40%" border="1px" id="summary">
                            <?php
                                $district =  $shipping_info->district;
                                $row = $this->db->select('*')->from('states')->where('id',$district)->get()->row();
                                $shipping_cost = $row->shipping_cost;
                            ?>
                            <tbody>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="right"><b>Sub-Total :</b></td>
                                    <td class="right numbers">BDT <?php echo $total;?></td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="right"><b>Shipping Cost :</b></td>
                                    <td class="right numbers">
                                        <?php
                                            echo 'BDT '.$shipping_cost;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td class="right numbers_total"><b>Grand Total :</b></td>
                                    <td class="right numbers_total">
                                        <?php 
                                            $g_total=$total + $shipping_cost;
                                            echo 'BDT&nbsp;'.$g_total
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
            </tbody>
       </table>

    </body>
<html>