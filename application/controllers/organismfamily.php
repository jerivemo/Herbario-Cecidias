<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrganismFamily extends CI_Controller {

    /**
     * organismfamily Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('organismorder_model');
        $data['orders']=$this->organismorder_model->getOrders();
        $this->load->model('organismfamily_model');
        $data['datos']=$this->organismfamily_model->getfamiliesJoinOrders();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/insects/families/view',$data);
        $this->load->view('admin/taxonomies/insects/families/footer');
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('organismorder_model');
        $data['orders']=$this->organismorder_model->getOrders();
        $this->load->model('organismfamily_model');
        $data['datos']=$this->organismfamily_model->getfamiliesJoinOrders();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/insects/families/view',$data);
        $this->load->view('admin/taxonomies/insects/families/footer');

    }

    //create a new organismfamily
    function createFamily(){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idOrder=$this->input->post('idOrder');
                    $name = $this->input->post('name');
                    $this->load->model('organismfamily_model');
                    $result=$this->organismfamily_model->addFamily($idOrder,$name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the organismfamily Name.
    public function editFamily()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id=$this->input->post('id');
                    $idOrder=$this->input->post('idOrder');
                    $name = $this->input->post('name');
                    $this->load->model('organismfamily_model');
                    $result=$this->organismfamily_model->editFamily($id,$idOrder,$name);
                    echo $result;
            }

    }

        //Get organismfamilies by id organismorder.
    public function getFamilies()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {   $idOrder = $this->input->post('idOrder');
                    $this->load->model('organismfamily_model');
                    $result=$this->organismfamily_model->getFamilies($idOrder);
                     $json = json_encode($result);
                    echo $json;
            }

    }


    //Delete the organismfamily Name.
    public function deleteFamily()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id=$this->input->post('id');
                    $this->load->model('organismfamily_model');
                    $result=$this->organismfamily_model->deleteFamily($id);
                    echo $result;
            }

    }


}

/* End of file organismfamily.php */
/* Location: ./application/controllers/organismfamily.php */
?>
