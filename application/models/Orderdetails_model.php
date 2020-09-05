<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderdetails_model extends CI_Model{
	
	public function order_deliveres($odID){
		$this->db->set('product_status',1);
		$this->db->where('order_details_id',$odID);
		return $this->db->update('tbl_order_details');
	}

	public function cancel_order($odID){
		$this->db->set('product_status',2);
		$this->db->where('order_details_id',$odID);
		return $this->db->update('tbl_order_details');
	}

}//Orderdetails_model

?>