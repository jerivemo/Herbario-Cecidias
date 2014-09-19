<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends CI_Controller {

    /**
     * City Controller
     */
    public function index()
    {
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
    function createCity($idState,$name){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('city_model');
                    $result=$this->city_model->addCity($idState,$name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the City Name.
 function editCity($id,$idState,$name)
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('city_model');
                    $result=$this->city_model->editCity($id,$idState,$name);
                    echo $result;
            }

    }


    //Delete the City Name.
    public function deleteCity($id)
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('city_model');
                    $result=$this->city_model->deleteCity($id);
                    echo $result;
            }

    }


}

/* End of file City.php */
/* Location: ./application/controllers/City.php */
?>
