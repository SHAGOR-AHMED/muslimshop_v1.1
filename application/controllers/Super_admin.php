<?php
defined('BASEPATH') OR exit('Super Admin error');

class Super_admin extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Merchant_model');
	}
	
	public function index(){

		$data['AllProduct']=$this->Admin_model->products();
		$data['AllCategory']=$this->Admin_model->category();
		$data['AllOrder']=$this->Admin_model->manage_order();
		$this->load->view('admin/master',$data);
	}

//================== photo ========================//

	public function photo(){

		$data=array();
		$data['all_photo']=$this->Admin_model->get_all_photo();
		$this->load->view('admin/photo',$data);
	}

	public function add_photo(){

		$this->load->view('admin/add_photo');
	}

	public function save_photo(){

        $data=array();
        $data['category'] = $this->input->post('category');

        $this->load->library('upload');
        $config['upload_path'] = './assets/admin/all_photos/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_size'] = 1024;
        // $config['max_width'] = 1000;
        // $config['max_height'] = 1000;
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (empty($_FILES['image']['name'])) {
            return $config['upload_path'];
        }
        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            $dt['message'] = $error;
            $this->session->set_userdata($dt);
            redirect(current_url());
        }
        $uploadImage = $this->upload->data();
        if ($uploadImage['is_image'] == 1){
        	$data['image'] = $config['upload_path'] . $uploadImage['file_name'];
        }else{
        	$sdata=array();
            $sdata['message']="Invalid Image Please select jpg or png";
            $this->session->set_userdata($sdata);
            redirect('add_photo');
        }	
        //print_r($data);exit();
        $result = $this->Admin_model->save_photo($data);
        if($result){
        	$sdata=array();
        	$sdata['message']="Photo Add Successfully !";
        	$this->session->set_userdata($sdata);
        	redirect('super_admin/add_photo');
        }else{
        	$sdata=array();
        	$sdata['message']="Failed to Upload !";
        	$this->session->set_userdata($sdata);
        	redirect('super_admin/add_photo');
        }
            
    }

    public function edit_photo($photoID){

		$data=array();
		$data['photo_info'] = $this->Admin_model->get_photo_info($photoID);
		$this->load->view('admin/edit_photo',$data);
	}

	public function update_photo(){

		$photo_id = $this->input->post('photo_id');
		$category = $this->input->post('category');

		$result = $this->Admin_model->update_photo_info($photo_id,$category);
		if($result){
			$sdata=array();
			$sdata["update"]="Gallery Updated Successfully";
			$this->session->set_userdata($sdata);
			redirect('super_admin/photo');
		}else{
			$sdata=array();
			$sdata["update"]="Failed to update";
			$this->session->set_userdata($sdata);
			redirect('super_admin/photo');
		}
	}

//================== photo end ========================//

	public function add_category(){

		$this->load->view('admin/add_category');
	}

	public function category_save(){

        $data=array();
        $data['category'] = $this->input->post('name');

        $result = $this->Admin_model->add_category($data);

        if($result){
			$sdata=array();
	        $sdata['message']="Category Add Successfully";
	        $this->session->set_userdata($sdata);
	        redirect('add_category');
		}else{
			$sdata=array();
	        $sdata['message']="Failed to add";
	        $this->session->set_userdata($sdata);
	        redirect('add_category');
		}
    }//category_save

	public function category(){

		$data=array();
		$data['result']=$this->Admin_model->category();
		$this->load->view('admin/category',$data,'true');
	}

	public function edit_category($id){

		$data=array();
		$data['result']=$this->Admin_model->edit_category($id);
		$this->load->view('admin/edit_category',$data,'true');
	}

	public function edit_category_save(){

		$id = $this->input->post('id');
		$data['category'] = $this->input->post('category');

		$result = $this->Admin_model->edit_category_save($id,$data);

		if($result){
	        $sdata=array();
			$sdata["update"]="Category Update Successfully";
			$this->session->set_userdata($sdata);
			redirect('category');
		}else{
			$sdata=array();
			$sdata["update"]="Failed to Update";
			$this->session->set_userdata($sdata);
			redirect('category');
		}

	}//edit_category_save

	public function delete_category($id){

		$result = $this->Admin_model->delete_category($id);
		if($result){
			$sdata=array();
			$sdata["delete"]="Category Delete Successfully";
			$this->session->set_userdata($sdata);
			redirect('category');
		}else{
			$sdata=array();
			$sdata["delete"]="Failed to delete!";
			$this->session->set_userdata($sdata);
			redirect('category');
		}
		
	}//delete_category

//==================== category end =============================

	public function add_subcategory(){

		$data=array();
		$data['category']=$this->Admin_model->category();
		$this->load->view('admin/add_subcategory',$data,'true');
	}

	public function subcategory(){

		$data=array();
		$data['subcategory']=$this->Admin_model->subcategory();
		$this->load->view('admin/subcategory',$data,'true'); 
	}

	public function subcategory_save(){

		$data=array();
		$data['subcat_catid']=$this->input->post('category');
		$data['subcategory']=$this->input->post('subcategory');

		$this->Admin_model->add_subcategory($data);
		$data['message']="Subcategory Add Successfully";
		$this->session->set_userdata($data);
		redirect('add_subcategory');
	}

	public function edit_subcategory($id){

		$data=array();
		$data['result'] = $this->Admin_model->select_subcategory_by_id($id);
		$this->load->view('admin/edit_subcategory',$data,'true');
	}

	public function update_subcategory(){

		$id = $this->input->post('id');
		$data['subcategory'] = trim($this->input->post('subcategory'));
		
		$this->Admin_model->update_subcategory_by_id($id,$data);
		$sdata = array();
		$sdata["update"] = "Subcategory Update Successfully";
		$this->session->set_userdata($sdata);
		redirect('subcategory');
	}

	public function delete_subcategory($id){

		$this->Admin_model->delete_subcategory($id);
		$sdata=array();
		$sdata["delete"]="Subcategory Delete Successfully";
		$this->session->set_userdata($sdata);
		redirect('subcategory');
	}

//======================== Product ========================//

	public function products(){

		$data=array();
		$data['result']=$this->Admin_model->products(); 
		$this->load->view('admin/products',$data,'true');
	}

	public function add_product(){

		$this->load->helper('admin_helper');
		$data=array();
		$data['category']=$this->Admin_model->category();
		$data['subcategory']=$this->Admin_model->subcategory();
		$this->load->view('admin/add_product',$data,'true');
	}

	public function product_save(){

		$data=array();
		$data['prod_name'] = $this->input->post('prod_name');
		$data['prod_catid'] = $this->input->post('prod_catid');
		$data['prod_subcatid'] = $this->input->post('prod_subcatid');
		$data['prod_desc'] = $this->input->post('prod_desc');
		$data['prod_code'] = $this->input->post('prod_code');
		$data['prod_price'] = $this->input->post('prod_price');

		$result = $this->Admin_model->product_save($data);

	//------------multiple img upload------------------//

		foreach($_FILES as $key => $file){
   
			$errors = array();
			$file_name = $_FILES['file']['name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			$file_tmp = $_FILES['file']['tmp_name'];
	
   			for($i = 0; $i<count($file['name']); $i++){
    
			    if($file['name'][$i]){

			    	$str = $file['name'][$i];
					$fileName = str_replace(' ', '', $str);

					$nameExp =  explode('.',$fileName);
					$tempFileName = $nameExp[count($nameExp)-1];
					$orgName = $fileName.time().'.'.$tempFileName;
					//echo $orgName; exit();

			    	$file_dir = "assets/img/product_image/".$orgName;

				    if(move_uploaded_file($file["tmp_name"][$i],$file_dir)){

				    	$this->db->select_max('prod_id');
					    $query  = $this->db->get('product');
					    $rst  = $query->row();
					    $getproductid = $rst->prod_id;

						$ImgInsert = $this->Admin_model->image_save($getproductid, $file_dir);

				    }else{
				      echo "Failed to Upload";
				   }

				}//if
  			}//for
		}//foreach

    	if($ImgInsert){

	        $sdata=array();
			$sdata["message"]="Product Added Successfully";
			$this->session->set_userdata($sdata);
	        redirect('add_product');

	    }else{

	    	$sdata=array();
			$sdata["message"]="Failed to added product"; 
			$this->session->set_userdata($sdata);
	        redirect('add_product');
	    }

	//------------//multiple img upload------------------//

	}//product_save


	public function edit_product($prodID){

		$data['selected_product'] = $this->Admin_model->select_product($prodID);
		$this->load->view('admin/edit_product', $data);
		
	}

	public function UpdateProduct(){

		$prod_id = $this->input->post('prod_id');
		$prod_name = $this->input->post('name');
		$prod_desc = $this->input->post('description');
       
		$result = $this->Admin_model->update_product($prod_id,$prod_name,$prod_desc);

		if(isset($_FILES['file']['name']) && ($_FILES['file']['name'] != '') ){
			$result2 = $this->Admin_model->update_product_image($prod_id);
		}

		if($result){

			$sdata=array();
			$sdata["message"]="Product Update Successfully !";
			$this->session->set_userdata($sdata);
	        redirect('products');

		}else{

			$sdata=array();
			$sdata["message"]="Failed to Update !";
			$this->session->set_userdata($sdata);
	        redirect('products');
		}

	}

	public function delete_product($prodID){

		$result2 = $this->Admin_model->delete_product($prodID);

		if($result2){
			$sdata=array();
			$sdata["delete"]="Product Delete Successfully";
			$this->session->set_userdata($sdata);
			redirect('products');
		}else{
			$sdata=array();
			$sdata["delete"]="Failed to Delete";
			$this->session->set_userdata($sdata);
			redirect('products');
		}
	}

	public function published_product($prodID){

		$result = $this->Admin_model->published_product($prodID);

		if($result){
			$sdata=array();
			$sdata["message"]="Product Published Successfully";
			$this->session->set_userdata($sdata);
			redirect('products');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Publish";
			$this->session->set_userdata($sdata);
			redirect('products');
		}

	}

	public function reject_product($prodID){

		$result = $this->Admin_model->reject_product($prodID);

		if($result){
			$sdata=array();
			$sdata["message"]="Product Reject Successfully";
			$this->session->set_userdata($sdata);
			redirect('products');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Reject";
			$this->session->set_userdata($sdata);
			redirect('products');
		}

	}

//==================== Order Summary ====================//

	public function ManageOrder(){

		$data=array();
		$data['result'] = $this->Admin_model->manage_order();
		$this->load->view('admin/manage_order',$data,'true');
	}
	
	public function ViewOrderDetails($order_id){

		$data=array();
		$data['order_info'] = $this->Admin_model->select_order_info_by_id($order_id);
		$customer_id = $data['order_info']->customer_id;
		$shipping_id = $data['order_info']->shipping_id;
		$data['customer_info'] = $this->Admin_model->select_customer_info_by_id($customer_id);
		//print_r($data['customer_info']);exit;
		$data['shipping_info'] = $this->Admin_model->select_shipping_info_by_id($shipping_id);
		$data['order_details_info'] = $this->Admin_model->select_order_details_info_by_id($order_id);
        $this->load->view('admin/invoice',$data);
	}

	public function CreateInvoice($order_id){

		$data = array();
		$data['order_info'] = $this->Admin_model->select_order_info_by_id($order_id);
		$customer_id = $data['order_info']->customer_id;
		$shipping_id = $data['order_info']->shipping_id;
		$data['customer_info'] = $this->Admin_model->select_customer_info_by_id($customer_id);
		$data['shipping_info'] = $this->Admin_model->select_shipping_info_by_id($shipping_id);
		$data['order_details_info'] = $this->Admin_model->select_order_details_info_by_id($order_id);

		$this->load->helper('dompdf');
		//$this->load->view('admin/download_invoice',$data);
		$view_file = $this->load->view('admin/download_invoice',$data,true);
		$file_name = pdf_create($view_file,'inv-00'.$order_id);
		echo $file_name;
	}

	public function GraphicalReport(){

		$data['product_info'] = $this->Admin_model->select_all_product_info();
		$this->load->view('admin/pie_chart_test',$data);
	}


	public function ViewDeliveredProduct(){

		$data['result'] = $this->Admin_model->view_delivered_product();
		$this->load->view('admin/delivered_product',$data,'true');
	}

	public function ProductDelivered($order_id){

		$data=array();
		$data['result'] = $this->Admin_model->delivered_product($order_id);
		$sdata = array();
		$sdata["msg"]="Order has been Delivered !";
		$this->session->set_userdata($sdata);
		redirect('super_admin/ViewDeliveredProduct');
	}

	public function ViewCancleProduct(){

		$data['result'] = $this->Admin_model->view_cancle_order();
		$this->load->view('admin/cancle_order',$data,'true');
	}

	public function CancleOrder($order_id){

		$data=array();
		$data['result'] = $this->Admin_model->cancle_order($order_id);
		$sdata = array();
		$sdata["msg"]="Order has been cancle !";
		$this->session->set_userdata($sdata);
		redirect('super_admin/ViewCancleProduct');
	}

//========================= other ==========================//

    public function getSubcatByCatId($id = null){
        
        if ($id != null) {
            $this->load->helper('admin_helper');
            getAllSubcatByCatId($id);
        }
    }

    public function getStateByCountryId($id = null){
        
        if ($id != null) {
            $this->load->helper('admin_helper');
            getAllStatesByCountryId($id);
        }
    }


//=================== merchant acc ===========================//

    public function get_merchants(){
    	$data=array();
		$data['all_merchants'] = $this->Merchant_model->get_all_merchants();
		$this->load->view('admin/merchants',$data);
    }

    public function activeMerchant($mrcID){

		$result = $this->Admin_model->activeMerchant($mrcID);

		if($result){
			$sdata=array();
			$sdata["message"]="Merchant has been Active Successfully";
			$this->session->set_userdata($sdata);
			redirect('Super_admin/get_merchants');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Active Merchant";
			$this->session->set_userdata($sdata);
			redirect('Super_admin/get_merchants');
		}

	}

	public function inactiveMerchant($mrcID){

		$result = $this->Admin_model->inactiveMerchant($mrcID);

		if($result){
			$sdata=array();
			$sdata["message"]="Merchant has been Inactive Successfully";
			$this->session->set_userdata($sdata);
			redirect('Super_admin/get_merchants');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Inactive Merchant";
			$this->session->set_userdata($sdata);
			redirect('Super_admin/get_merchants');
		}

	}

//==================== password change & logout ======================//

    public function cpassword(){

    	$this->load->view('admin/change_password');
    }

    public function change_password(){

    	$this->Admin_model->change_password();
    }

	public function logout(){

		$this->session->unset_userdata($id);
		$this->session->unset_userdata($username);
		redirect('Admin');
	}

}//super_admin

?>