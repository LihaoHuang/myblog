<?php
class Upload extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function uploadfile($data)
    {
        $juage = $this->db->where('filename',$data['filename'])->get('products');
        if($juage == null){
            $this->db->insert('products',$data);
        }
        else{
            $this->db->where('filename',$data['filename'])->update('products',$data);
        }
    }
}