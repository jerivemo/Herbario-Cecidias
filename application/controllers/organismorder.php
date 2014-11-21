<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrganismOrder extends CI_Controller {

    /**
     * OrganismOrder Controller
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
        $this->load->model('organismorder_model');
        $data['datos']=$this->organismorder_model->getOrders();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/insects/orders/view',$data);
        $this->load->view('admin/taxonomies/insects/orders/footer');
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
        $this->load->model('organismorder_model');

        $data['datos']=$this->organismorder_model->getOrders();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/taxonomies/insects/orders/view',$data);
        $this->load->view('admin/taxonomies/insects/orders/footer');
    }

    //create a new OrganismOrder
    function createOrganismOrder(){

           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $name = $this->input->post('name');
                    $this->load->model('organismorder_model');
                    $result=$this->organismorder_model->addOrder($name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the OrganismOrder Name.
    public function editOrganismOrder()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $name = $this->input->post('name');
                    $this->load->model('organismorder_model');
                    $result=$this->organismorder_model->editOrder($id,$name);
                    echo $result;
            }

    }


    //Delete the OrganismOrder Name.
    public function deleteOrganismOrder()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $this->load->model('organismorder_model');
                    $result=$this->organismorder_model->deleteOrder($id);
                    echo $result;
            }

    }

 //Get states by id orders.
    public function getOrders()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $this->load->model('organismorder_model');
                    $result=$this->organismorder_model->getOrders();
                     $json = json_encode($result);
                    echo $json;
            }

    }


}

/* End of file OrganismOrder.php */
/* Location: ./application/controllers/OrganismOrder.php */
?>
