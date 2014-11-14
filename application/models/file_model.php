<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @author http://www.webtuts.in
 */
class File_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //table name
    private $file = 'images';   // files

    function save_files_info($files,$idCollection) {
        //start db traction
        $this->db->trans_start();
        //file data
        $file_data = array();
        foreach ($files as $file) {
            $file_data[] = array(
                'idCollection' => $idCollection,
                'name' => $file['file_name']);
        }
        //insert file data
        $this->db->insert_batch($this->file, $file_data);
        //complete the transaction
        $this->db->trans_complete();
        //check transaction status
        if ($this->db->trans_status() === FALSE) {
            foreach ($files as $file) {
                $file_path = base_url()."./images/".$file['file_name'];
                //delete the file from destination
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            //rollback transaction
            $this->db->trans_rollback();
            return FALSE;
        } else {
            //commit the transaction
            $this->db->trans_commit();
            return TRUE;
        }
    }

}
?>