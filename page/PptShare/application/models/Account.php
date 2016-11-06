<?php
class Account extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function creat($data)
    {
        if($data['flag']) {
            $array = array('email' => $data['email']);
            $query = $this->db->where($array)->get('comments');
            return $query->result();
        }else {
            $array = array('email' => $data['email'],'password' =>$data['password']);
            $query = $this->db->insert('comments',$array);
        }
    }

    public function login($data)
    {
        $array = array('email' => $data['email'] , 'password' => $data['password']);
        $account = $this->db->where($array)->get('comments');

        return $account->result();
    }

    public function getCompetence($email) {
        return $this->db->where('email',$email)->get('comments')->row('Competence');
    }

}