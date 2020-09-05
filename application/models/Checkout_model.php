<?php

class Checkout_model extends CI_Model{

	public function save_customer_info($data){
		
		$this->db->insert('tbl_customer',$data);
		$customer_id = $this->db->insert_id();
		return $customer_id;
	}
	
	public function save_shipping_info($data){
		
		$this->db->insert('tbl_shipping',$data);
		$shipping_id = $this->db->insert_id();
		return $shipping_id;
		
	}
	
	public function save_payment_info($pdata){
		
		$this->db->insert('tbl_payment',$pdata);
		$payment_id = $this->db->insert_id();
		return $payment_id;
	}
	
	public function save_order_info(){

		/*
		#save data in order table.
		*/
		$odata=array();
		$odata['customer_id'] = $this->session->userdata('customer_id');
		$odata['shipping_id'] = $this->session->userdata('shipping_id');
		$odata['payment_id'] = $this->session->userdata('payment_id');
		$odata['order_total'] = $this->session->userdata('g_total');
		
		$this->db->insert('tbl_order',$odata);
		$order_id = $this->db->insert_id();
		
		/*
		#save data in order details table.
		*/
		$cart = $this->cart->contents();
       
        foreach ($cart as $value) {

	        $oddata = array();
		    $oddata['order_id'] = $order_id;
		    $oddata['merchant_id'] = $value['merchant_id'];
		    $oddata['product_id'] = $value['id'];
		    $oddata['product_price'] = $value['price'];
		    $oddata['product_name'] = $value['name'];
		    $oddata['product_sales_quantity'] = $value['qty'];
		    $oddata['product_image'] = $value['image'];
			$this->db->insert('tbl_order_details', $oddata);
			
		}//foreach

		// $sql="update product as p, tbl_order_details as od
  //             set p.prod_qty = p.prod_qty - od.product_sales_quantity
  //             where p.prod_id=od.product_id and od.order_id='$order_id' ";
  //       $this->db->query($sql);

		//start emailing
		$data=array();
		$data['order_info'] = $this->Admin_model->select_order_info_by_id($order_id);
		$customer_id = $odata['customer_id'];
		$shipping_id = $odata['shipping_id'];
		$data['customer_info'] = $this->Admin_model->select_customer_info_by_id($customer_id);
		$customer_email = $data['customer_info']->email_address;
		$data['shipping_info'] = $this->Admin_model->select_shipping_info_by_id($shipping_id);
		$data['order_details_info'] = $this->Admin_model->select_order_details_info_by_id($order_id);
		/*
        * Start Send Email
        */
        $data['to_address'] = $customer_email;
        $data['subject'] = 'Order View';
        $this->mailer_model->sendEmailToCustomer($data, 'customer_mail',true);
        $this->mailer_model->sendEmailToAdmin($data, 'admin_mail',true);
        /*
        * End Send Email
        */
		
	}//save_order_info

	public function check_customer_login_info($email, $password){

		$query = $this->db->select('*')->from('tbl_customer')->where('email_address',$email)->where('password',$password)->get()->row();
		
		return $query;
	}

    
}//Checkout_model

?>