<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends CI_Controller {

    /**
     * Country Controller
     */
    public function index()
    {
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
        $this->load->helper('url');
        $this->load->model('country_model');

        $data['datos']=$this->country_model->getCountries();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/locations/countries/view',$data);
        $this->load->view('admin/locations/countries/footer');

    }

    //create a new Country
    function createCountry($name){

           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('country_model');
                    $result=$this->country_model->addCountry($name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the Country Name.
    public function editCountry($id,$name)
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('country_model');
                    $result=$this->country_model->editCountry($id,$name);
                    echo $result;
            }

    }


    //Delete the Country Name.
    public function deleteCountry($id)
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('country_model');
                    $result=$this->country_model->deleteCountry($id);
                    echo $result;
            }

    }


}

/* End of file Country.php */
/* Location: ./application/controllers/Country.php */
?>
