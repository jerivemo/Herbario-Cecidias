<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State extends CI_Controller {

    /**
     * State Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('state_model');

        $data['datos']=$this->state_model->getStates();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/states/view',$data);
        $this->load->view('admin/states/footer');
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('country_model');
        $data['countries']=$this->country_model->getCountries();

        $this->load->model('state_model');
        $data['datos']=$this->state_model->getStatesJoin();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/locations/states/view',$data);
        $this->load->view('admin/locations/states/footer');

    }

    //create a new State
    function createState($name){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('state_model');
                    $result=$this->state_model->addState($name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the State Name.
    public function editState($id,$name)
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('state_model');
                    $result=$this->state_model->editState($id,$name);
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
