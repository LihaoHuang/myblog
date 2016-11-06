<?php
class Rows extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getMember($filename) {
        return $this->db->where('filename',$filename)->select('crew')->get('products')->row('crew');
    }

    public function deleteRows($filename) {
        $this->db->where('filename',$filename)->delete('products');
    }
}