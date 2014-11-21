<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends CI_Controller {

    /**
     * City Controller
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
        $data['countries']=$this->country_model->getCountries();
        $this->load->model('city_model');
        $data['datos']=$this->city_model->getCitiesJoinStates();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/locations/cities/view',$data);
        $this->load->view('admin/locations/cities/footer');
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
        $data['countries']=$this->country_model->getCountries();
        $this->load->model('city_model');
        $data['datos']=$this->city_model->getCitiesJoinStates();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/locations/cities/view',$data);
        $this->load->view('admin/locations/cities/footer');
    }

    //create a new City
    function createCity(){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idState = $this->input->post('idState');
                    $name = $this->input->post('name');
                    $this->load->model('city_model');
                    $result=$this->city_model->addCity($idState,$name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the City Name.
 function editCity()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $idState = $this->input->post('idState');
                    $name = $this->input->post('name');
                    $this->load->model('city_model');
                    $result=$this->city_model->editCity($id,$idState,$name);
                    echo $result;
            }

    }


    //Delete the City Name.
    public function deleteCity()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('idCity');
                    $this->load->model('city_model');
                    $result=$this->city_model->deleteCity($id);
                    echo $result;
            }

    }

            //Get Cities by idState
    public function getcities()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {   $idState = $this->input->post('idState');
                    $this->load->model('city_model');
                    $result=$this->city_model->getCities($idState);
                    $json = json_encode($result);
                    echo $json;
            }

    }


}

/* End of file City.php */
/* Location: ./application/controllers/City.php */
?>
