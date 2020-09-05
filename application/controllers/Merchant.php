<?php
defined('BASEPATH') OR exit('Super Admin error');

class Merchant extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Merchant_model');
		$this->load->helper('admin_helper');
	}
	
	public function index(){
		$data = array();
		$data['slider'] = 0;
		$MerchantID = $this->session->userdata('merchant_id');
		$data['all_product'] = $this->Merchant_model->AllProducts($MerchantID);
		$data['content'] = $this->load->view('frontend/page/my_account', $data, true);
		$this->load->view('frontend/index',$data);
	}

//======================== upload merchant product ======================//

    public function uploadProduct(){
		$data = array();
		$data['slider'] = 0;
		$data['content'] = $this->load->view('frontend/page/upload_product', '', true);
		$this->load->view('frontend/index',$data);
	}

	public function product_save(){

		$data=array();
		$data['prod_name'] = $this->input->post('prod_name');
		$data['prod_catid'] = $this->input->post('prod_catid');
		$data['prod_subcatid'] = $this->input->post('prod_subcatid');
		$data['prod_desc'] = $this->input->post('prod_desc');
		$data['prod_code'] = $this->input->post('prod_code');
		$data['prod_price'] = $this->input->post('prod_price');

		$MerchantID = $this->session->userdata('merchant_id');
		$data['merchant_id'] = $MerchantID;

		// echo '<pre>';
		// print_r($data);
		// exit();

		$result = $this->Merchant_model->product_save($data);

//---------------------multiple img upload------------------//

		foreach($_FILES as $key => $file){
   
			$errors = array();
			$file_name = $_FILES['file']['name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			$file_tmp = $_FILES['file']['tmp_name'];
	
   			for($i = 0; $i<count($file['name']); $i++){
    
			    if($file['name'][$i]){

			    	$fileName = $file['name'][$i];
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

						$ImgInsert = $this->Merchant_model->image_save($getproductid, $file_dir);

				    }else{
				      	echo "Failed to Upload";
				   }

				}//if
  			}//for
		}//foreach

    	if($ImgInsert){

	        $sdata=array();
			$sdata["message"]="Product Add Successfully";
			$this->session->set_userdata($sdata);
	        redirect('Merchant/index');

	    }else{

	    	$sdata=array();
			$sdata["message"]="Failed to added product"; 
			$this->session->set_userdata($sdata);
	        redirect('Merchant/index');
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


//========================== manage order summary =====================//

	public function manageOrder(){
		$data = array();
		$data['slider'] = 0;
		$MerchantID = $this->session->userdata('merchant_id');
		$data['all_order'] = $this->Merchant_model->manageOrder($MerchantID);
		$data['content'] = $this->load->view('frontend/page/manage_order', $data, true);
		$this->load->view('frontend/index',$data);
	}

	public function deliveredOrder(){
		$data = array();
		$data['slider'] = 0;
		$MerchantID = $this->session->userdata('merchant_id');
		$data['delivered_order'] = $this->Merchant_model->deliveredOrder($MerchantID);
		$data['content'] = $this->load->view('frontend/page/delivered_order', $data, true);
		$this->load->view('frontend/index',$data);
	}

	public function cancelOrder(){
		$data = array();
		$data['slider'] = 0;
		$MerchantID = $this->session->userdata('merchant_id');
		$data['cancel_order'] = $this->Merchant_model->cancelOrder($MerchantID);
		$data['content'] = $this->load->view('frontend/page/cancel_order', $data, true);
		$this->load->view('frontend/index',$data);
	}

//========================= merchant information ========================//

	public function check_merchant_login(){

		$email = $this->input->post('email',true);
		$password = md5($this->input->post('password',true));
		$result = $this->Merchant_model->check_merchant_login_info($email,$password);
		
		$sdata = array();
		if($result){
			$sdata['merchant_id'] = $result->merchant_id; 
			$sdata['merchant_name'] = $result->merchant_name;
			$this->session->set_userdata($sdata);
			redirect('Merchant/');
		}else{
			$sdata['message']='Merchant Email or Password is Invalid..!!';
			$this->session->set_userdata($sdata);
			redirect('Welcome/');
		}
	}

	public function MyProfile($MerchantID){

		$data = array();
		$data['slider'] = 0;
		$data['selected_info'] = $this->Merchant_model->selectedInfo_byID($MerchantID);
		$data['content'] = $this->load->view('frontend/page/my_profile', $data, true);
		$this->load->view('frontend/index',$data);
	}

	public function update_merchant(){

		$MerchantID = $this->input->post('merchant_id');
		$data['merchant_name'] = $this->input->post('merchant_name');
		$data['mobile_no'] = $this->input->post('mobile_no');
		$data['email'] = $this->input->post('email');
		$data['address'] = $this->input->post('address');

		$result = $this->Merchant_model->updateMerchant($MerchantID, $data);

		if($result){
			$msg = 'Information update successfully !!!';
			$message = $this->msg($msg);
			redirect('Merchant/index');
		}else{
			$msg ='Failed to update !!!';
			$message = $this->msg($msg);
			redirect('Merchant/index');
		}
	}

//=============================== change password ==========================//

    public function ChangePassword($merchantID){

	 	$data['message'] = array();
	 	$data['slider'] = 0;
		$data['message'] = $this->session->flashdata('message');
	 	$data['merchantID'] = $merchantID;
		$data['content'] = $this->load->view('frontend/page/change_password', $data, true);
		$this->load->view('frontend/index',$data);
    }

    public function update_password(){

    	$merchantID = $this->input->post('merchant_id');
    	$old_pass = md5($this->input->post('old_password'));
    	$new_pass = md5($this->input->post('new_password'));
    	$con_pass = md5($this->input->post('confirm_password'));

    	$pre_info = $this->db->select('*')->from('tbl_merchant')->where('merchant_id', $merchantID)->get()->row();
    	$pre_pass = $pre_info->password;

  		if($pre_pass == $old_pass){

  			if($new_pass == $con_pass){

  				$result = $this->Merchant_model->update_password($merchantID,$new_pass);

  				if($result){

  					$this->session->unset_userdata('merchant_id');
					$this->session->unset_userdata('merchant_name');
					$msg = "Password Updated Successfully ! Login Again !!!";
					$message = $this->msg($msg);
					redirect('Welcome/');

				}else{

					$msg = "Failed to Update Password !!!";
					$message = $this->msg($msg);
					redirect('Merchant/ChangePassword/'.$merchantID);
				}

  			}else{

				$msg = "New Password and Confirm Password doesn't Match.!!!";
				$message = $this->msg($msg);
				redirect('Merchant/ChangePassword/'.$merchantID);

  			}

  		}else{

  			$msg = "Old password doesn't match !!!";
			$message = $this->msg($msg);
			redirect('Merchant/ChangePassword/'.$merchantID);
  		}

    }//update_password

	public function logout(){
		session_destroy();
		redirect('Welcome');
	}

	public function msg($msg){
        
        $this->session->set_flashdata('message', $msg);
    }

}//merchant

?>