<?php
class OrganimsGender_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     /**
      * [addGender Add a new record in Gender]
      * @param [String] $nameGender [Gender Name]
      */
    public function addGender($idFamily, $nameGender)
    {

      $nameGender = str_replace("%20"," ",$nameGender);
      $data = array('idFamily' => $idFamily,'genderName' => $nameGender);
      $result = $this->db->insert('organismgender', $data);
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
    * [getGenders Get all records from Gender]
    * @return [Array-False] [Return a array with all Genders register in the data base]
    */
   function getGenders(){
      $query = $this->db->get('organismgender');
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

/**
 * [getGendersJoinFamilies Get Inner Join Gender, Families]
 * @return [Table] [Inner Join Gender, Gender]
 */
   function getGendersJoinFamilies(){

    $query =  $this->db->query('select g.idGender, g.idFamily, g.genderName ,f.familyName FROM organismgender as g inner join organismfamily as f on g.idGender=f.idGender');

      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }


   /**
    * [editGender description]
    * @param  [int] $id   [Gender ID]
    * @param  [int] $idGender [description]
    * @param  [String] $name [Gender name]
    * @return [Boolean]       [Edit result]
    */
   function editGender($id,$idFamily,$name){
    $name = str_replace("%20"," ",$name);
    $data = array('idFamily' => $idFamily,'genderName' => $name);
    $this->db->where('idGender', $id);
    $result = $this->db->update('organismgender', $data);
    if($result)
      {
        return true;
      }else
      {
        return false;
      }
    }

  /**
   * [deleteGender Delete a record from Gender]
   * @param  [id] $id [Gender ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteGender($id){
    $this->db->where('idGender', $id);
    $result = $this->db->delete('organismgender');
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