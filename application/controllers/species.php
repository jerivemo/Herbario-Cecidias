<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Species extends CI_Controller {

    /**
     * Species Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('family_model');
        $data['families']=$this->family_model->getFamilies();
        $this->load->model('species_model');
        $data['datos']=$this->species_model->getSpeciesJoinGenders();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/plants/species/view',$data);
        $this->load->view('admin/taxonomies/plants/species/footer');
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('family_model');
        $data['families']=$this->family_model->getFamilies();
        $this->load->model('species_model');
        $data['datos']=$this->species_model->getSpeciesJoinGenders();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/plants/species/view',$data);
        $this->load->view('admin/taxonomies/plants/species/footer');
    }

    //create a new Species
    function createSpecies(){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idGender = $this->input->post('idGender');
                    $name = $this->input->post('name');
                    $this->load->model('species_model');
                    $result=$this->species_model->addSpecies($idGender,$name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the Species Name.
 function editSpecies()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $idGender = $this->input->post('idGender');
                    $name = $this->input->post('name');
                    $this->load->model('species_model');
                    $result=$this->species_model->editSpecies($id,$idGender,$name);
                    echo $result;
            }

    }


    //Delete the Species Name.
    public function deleteSpecies()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('idSpecies');
                    $this->load->model('species_model');
                    $result=$this->species_model->deleteSpecies($id);
                    echo $result;
            }

    }

        //Get Species by idGender
    public function getSpecies()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {   $idGender = $this->input->post('idGender');
                    $this->load->model('species_model');
                    $result=$this->species_model->getSpecies($idGender);
                    $json = json_encode($result);
                    echo $json;
            }

    }


}

/* End of file Species.php */
/* Location: ./application/controllers/Species.php */
?>
