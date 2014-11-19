<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person extends CI_Controller {

    /**
     * Person Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('person_model');

        $data['datos']=$this->person_model->getPersons();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/persons/view',$data);
        $this->load->view('admin/persons/footer');
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('person_model');

        $data['datos']=$this->person_model->getPersons();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/persons/view',$data);
        $this->load->view('admin/persons/footer');

    }

    //create a new Person
    function createPerson(){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $name = $this->input->post('name');
                    $this->load->model('person_model');
                    $result=$this->person_model->addPerson($name);
                    $json = json_encode($result);
                    echo $json;
            }
    }


    //Edit the Person Name.
    public function editPerson()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $name = $this->input->post('name');
                    $this->load->model('person_model');
                    $result=$this->person_model->editPerson($id,$name);
                    echo $result;
            }

    }


    //Delete the Person Name.
    public function deletePerson()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $this->load->model('person_model');
                    $result=$this->person_model->deletePerson($id);
                    echo $result;
            }

    }


}

/* End of file Person.php */
/* Location: ./application/controllers/Person.php */
?>
