<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('url');
        $this->load->model('Account');
        $this->load->model('Upload');
        $this->load->library('session');
    }

    public function view($page = 'login')
    {
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter",
        if($page === 'show') {
            $this->load->model('Rows');
            $this->load->helper('directory');
            $data['filenames'] = directory_map('PPT'); #檔名陣列送入
        }

        $this->load->view('templates/header',$data);
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer');
    }

    public function filedownload($name)
    {
        $this->load->helper('download');
        $data = file_get_contents("../PPT/".$name);
        force_download($name,$data,TRUE);
    }

    public function file_upload()
    {
        $config = array(
                'upload_path' => './PPT/',
                'allowed_types' => 'ppt|pptx',
                'overwrite' => TRUE
            );

        // $config['file_name']     = $fileupload; // $this->$filename

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('fileupload')){
            // 顯示上傳錯誤
               show_error($this->upload->display_errors());
        }
        else {
            // 若無錯誤，則上傳檔案
            $file = $this->upload->data('fileupload');
            $aa=$this->upload->data();
            redirect('../show');
        }
    }

    public function uploadRecord(){
        $crew = $this->input->post('crew');
        $filename = $this->input->post('filename');

        $uploadmassage = array(
            'crew' => $crew,
            'filename' =>$filename
        );

        $this->Upload->uploadfile($uploadmassage);
    }

    public function creat()
    {
        // $Newname = $_POST['Newname'];

        $Newpass = $_POST['Newpassword'];
        $Newemail = $_POST['Newemail'];

        if( (strlen($Newpass) < 7) || (strlen($Newemail) < 22) ){
            echo '<script type="text/javascript">';
            echo 'alert("帳號(不含信箱)、密碼長度至少7碼");';
            echo 'location.href="'.base_url('index.php/login').'"';
            echo '</script>';
        }

        $array = array('email' => $Newemail , 'password' => $Newpass,'flag' =>TRUE);

        if( $this->Account->creat($array) ){
            echo '<script type="text/javascript">';
            echo 'alert("此帳號已存在");';
            echo 'location.href="'.base_url('index.php/login').'"';
            echo '</script>';
        }else
        {
            $array['flag'] = FALSE;
        }

        if (empty($Newpass)  || empty($Newemail) )
        {
            echo '<script type="text/javascript">';
            echo 'alert("欄位皆為必填");';
            echo 'location.href="'.base_url('index.php/login').'"';
            echo '</script>';
        }else if(preg_match("/^([^@\s]+)@gm.nfu.edu.tw$/", $Newemail) )
        {

            $this->Account->creat($array);
            echo '<script type="text/javascript">';
            echo 'alert("註冊成功!!");';
            echo 'location.href="'.base_url('index.php/login').'"';
            echo '</script>';
        }else
        {
            echo '<script type="text/javascript">';
            echo 'alert("信箱格式不對");';
            echo 'location.href="'.base_url('index.php/login').'"';
            echo '</script>';
        }

    }

    // unlink('path')為PHP原生函數，CI的delete_files('path')就是沒反應，懷疑是其在判斷中發生中斷。
    public function deleteFile($filename) {
        $this->load->model('Rows');
        $this->load->helper('file');
        $this->Rows->deleteRows($filename);
        // 要使用主機絕對路徑。
        unlink("D:\\xampp\htdocs\PptShare\PPT/".$filename);
        redirect('show');
    }

    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $array = array('email' => $email , 'password' => $password);
        $data['account'] = $this->Account->login($array);

        if(empty($email) || empty($password) || $data['account'] == null )
        {
            echo '<script type="text/javascript">';
            echo 'alert("帳號密碼錯誤!!");';
            echo 'location.href="'.base_url('index.php/login').'"';
            echo '</script>';
        }
        else {
            $_SESSION['email']=$email;
            redirect('../show');
        }

    }

    public function logout()
    {
        unset($_SESSION['email']);
        redirect('../login');
    }

}