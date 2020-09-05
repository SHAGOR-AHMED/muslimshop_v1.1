<?php
defined('BASEPATH') OR exit('Super Admin error');

class Order_details extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Orderdetails_model');
	}
	
	public function index(){
		
	}
	
	public function orderDelivered($odID){

		$getOrderID = $this->db->select('order_id')->from('tbl_order_details')->where('order_details_id', $odID)->get()->row();
		$orderID = $getOrderID->order_id;

		$result = $this->Orderdetails_model->order_deliveres($odID);

		if($result){
			$sdata=array();
			$sdata["message"]="Product status changed Successfully";
			$this->session->set_userdata($sdata);
			redirect('Super_admin/ViewOrderDetails/'.$orderID);
		}else{
			$sdata=array();
			$sdata["message"]="Failed to change product status";
			$this->session->set_userdata($sdata);
			redirect('Super_admin/ViewOrderDetails/'.$orderID);
		}

	}

	public function orderCancel($odID){

		$getOrderID = $this->db->select('order_id')->from('tbl_order_details')->where('order_details_id', $odID)->get()->row();
		$orderID = $getOrderID->order_id;

		$result = $this->Orderdetails_model->cancel_order($odID);

		if($result){
			$sdata=array();
			$sdata["message"]="Product status changed Successfully";
			$this->session->set_userdata($sdata);
			redirect('Super_admin/ViewOrderDetails/'.$orderID);
		}else{
			$sdata=array();
			$sdata["message"]="Failed to change product status";
			$this->session->set_userdata($sdata);
			redirect('Super_admin/ViewOrderDetails/'.$orderID);
		}
	}


}//Order_details

?>