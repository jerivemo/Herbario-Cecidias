<?php
class Gender_model extends  CI_Model {

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
      $this->db->select('idGender');
      $this->db->where('idFamily', $idFamily);
      $this->db->where('genderName', $nameGender);
      $query = $this->db->get('gender');
      if($query->num_rows() > 0){
        return array('result' => false);
      }else{
          $data = array('idFamily' => $idFamily,'genderName' => $nameGender);
          $result = $this->db->insert('gender', $data);
          if($result)
          {
            $id=$this->db->insert_id();
            return array('result'  => 'true', 'id' => $id);
          }else
          {
            return array('result' => false);
          }
      }
    }

   /**
    * [getGenders Get all records from Gender]
    * @return [Array-False] [Return a array with all Genders register in the data base]
    */
   function getGenders($idFamily){
      $query =  $this->db->query("select idGender, genderName from gender where idFamily='".$idFamily."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

   function getInfoGender($idGender){
      $query =  $this->db->query("select genderName FROM gender where idGender='".$idGender."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

/**
 * [getGendersJoinFamilys Get Inner Join Gender, Family]
 * @return [Table] [Inner Join Gender, Family]
 */
   function getGendersJoinFamilies(){

    $query =  $this->db->query('select g.idGender, g.idFamily, g.genderName ,f.familyName FROM gender as g inner join family as f on g.idFamily=f.idFamily');
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
    * @param  [int] $idFamily [description]
    * @param  [String] $name [Gender name]
    * @return [Boolean]       [Edit result]
    */
   function editGender($id,$idFamily,$name){
      $name = str_replace("%20"," ",$name);
      $this->db->select('idGender');
      $this->db->where('idFamily', $idFamily);
      $this->db->where('genderName', $name);
      $query = $this->db->get('gender');
      if($query->num_rows() > 0){
        return false;
      }else{
          $name = str_replace("%20"," ",$name);
          $data = array('idFamily' => $idFamily,'genderName' => $name);
          $this->db->where('idGender', $id);
          $result = $this->db->update('gender', $data);
          if($result)
            {
              return true;
            }else
            {
              return false;
            }
      }
    }

  /**
   * [deleteGender Delete a record from Gender]
   * @param  [id] $id [Gender ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteGender($id){
    $this->db->where('idGender', $id);
    $result = $this->db->delete('gender');
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