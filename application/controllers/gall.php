<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gall extends CI_Controller {



    /**
     * Galls Controller
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
        $this->load->model('gall_model');
        //$links['links'] = $arrayName = array('tools/js/plugins/dataTables/jquery.dataTables.js','tools/js/plugins/dataTables/dataTables.bootstrap.js','tools/js/admin/gall.js');
        $data['datos']=$this->gall_model->getGalls();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/galls/view',$data);
        $this->load->view('admin/galls/footer');

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
        $this->load->model('gall_model');

        $data['datos']=$this->gall_model->getGalls();

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/galls/view',$data);
        $this->load->view('admin/galls/footer');

    }

    //create a new gall
    function createGall(){

           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $name = $this->input->post('name');
                    $this->load->model('gall_model');
                    $result=$this->gall_model->addGall($name);
                    $json = json_encode($result);
                    echo $json;
            }
    }

    //Edit the Gall Name.
    public function editGall()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $name = $this->input->post('name');
                    $this->load->model('gall_model');
                    $result=$this->gall_model->editGall($id,$name);
                    echo $result;
            }

    }


    //Delete the Gall Name.
    public function deleteGall()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id = $this->input->post('id');
                    $this->load->model('gall_model');
                    $result=$this->gall_model->deleteGall($id);
                    echo $result;
            }

    }


}

/* End of file gall.php */
/* Location: ./application/controllers/gall.php */
?>
