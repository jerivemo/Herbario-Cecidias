<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Family extends CI_Controller {

    /**
     * Family Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('family_model');

        $data['datos']=$this->family_model->getFamilies();

        $this->load->view('admin/taxonomies/plants/families/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/plants/families/view',$data);
        $this->load->view('admin/taxonomies/plants/families/footer');
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('family_model');

        $data['datos']=$this->family_model->getFamilies();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/plants/families/view',$data);
        $this->load->view('admin/taxonomies/plants/families/footer');

    }

    //create a new Family
    function createFamily(){

           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $name = $this->input->post('name');
                    $this->load->model('family_model');
                    $result=$this->family_model->addFamily($name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the Family Name.
    public function editFamily()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $name = $this->input->post('name');
                    $this->load->model('family_model');
                    $result=$this->family_model->editFamily($id,$name);
                    echo $result;
            }

    }


    //Delete the Family Name.
    public function deleteFamily()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $this->load->model('family_model');
                    $result=$this->family_model->deleteFamily($id);
                    echo $result;
            }

    }

     public function getFamilies()
    {
        if(!$this->input->is_ajax_request()){
            show_404();
        }else{
            $this->load->model('family_model');
            $result= $this->family_model->getFamilies();
            echo json_encode ($result);
        }
    }


}

/* End of file Family.php */
/* Location: ./application/controllers/Family.php */
?>
