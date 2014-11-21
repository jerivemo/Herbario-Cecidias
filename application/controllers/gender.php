<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gender extends CI_Controller {

    /**
     * Gender Controller
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
        $this->load->model('family_model');
        $data['families']=$this->family_model->getfamilies();
        $this->load->model('gender_model');
        $data['datos']=$this->gender_model->getGendersJoinFamilies();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/plants/genders/view',$data);
        $this->load->view('admin/taxonomies/plants/genders/footer');
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
        $this->load->model('family_model');
        $data['families']=$this->family_model->getfamilies();
        $this->load->model('gender_model');
        $data['datos']=$this->gender_model->getGendersJoinFamilies();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/plants/genders/view',$data);
        $this->load->view('admin/taxonomies/plants/genders/footer');
    }

    //create a new Gender
    function createGender(){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idFamily=$this->input->post('idFamily');
                    $name=$this->input->post('name');
                    $this->load->model('gender_model');
                    $result=$this->gender_model->addGender($idFamily,$name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the Gender Name.
    public function editGender()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id=$this->input->post('id');
                    $idFamily=$this->input->post('idFamily');
                    $name=$this->input->post('name');
                    $this->load->model('gender_model');
                    $result=$this->gender_model->editGender($id,$idFamily,$name);
                    echo $result;
            }

    }

    //Get Genders by idFamily
    public function getGenders()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {   $idFamily = $this->input->post('idFamily');
                    $this->load->model('gender_model');
                    $result=$this->gender_model->getGenders($idFamily);
                    $json = json_encode($result);
                    echo $json;
            }

    }


    //Delete the Gender Name.
    public function deleteGender()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id=$this->input->post('idGender');
                    $this->load->model('gender_model');
                    $result=$this->gender_model->deleteGender($id);
                    echo $result;
            }
    }


}

/* End of file Gender.php */
/* Location: ./application/controllers/Gender.php */
?>
