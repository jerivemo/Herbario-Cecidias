<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends CI_Controller {

    /**
     * Country Controller
     */
    public function index()
    {
        if(!$this->session->userdata('logged_in'))
        {
            //If no session, redirect to login page
            $this->load->helper('url');
            redirect('/login','refresh');
        }
        $this->load->helper('url');
        $this->load->model('country_model');

        $data['datos']=$this->country_model->getCountries();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/locations/countries/view',$data);
        $this->load->view('admin/locations/countries/footer');
    }

    public function view()
    {
        if(!$this->session->userdata('logged_in'))
        {
            //If no session, redirect to login page
            $this->load->helper('url');
            redirect('/login','refresh');
        }
        $this->load->helper('url');
        $this->load->model('country_model');

        $data['datos']=$this->country_model->getCountries();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/locations/countries/view',$data);
        $this->load->view('admin/locations/countries/footer');

    }

    //create a new Country
    function createCountry(){

           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $name = $this->input->post('name');
                    $this->load->model('country_model');
                    $result=$this->country_model->addCountry($name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the Country Name.
    public function editCountry()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $name = $this->input->post('name');
                    $this->load->model('country_model');
                    $result=$this->country_model->editCountry($id,$name);
                    echo $result;
            }

    }


    //Delete the Country Name.
    public function deleteCountry()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $this->load->model('country_model');
                    $result=$this->country_model->deleteCountry($id);
                    echo $result;
            }

    }

    public function getCountries()
    {
        if(!$this->input->is_ajax_request()){
            show_404();
        }else{
            $this->load->model('country_model');
            $result= $this->country_model->getCountries();
            echo json_encode ($result);
        }
    }


}

/* End of file Country.php */
/* Location: ./application/controllers/Country.php */
?>
