<?php
class Family_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     /**
      * [addFamily Add a new record in family]
      * @param [String] $nameFamily [family Name]
      */
    public function addFamily($nameFamily)
    {

      $nameFamily = str_replace("%20"," ",$nameFamily);
      $data = array( 'familyName' => $nameFamily);
      $result = $this->db->insert('family', $data);
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
    * [getfamilies Get all records from family]
    * @return [Array-False] [Return a array with all families register in the data base]
    */
   function getFamilies(){
      $query = $this->db->get('family');
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

   function getInfoFamily($idFamily){
      $query =  $this->db->query("select familyName FROM family where idFamily='".$idFamily."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

   /**
    * [editFamily Edit information of a family]
    * @param  [int] $id   [family ID]
    * @param  [String] $name [family name]
    * @return [Boolean]       [Edit result]
    */
   function editFamily($id,$name){
    $name = str_replace("%20"," ",$name);
    $data = array('familyName' => $name);
    $this->db->where('idFamily', $id);
    $result = $this->db->update('family', $data);
    if($result)
      {
        return true;
      }else
      {
        return false;
      }
    }

  /**
   * [deleteFamily Delete a record from family]
   * @param  [id] $id [family ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteFamily($id){
    $this->db->where('idFamily', $id);
    $result = $this->db->delete('family');
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