<?php
class State_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
     /**
      * [addState Add a new record in State]
      * @param [String] $nameState [State Name]
      */
    public function addState($idCountry, $nameState)
    {
      
      $nameState = str_replace("%20"," ",$nameState);
      $data = array('idCountry' => $idCountry,'nameState' => $nameState);
      $result = $this->db->insert('state', $data); 
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
    * [getStates Get all records from State]
    * @return [Array-False] [Return a array with all States register in the data base]
    */
   function getStates(){
      $query = $this->db->get('state');
      if($query->num_rows() > 0){    
         return $query->result();
      }else
      {
         return false;
       }
   }

   /**
    * [editState Edit information of a State]
    * @param  [int] $id   [State ID]
    * @param  [String] $name [State name]
    * @return [Boolean]       [Edit result]
    */
   function editState($id,$idCountry,$name){
    $name = str_replace("%20"," ",$name);
    $data = array('idCountry' => $idCountry,'nameState' => $nameState);
    $this->db->where('idState', $id);
    $result = $this->db->update('state', $data);
    if($result)
      {
        return true;
      }else
      {
        return false;
      }
    }

  /**
   * [deleteState Delete a record from State]
   * @param  [id] $id [State ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteState($id){
    $this->db->where('idState', $id);
    $result = $this->db->delete('state');  
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