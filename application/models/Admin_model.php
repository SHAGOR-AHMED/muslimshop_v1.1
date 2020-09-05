<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
	
	public function admin_login(){

		$name=$this->input->post('name');
		$password=md5($this->input->post('password'));
		$this->db->select('*');
		$this->db->from('a_panel');
		$this->db->where('username',$name);
		$this->db->where('password',$password);
		$get=$this->db->get();
		$get2=$get->row();
		return $get2;
	}

	public function get_all_users(){
		$query = $this->db->select('*')->from('a_panel')->get()->result();
		return $query;
	}

	public function Insert_user($data){

		$result = $this->db->insert('a_panel',$data);
		return $result;
	}

	public function edit_user($id){
		$query = $this->db->select('*')->from('a_panel')->where('id',$id)->get()->row();
		return $query;
	}

	public function updateUser_info($id,$data){

		$result = $this->db->where('id',$id)->update('a_panel',$data);
		return $result;
	}

	public function Delete_user($id){

		return $this->db->where('id',$id)->delete('a_panel');
	}
	
	public function update_password($userID,$new_pass){

		$this->db->set('password', $new_pass);
		$query = $this->db->where('id', $userID)->update('a_panel');
		return $query;
	}

//=================== photo =========================//

	public function save_photo($data){

		$result = $this->db->insert('tbl_photo',$data);
		return $result;
	}

	public function get_all_photo(){

		$query = $this->db->select('*')->from('tbl_photo')->get()->result();
		return $query;
	}

	public function get_all_slide(){

		$query = $this->db->select('*')->from('tbl_photo')->where('category',1)->get()->result();
		return $query;
	}

	public function get_all_client(){

		$query = $this->db->select('*')->from('tbl_photo')->where('category',2)->get()->result();
		return $query;
	}

	public function get_all_gallery(){

		$query = $this->db->select('*')->from('tbl_photo')->where('category',3)->get()->result();
		return $query;
	}

	public function get_photo_info($photoID){

		$query = $this->db->select('*')->from('tbl_photo')->where('photo_id',$photoID)->get()->row();
		return $query;
	}

	public function update_photo_info($photo_id,$category){

		$this->db->set('category', $category);

		if(isset($photo_id) && $photo_id != ''){

			$data = array('photo_id' => $photo_id);
			$prev_info = $this->db->get_where("tbl_photo",$data)->row();

			if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '')){
				unlink($prev_info->image);
			}
		}

		if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '') ){

			$photo_name = $_FILES['image']['name'];
		
			$config['upload_path'] = 'assets/admin/all_photos/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif|bmp';
			$config['max_size']	= 1024;
			$config['max_width'] = 2000;
			$config['max_height'] = 1000;
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
				if ( ! $this->upload->do_upload('image')){
					$status = str_replace(array("<p>","</p>"), "", $this->upload->display_errors());
					$dt['message'] = $status;
		            $this->session->set_userdata($dt);
		            redirect(current_url());
				}
				$photo = $config['upload_path'].$photo_name;
				$this->db->set('image', $photo);
			}
		}

		$result = $this->db->where('photo_id',$photo_id)->update('tbl_photo');
		return $result;
	}

//=================== photo end ====================//

	public function add_category($data){

		return $this->db->insert('category',$data);
	}

	public function category(){
		$query = $this->db->select('*')->from('category')->get()->result();
		return $query;
	}

	public function edit_category($id){
		$query = $this->db->select('*')->from('category')->where('cat_id',$id)->get()->row();
		return $query;
	}

	public function edit_category_save($id,$data){

		$result = $this->db->where('cat_id',$id)->update('category',$data);
		return $result;
	}

	public function delete_category($id){

		return $this->db->where('cat_id',$id)->delete('category');
	}

//=========================== category end ===========================//

	public function subcategory(){

		$this->db->select('*');
		$this->db->from('subcategory');
		$this->db->join('category','category.cat_id=subcategory.subcat_catid');
		$query = $this->db->get(); 
		return $query->result();
	}

	public function add_subcategory($data){

		return $this->db->insert('subcategory',$data);
	}

	public function select_subcategory_by_id($id){

		$query = $this->db->select('*')->from('subcategory')->where('subcat_id',$id)->get()->row();
		
		return $query;
	}

	public function update_subcategory_by_id($id,$data){

		return $this->db->where('subcat_id',$id)->update('subcategory',$data);
	}

	public function delete_subcategory($id){

		return $this->db->where('subcat_id',$id)->delete('subcategory');
	}

//=========================== product start =============================//

	public function products(){

		$this->db->select('*');
		$this->db->from('product'); 
		$this->db->join('category','category.cat_id=product.prod_catid');
		//$this->db->join('tbl_image','tbl_image.img_prodid=product.prod_id');
		$this->db->order_by('prod_id','DESC');
		$query = $this->db->get(); 
		$result =  $query->result();
		return $result;
	}

	public function product_save($data){

		$result = $this->db->insert('product',$data);
		$product_id = $this->db->insert_id();
        return $product_id;
	}

	public function AllProducts(){

		$query = $this->db->select('*')->from('product')->limit(8)->get()->result();
		return $query;
	}

	public function randomProduct(){

		$query = $this->db->select('*')->from('product')->where('is_approved',1)->order_by('rand()')->limit('9')->get()->result();
		return $query;
	}

	public function latestProduct(){

		$query = $this->db->select('*')->from('product')->where('is_approved',1)->order_by('prod_id', 'DESC')->limit('6')->get()->result();
		return $query;
	}

	public function Related_product($catID){

		$query = $this->db->select('*')->from('product')->where('prod_catid', $catID)->limit(3)->get()->result();
		return $query;
	}

	public function image_save($getproductid, $file_dir){

		$this->db->set('img_prodid', $getproductid);
		$this->db->set('file', $file_dir);
		$ImgInsert = $this->db->insert('tbl_image');
		return $ImgInsert;
	}

	public function select_product($prodID){

		$this->db->select('*');
		$this->db->from('product'); 
		$this->db->join('category','category.cat_id = product.prod_catid');
		$this->db->join('tbl_image','tbl_image.img_prodid = product.prod_id');
		$this->db->where('prod_id', $prodID);
		$query = $this->db->get(); 
		$result =  $query->row();
		return $result;
	}

	public function selected_productDetails($prodID){

		$this->db->select('product.*');
		$this->db->select('tbl_merchant.mobile_no');
		$this->db->select('category.category');
		$this->db->from('product'); 
		$this->db->join('category','category.cat_id = product.prod_catid','left');
		$this->db->join('tbl_image','tbl_image.img_prodid = product.prod_id','left');
		$this->db->join('tbl_merchant','tbl_merchant.merchant_id = product.merchant_id','left');
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

	public function published_product($prodID){
		$this->db->set('is_approved',1);
		$this->db->where('prod_id',$prodID);
		return $this->db->update('product');
	}

	public function reject_product($prodID){
		$this->db->set('is_approved',0);
		$this->db->where('prod_id',$prodID);
		return $this->db->update('product');
	}

	public function select_product_by_subid($subcatid){

		$this->db->select('*');
		$this->db->from('product'); 
		$this->db->join('category','category.cat_id = product.prod_catid');
		//$this->db->join('tbl_image','tbl_image.img_prodid = product.prod_id');
		$this->db->where('prod_subcatid', $subcatid);
		$this->db->where('is_approved',1);
		$query = $this->db->get(); 
		$result =  $query->result();
		return $result;
	}

	public function get_search_product($KeyWord){

		$query = $this->db->select('*')->from('product')->join('category','category.cat_id=prod_catid')->like('prod_name', $KeyWord)->get()->result();
		return $query;
	}

//------------------------ product end---------------------------//

//======================== Order Summary ============================//

	public function manage_order(){

		$query = $this->db->select('*')->from('tbl_order')->where('order_status','pending')->order_by('order_id', 'desc')->get()->result();
				 
		return $query;
	}
	
	public function select_order_info_by_id($order_id){

		$query = $this->db->select('*')->from('tbl_order')->where('order_id',$order_id)->get()->row();
				 
		return $query;

	}

	public function select_customer_info_by_id($customer_id){

		$query = $this->db->select('*')->from('tbl_customer')->where('customer_id',$customer_id)->get()->row();
				 
		return $query;

	}

	public function select_shipping_info_by_id($shipping_id){

		$query = $this->db->select('*')->from('tbl_shipping')->where('shipping_id',$shipping_id)->get()->row();
				 
		return $query;

	}

	public function select_order_details_info_by_id($order_id){

		$query = $this->db->select('*')->from('tbl_order_details')->where('order_id',$order_id)->get()->result();
		return $query;

	}

    public function select_order_by_id($order_id){
        $query = $this->db->select('*')->from('tbl_order')->where('order_id',$order_id)->get()->result();
        return $query;
    }
	public function select_all_product_info(){

		$query = $this->db->select('*')->from('product')->limit(3)->get()->result();
				 
		return $query;
	}

	public function select_all_order(){

		$query = $this->db->select('*')->from('tbl_order')->get()->result();
		
		return $query;
	}

	public function view_delivered_product(){

		$query = $this->db->select('*')->from('tbl_order')->where('order_status','delivered')->get()->result();
		
		return $query;
	}

	public function delivered_product($order_id){

		$this->db->set('order_status','delivered');
		$this->db->where('order_id',$order_id);
		$this->db->update('tbl_order');
	}

	public function view_cancle_order(){

		$query = $this->db->select('*')->from('tbl_order')->where('order_status','cancle')->get()->result();
		
		return $query;
	}

	public function cancle_order($order_id){

		$this->db->set('order_status','cancle');
		$this->db->where('order_id',$order_id);
		$this->db->update('tbl_order');
	}

//-=========================== Order Summary End =========================-//

	public function select_all_division(){

		$query = $this->db->select('*')->from('shipping_cost')->get()->result();
		return $query;
	}

//======================== merchent acc =====================//

	public function activeMerchant($mrcID){
		$this->db->set('status',1);
		$this->db->where('merchant_id',$mrcID);
		return $this->db->update('tbl_merchant');
	}

	public function inactiveMerchant($mrcID){
		$this->db->set('status',0);
		$this->db->where('merchant_id',$mrcID);
		return $this->db->update('tbl_merchant');
	}

}//Admin_model

?>