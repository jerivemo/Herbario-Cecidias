<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State extends CI_Controller {

    /**
     * State Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('country_model');
        $data['countries']=$this->country_model->getCountries();
        $this->load->model('state_model');
        $data['datos']=$this->state_model->getStatesJoinCountries();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/locations/states/view',$data);
        $this->load->view('admin/locations/states/footer');
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('country_model');
        $data['countries']=$this->country_model->getCountries();
        $this->load->model('state_model');
        $data['datos']=$this->state_model->getStatesJoinCountries();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/locations/states/view',$data);
        $this->load->view('admin/locations/states/footer');

    }

    //create a new State
    function createState($idCountry,$name){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('state_model');
                    $result=$this->state_model->addState($idCountry,$name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the State Name.
    public function editState($id,$idCountry,$name)
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('state_model');
                    $result=$this->state_model->editState($id,$idCountry,$name);
                    echo $result;
            }

    }

        //Edit the State Name.
    public function getStates()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {   $idCountry = $this->input->post('idCountry');
                    $this->load->model('state_model');
                    $result=$this->state_model->getStates($idCountry);
                    echo $result;
            }

    }


    //Delete the State Name.
    public function deleteState($id)
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('state_model');
                    $result=$this->state_model->deleteState($id);
                    echo $result;
            }

    }


}

/* End of file State.php */
/* Location: ./application/controllers/State.php */
?>
