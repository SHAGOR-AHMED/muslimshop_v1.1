<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Merchant_model');
	}

	public function index(){
		$data = array();
		$data['slider'] = 1;
		$data['random_product'] = $this->Admin_model->randomProduct();
		$data['latest_product'] = $this->Admin_model->latestProduct();
		$data['all_category'] = $this->Admin_model->category();
		$data['content'] = $this->load->view('frontend/page/body', $data, true);
		$this->load->view('frontend/index',$data);
	}

	public function AboutUs(){
		$data = array();
		$data['slider'] = 0;
		$data['content'] = $this->load->view('frontend/page/about', '', true);
		$this->load->view('frontend/index',$data);
	}

	public function Contact(){
		$data = array();
		$data['slider'] = 0;
		$data['content'] = $this->load->view('frontend/page/contact', '', true);
		$this->load->view('frontend/index',$data);
	}

	public function ProductBySubID($subcatid=''){

		if(!empty($subcatid)){

			$data['slider'] = 0;
			$data['all_subcatproduct'] = $this->Admin_model->select_product_by_subid($subcatid);
			$data['SubCat_name'] = $this->db->select('subcategory')->from('subcategory')->where('subcat_id',$subcatid)->get()->row();
			$data['content'] = $this->load->view('frontend/page/product', $data, true);
			$this->load->view('frontend/index', $data);

		}else{

			$this->load->view('frontend/page/404_error');
		}
	}

	public function SearchProduct(){
		$data = array();
		$KeyWord = $this->input->post('key_word');
		$data['slider'] = 0;
		$data['Search_Product']=$this->Admin_model->get_search_product($KeyWord);
		$data['content'] = $this->load->view('frontend/page/search_product', $data, true);
		$this->load->view('frontend/index',$data);
	}

	public function ProductDetails($prodID=''){

		if(!empty($prodID)){

			$data = array();
			$data['slider'] = 0;
			$data['product_description'] = $this->Admin_model->selected_productDetails($prodID);
			$catID = $data['product_description']->prod_catid;
			//print_r($data);exit();
			$data['product_img'] = $this->Admin_model->selected_image_byID($prodID);
			$data['related_product']= $this->Admin_model->Related_product($catID);
			$data['content'] = $this->load->view('frontend/page/product_details', $data, true);
			$this->load->view('frontend/index',$data);

		}else{

			$this->load->view('frontend/page/404_error');
		}

	}


//=================== merchant acc ========================//

	public function save_merchant(){

        $data = array();
        $data['merchant_name'] = $this->input->post('merchant_name');
        $data['email'] = $this->input->post('email');
        $data['mobile_no'] = $this->input->post('mobile_no');
        $data['password'] = md5($this->input->post('password'));
        $data['address'] = $this->input->post('address');
        $data['nid'] = $this->input->post('nid');

        $this->db->select_max('merchant_id');
	    $query  = $this->db->get('tbl_merchant');
	    $rst  = $query->row();
	    $getMaxID = $rst->merchant_id;
	    $data['merchant_code'] = 'MRC_'.date("ymd").($getMaxID+1);

    	$result = $this->Merchant_model->save_merchant_info($data);

        if($result){
        	$sdata=array();
        	$sdata['message']="Your information has been send Successfully. Please waiting for confirmation !!!";
        	$this->session->set_userdata($sdata);
        	redirect('Welcome/');
        }else{
        	$sdata=array();
        	$sdata['message']="Failed to registration !";
        	$this->session->set_userdata($sdata);
        	redirect('Welcome/');
        }

    }//save_merchant

}//Welcome

?>