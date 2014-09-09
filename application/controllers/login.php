<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Login Controller
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('authentication/login');
		
	}

		public function main()
	{
		$this->load->helper('url');
		//$this->load->model('usuario_model');
		//$this->usuario_model->inserta();
		$this->load->view('admin/mainpage');

	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */