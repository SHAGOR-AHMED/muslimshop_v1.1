<?php
class Mailer_model extends CI_Model{

    private $from_address = "cloudnumber0707@gmail.com";
    private $admin_address = "shagor.ahmed374@gmail.com";


    function sendEmailToCustomer($data, $templateName){

        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($this->from_address, $data['subject']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mail_scripts/' . $templateName, $data, true);
        //print_r($body);exit;
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }

    
    public function sendEmailToAdmin($data, $templateName){

        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['to_address'], $data['subject']);
        $this->email->to($this->admin_address);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mail_scripts/' . $templateName, $data, true);
        //print_r($body);exit;
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }


}//Mailer_model

?>