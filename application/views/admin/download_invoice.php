<html>
    <head>
        <title>Invoice</title>
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

        <table cellspacing="1" width="100%" cellpadding="10" border="1px" align="center">
            <tbody>
                <tr>
                    <td bgcolor="#ffffff">

                        <h2>Order View</h2>
                        <hr/><br>

                        <table width="100%" id="invoicetoptables" cellspacing="0">
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
                                                        <b>Address :</b> <?php echo $shipping_info->address?><br>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                            
                                </tr>
                            </tbody>
                        </table>

                        <p><strong><u>Invoice</u> #inv-<?php echo $order_info->order_id?></strong><br>
                            <b>Invoice Date :</b> <?php echo $order_info->order_date?><br>
                            <b>Due Date :</b> <?php echo date('Y-m-d', strtotime($order_info->order_date. ' + 7 day'))?>
                        </p>
                        <hr/>
                        <h2>Order Details</h2>
                        <hr/>

                        <table border="1" width="100%" id="invoicetoptables" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="name">Product Image</th>
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

                    </td>
                </tr>
            </tbody>
       </table>
    <body>
<html>