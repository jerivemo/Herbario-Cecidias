<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrganismGender extends CI_Controller {

    /**
     * Gender Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('organismorder_model');
        $data['orders']=$this->organismorder_model->getOrders();
        $this->load->model('organismgender_model');
        $data['datos']=$this->organismgender_model->getGendersJoinFamilies();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/insects/genders/view',$data);
        $this->load->view('admin/taxonomies/insects/genders/footer');
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('organismorder_model');
        $data['orders']=$this->organismorder_model->getOrders();
        $this->load->model('organismgender_model');
        $data['datos']=$this->organismgender_model->getGendersJoinFamilies();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/insects/genders/view',$data);
        $this->load->view('admin/taxonomies/insects/genders/footer');
    }

    //create a new Gender
    function createGender(){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idFamily = $this->input->post('idFamily');
                    $name = $this->input->post('name');
                    $this->load->model('organismgender_model');
                    $result=$this->organismgender_model->addGender($idFamily,$name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the Gender Name.
 function editGender()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $idFamily = $this->input->post('idFamily');
                    $name = $this->input->post('name');
                    $this->load->model('organismgender_model');
                    $result=$this->organismgender_model->editGender($id,$idFamily,$name);
                    echo $result;
            }

    }


    //Delete the Gender Name.
    public function deleteGender()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('idGender');
                    $this->load->model('organismgender_model');
                    $result=$this->organismgender_model->deleteGender($id);
                    echo $result;
            }

    }

    //Get organismGenders by id organismFamily.
    public function getGenders()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {   $idFamily = $this->input->post('idFamily');
                    $this->load->model('organismgender_model');
                    $result=$this->organismgender_model->getGenders($idFamily);
                     $json = json_encode($result);
                    echo $json;
            }

    }


}

/* End of file Gender.php */
/* Location: ./application/controllers/Gender.php */
?>
