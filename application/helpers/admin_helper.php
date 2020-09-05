<?php

function getAllcategory(){
	
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('category')->get()->result();

    foreach ($data as $d) {
        echo '<option value="' . $d->cat_id . '" />  ' . $d->category . '<br />';
    }
}

function getAllSubcatByCatId($cat_id){
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('subcategory')->where('subcat_catid', $cat_id)->get()->result();
    $out = '';
    foreach ($data as $dd) {
        $out .= '<option value="' . $dd->subcat_id . '" >  ' . $dd->subcategory . '</option><br />';
    }
    echo empty($out) ? 'Not Set' : $out;
	
}

function getAllCountryList(){
    
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('countries')->get()->result();

    foreach ($data as $d) {
        echo '<option value="' . $d->id . '" />  ' . $d->con_name . '<br />';
    }
}

function getAllStatesByCountryId($country_id)
{
    $ci =& get_instance();
    $ci->load->database();
    $data = $ci->db->select('*')->from('states')->where('country_id', $country_id)->get()->result();
    $out = '';
    foreach ($data as $dd) {
        $out .= '<option value="' . $dd->id . '" >  ' . $dd->st_name . '</option><br />';
    }
    echo empty($out) ? 'Not Set' : $out;
}