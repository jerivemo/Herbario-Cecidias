<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @author http://www.webtuts.in
 */
class Upload extends CI_Controller {

    private $errorMSG="";
    private $successMSG="";

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model('file_model', 'file');
    }

    private function handle_error($err) {
        if ($this->errorMSG==""){
            $this->errorMSG .= $err;
        }else{
            $this->errorMSG .=  ", " . $err ;
        }

    }

    private function handle_success($succ) {
        if ($this->successMSG==""){
            $this->successMSG .= $succ;
        }else{
            $this->successMSG .= ", " . $succ ;
        }
    }

    function index($idCollection) {
  $this->load->helper('url');
  $this->load->helper('file');
  $this->load->helper('form');
  $this->load->helper('text');

  //if ($this->input->post('file_upload')) {
            //file upload destination
            $dir_path = './images/';
            $config['upload_path'] = $dir_path;
            $config['allowed_types'] = 'gif|jpg|png';


            //upload file
            $i = 0;
            $files = array();
            $names = array();
            $error = false;
            $is_file_error = FALSE;
            $count=$_FILES['upload_file1'];
            if ($_FILES['upload_file1']['size'] <= 0) {
                $this->handle_error('No File Selected');
                $error = true;
            } else {

                foreach ($_FILES as $key => $value) {
                    if (!empty($value['name'])) {
                        $this->load->library('upload', $config);
                        $file = $dir_path . $value['name'];
                        if (file_exists($file))
                        {
                            $this->handle_error("File:".$value['name']." exists");
                            $is_file_error = TRUE;
                             $error = true;
                        }
                        else if (!$this->upload->do_upload($key)) {
                            $this->handle_error($this->upload->display_errors());
                            $is_file_error = TRUE;
                            $error = true;
                        } else {
                            $files[$i] = $this->upload->data();
                            ++$i;
                        }
                    }
                }
            }

            // There were errors, we have to delete the uploaded files
            if ($is_file_error && $files) {
                for ($i = 0; $i < count($files); $i++) {
                    $file = $dir_path . $files[$i]['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            }

            if (!$is_file_error && $files) {
                $resp = $this->file->save_files_info($files,$idCollection);
                if ($resp === TRUE) {
                    $this->handle_success('File(s) successfully uploaded.');
                } else {
                    for ($i = 0; $i < count($files); $i++) {
                        $file = $dir_path . $files[$i]['file_name'];
                        if (file_exists($file)) {
                            unlink($file);
                        }
                    }
                    $this->handle_error('Error while saving file(s) info to Database.');
                    $error = true;
                }
            }
        //}
        //$data['result'] = $error;
        //$data['errors'] = $this->errorMSG;
        //$data['success'] = $this->successMSG;
        $result = array('result'=>$error,'errors'=>$this->errorMSG,'success'=>$this->successMSG);
        $json = json_encode($result);
        echo $json;
    }

}

?>