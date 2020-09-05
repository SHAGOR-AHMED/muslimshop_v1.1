<?php
class Cart_model extends CI_model{

	public function __construct(){
        parent::__construct();
    }

	public function cart_details($Prod_id){

        $row = $this->db->select('*')->from('product')->where('prod_id',$Prod_id)->get()->row();
        return $row;
    }


}//Cart_model

?>