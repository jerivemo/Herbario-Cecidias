<?php
class Person_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
     /**
      * [addPerson Add a new record in Person]
      * @param [String] $namePerson [Person Name]
      */
    public function addPerson($namePerson)
    {
      
      $namePerson = str_replace("%20"," ",$namePerson);
      $data = array( 'personName' => $namePerson);
      $result = $this->db->insert('person', $data); 
      if($result)
      {
        $id=$this->db->insert_id();
        return array('result'  => 'true', 'id' => $id);
      }else
      {
        return array('result' => false);
      }
    }

   /**
    * [getPersons Get all records from Person]
    * @return [Array-False] [Return a array with all Persons register in the data base]
    */
   function getPersons(){
      $query = $this->db->get('person');
      if($query->num_rows() > 0){    
         return $query->result();
      }else
      {
         return false;
       }
   }

   /**
    * [editPerson Edit information of a Person]
    * @param  [int] $id   [Person ID]
    * @param  [String] $name [Person name]
    * @return [Boolean]       [Edit result]
    */
   function editPerson($id,$name){
    $name = str_replace("%20"," ",$name);
    $data = array('personName' => $name);
    $this->db->where('idPerson', $id);
    $result = $this->db->update('person', $data);
    if($result)
      {
        return true;
      }else
      {
        return false;
      }
    }

  /**
   * [deletePerson Delete a record from Person]
   * @param  [id] $id [Person ID]
   * @return [Boolean]     [Delete result]
   */
   function deletePerson($id){
    $this->db->where('idPerson', $id);
    $result = $this->db->delete('person');  
    if($result)
      {
        return true;
      }else
      {
        return false;
      
      }
    }
}
?>