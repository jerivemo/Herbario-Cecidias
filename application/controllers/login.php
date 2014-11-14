<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Country Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('authentication/login');
    }

}
?>