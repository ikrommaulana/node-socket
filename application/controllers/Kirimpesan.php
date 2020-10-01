<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kirimpesan extends CI_Controller {
    public function index(){
        $data = array();
        $allmsgs = $this->db->select('*')->from('tbl_msg')->get()->result_array();
        $data['allMsgs'] = $allmsgs;
        $this->load->view('message2',$data);
    }
}