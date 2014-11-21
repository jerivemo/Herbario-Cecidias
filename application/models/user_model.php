<?php
class User_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

   /**
    * [getPersons Get all records from Person]
    * @return [Array-False] [Return a array with all Persons register in the data base]
    */
   function getUser($nameUser,$password){

      $this->db->select('completeName');
      $this->db->select('userName');
      $this->db->select('password');
      $this->db->where('userName', $nameUser);
      $this->db->where('password', $password);
      $query = $this->db->get('user');
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }




}
?>