<?php
class Usuario_model extends  CI_Model {

      function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
   
     public function addCountry()
    {
        if($this->db->query("CALL insertCountry('El Salvador')"))
        {
            echo 'listo';
        }else{
            show_error('Error!');
        }
    }
}
?>