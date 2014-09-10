<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends CI_Controller {

    /**
     * Galls Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('country_model');

        $data['datos']=$this->country_model->getCountries();

        $this->load->view('admin/country/head');
        $this->load->view('admin/header');
        $this->load->view('admin/country/view',$data);
        $this->load->view('admin/country/footer');
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('country_model');

        $data['datos']=$this->country_model->getCountries();

        $this->load->view('admin/locations/countries/head');
        $this->load->view('admin/header');
        $this->load->view('admin/locations/countries/view',$data);
        $this->load->view('admin/locations/countries/footer');

    }
   
    //create a new gall
    function createGall($name){ 
                     
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('gall_model');
                    $result=$this->gall_model->addGall($name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the Gall Name. 
    public function editGall($id,$name)
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('gall_model');
                    $result=$this->gall_model->editGall($id,$name);
                    echo $result;
            }

    }


    //Delete the Gall Name. 
    public function deleteGall($id)
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('gall_model');
                    $result=$this->gall_model->deleteGall($id);
                    echo $result;
            }

    }


}

/* End of file gall.php */
/* Location: ./application/controllers/gall.php */
?>
