<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index(){

		$this->load->view('admin/index');
	}

	public function admin_login(){

		$result=$this->Admin_model->admin_login();

		if($result){

			$data['id']=$result->id;
			$data['admin']=$result->username;
			$this->session->set_userdata($data);
			redirect('Super_admin');

		}else{

			$sdata=array();
			$sdata['exception']="Username and Password Invalid";
			$this->session->set_userdata($sdata);
			redirect('Admin');
		}
	}

//==================================== user ============================//

	public function get_users(){

		$data = array();
		$data['all_users'] = $this->Admin_model->get_all_users();
		$this->load->view('admin/users',$data);
	}

	public function add_user(){

		$data = array();
		$this->load->view('admin/add_user');
	}

	public function save_user(){

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[con_password]');
		$this->form_validation->set_rules('con_password', 'Confirm Password', 'trim|required');

		if($this->form_validation->run() == FALSE){
			
			$this->load->view('admin/add_user');
			return false;

		}else{

			$data['username'] = $this->input->post('username');
			$data['password'] = md5($this->input->post('password'));

			$result = $this->Admin_model->Insert_user($data);

			if($result){
	        	$sdata=array();
	        	$sdata['message']="User Added Successfully !";
	        	$this->session->set_userdata($sdata);
	        	redirect('Admin/add_user');
	        }else{
	        	$sdata=array();
	        	$sdata['message']="Failed to Add !";
	        	$this->session->set_userdata($sdata);
	        	redirect('Admin/add_user');
	        }
			
		}//if

	}//save_user

	public function Edit_user($id){

		$data = array();
		$data['result'] = $this->Admin_model->edit_user($id);
		$this->load->view('admin/edit_user',$data);
	}

	public function update_user(){

		$id = $this->input->post('id');
		$data['username'] = $this->input->post('username');

		$result = $this->Admin_model->updateUser_info($id,$data);

		if($result){
	        $sdata=array();
			$sdata["update"]="User Update Successfully";
			$this->session->set_userdata($sdata);
			redirect('Admin/get_users');
		}else{
			$sdata=array();
			$sdata["update"]="Failed to Update";
			$this->session->set_userdata($sdata);
			redirect('Admin/get_users');
		}

	}//update_user


	public function Delete_user($id){

		$result = $this->Admin_model->Delete_user($id);

		if($result){
			$sdata=array();
			$sdata["message"]="User Delete Successfully";
			$this->session->set_userdata($sdata);
			redirect('Admin/get_users');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Delete";
			$this->session->set_userdata($sdata);
			redirect('Admin/get_users');
		}
		
	}//Delete_user
	
//==================== password change & logout ======================//

    public function change_password(){

    	$this->load->view('admin/change_password');
    }

    public function update_password(){

    	$userID = $this->input->post('id');
    	$old_pass = md5($this->input->post('old_password'));
    	$new_pass = md5($this->input->post('new_password'));
    	$con_pass = md5($this->input->post('confirm_password'));

    	$pre_info = $this->db->select('*')->from('a_panel')->where('id', $userID)->get()->row();
    	$pre_pass = $pre_info->password;

  		if($pre_pass == $old_pass){

  			if($new_pass == $con_pass){

  				$result = $this->Admin_model->update_password($userID,$new_pass);

  				if($result){

  					$this->session->unset_userdata('id');
					$this->session->unset_userdata('admin');
					$sdata=array();
					$sdata["exception"]="Password Updated Successfully ! Login Again";
					$this->session->set_userdata($sdata);
					redirect('Admin/');

				}else{

					$sdata=array();
					$sdata["exception"]="Failed to Update Password";
					$this->session->set_userdata($sdata);
					redirect('Admin/change_password');
				}

  			}else{

  				$sdata=array();
				$sdata["exception"]="Password and Confirm Password doesn't Match.!!!";
				$this->session->set_userdata($sdata);
				redirect('Admin/change_password');

  			}

  		}else{

  			$sdata=array();
			$sdata["exception"]="Old Password doesn't Match.!!!";
			$this->session->set_userdata($sdata);
			redirect('Admin/change_password');

  		}

    }//update_password

	public function logout(){

		$this->session->unset_userdata('id');
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('full_name');
		$this->session->unset_userdata('user_type');
		redirect('Welcome');
	}


}//Admin

?>