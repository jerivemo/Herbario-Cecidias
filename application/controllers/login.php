<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Country Controller
     */
    public function index(){
        $this->load->helper('url');
        if ($this->input->post('userName')){
        $username = $this->input->post('userName');
        $password = $this->input->post('password');

        $this->load->model('user_model');
        $info['datos']=$this->user_model->getUser($username,$password);
        if($info['datos']!=false && $info['datos'][0]->userName==$username && $info['datos'][0]->password==$password){
            $sess_array = array('username' => 'Administrador');
            $this->session->set_userdata('logged_in', $sess_array);
            redirect('/collection/view','refresh');

        }else{
            $data['error']= array('error' => true,'msgError'=> "User or password incorrect", 'user'=>$username, 'password'=>$password);
            $this->load->view('authentication/login',$data);
        }


   }else{
        $this->load->helper('url');
        $this->load->view('authentication/login');
    }
}



public function logout()
 {
    $this->load->helper('url');
    $this->session->unset_userdata('logged_in');
    redirect('/login', 'refresh');
 }

}
?>