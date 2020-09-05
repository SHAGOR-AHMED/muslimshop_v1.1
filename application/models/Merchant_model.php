<?php
class Merchant_model extends CI_Model{

	public function get_all_merchants(){
		
		$result = $this->db->select('*')->from('tbl_merchant')->get()->result();
		return $result;
	}

	public function save_merchant_info($data){
		
		return $this->db->insert('tbl_merchant',$data);
	}

	public function selectedInfo_byID($MerchantID){

		$result = $this->db->select('*')->from('tbl_merchant')->where('merchant_id', $MerchantID)->get()->row();
		return $result;
	}

	public function updateMerchant($MerchantID, $data){

		return $this->db->where('merchant_id', $MerchantID)->update('tbl_merchant', $data);
	}

	public function update_password($merchantID,$new_pass){

		return $this->db->set('password', $new_pass)->where('merchant_id', $merchantID)->update('tbl_merchant');
	}

	public function check_merchant_login_info($email,$password){

		$query = $this->db->select('*')->from('tbl_merchant')->where('email',$email)->where('password',$password)->where('status',1)->get()->row();
		return $query;
	}

//======================== merchant product image =======================//

	public function product_save($data){

		$result = $this->db->insert('product',$data);
        return $result;
	}

	public function AllProducts($MerchantID){

		$query = $this->db->select('*')->from('product')->join('category','category.cat_id = product.prod_catid')->where('merchant_id',$MerchantID)->get()->result();
		return $query;
	}

	public function image_save($getproductid, $file_dir){

		$this->db->set('img_prodid', $getproductid);
		$this->db->set('file', $file_dir);
		$ImgInsert = $this->db->insert('tbl_image');
		return $ImgInsert;
	}

	public function selected_product($prodID){

		$this->db->select('*');
		$this->db->from('product'); 
		$this->db->join('category','category.cat_id = product.prod_catid');
		$this->db->join('tbl_image','tbl_image.img_prodid = product.prod_id');
		$this->db->where('prod_id', $prodID);
		$query = $this->db->get(); 
		$result =  $query->row();
		return $result;
	}

	public function selected_image_byID($prodID){

		$this->db->select('*');
		$this->db->from('tbl_image'); 
		$this->db->where('img_prodid', $prodID);
		$query = $this->db->get(); 
		$result =  $query->result();
		return $result;
	}

	public function update_product($prod_id,$prod_name,$prod_desc){

		$this->db->set('prod_name',$prod_name);
		$this->db->set('prod_desc',$prod_desc);
		$result = $this->db->where('prod_id',$prod_id)->update('product');
		return $result;
	}

	public function update_product_image($prod_id){

		if(isset($prod_id) && $prod_id != ''){

			$data = array('img_prodid' => $prod_id);
			$prev_info = $this->db->get_where("tbl_image",$data)->row();

			if(isset($_FILES['file']['name']) && ($_FILES['file']['name'] != '')){
				unlink($prev_info->file);
			}
		}

		if(isset($_FILES['file']['name']) && ($_FILES['file']['name'] != '') ){

			$photo_name = $_FILES['file']['name'];
		
			$config['upload_path'] = 'assets/img/product_image/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|bmp';
			// $config['max_size']	= 1024;
			// $config['max_width'] = 2000;
			// $config['max_height'] = 1000;
			$config['file_name'] = $photo_name;
			$config['overwrite'] = TRUE;

			//print_r($config);exit();

			$this->load->library('upload', $config);
			// getting image name
			$path = $photo_name;
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			if(empty($path) && empty($ext)){
				//$photo = e(post('photo'));
			}else{
				if ( ! $this->upload->do_upload('file')){
					$status = str_replace(array("<p>","</p>"), "", $this->upload->display_errors());
					$dt['message'] = $status;
		            $this->session->set_userdata($dt);
		            redirect(current_url());
				}
				$photo = $config['upload_path'].$photo_name;
				$this->db->set('file', $photo);
			}
		}//if

		$result = $this->db->where('img_prodid',$prod_id)->update('tbl_image');
		return $result;

	}//function

	public function delete_product($prodID){

		$data = array('img_prodid'=>$prodID);
		$old_photo = $this->db->get_where('tbl_image',$data)->row();
		unlink($old_photo->file);
		$result = $this->db->where('prod_id',$prodID)->delete('product');
		$result2 = $this->db->where('img_prodid',$prodID)->delete('tbl_image');
		return $result2;
	}

//======================= manage order summary ===================//

	public function manageOrder($MerchantID){

		$query = $this->db->select('*')->from('tbl_order_details')->where('merchant_id',$MerchantID)->where('product_status',0)->get()->result();
		return $query;
	}

	public function deliveredOrder($MerchantID){

		$query = $this->db->select('*')->from('tbl_order_details')->where('merchant_id',$MerchantID)->where('product_status',1)->get()->result();
		return $query;
	}

	public function cancelOrder($MerchantID){

		$query = $this->db->select('*')->from('tbl_order_details')->where('merchant_id',$MerchantID)->where('product_status',2)->get()->result();
		return $query;
	}


}//Merchant_model

?>