<?php
class OrganismFamily_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     /**
      * [addFamily Add a new record in Family]
      * @param [String] $nameFamily [Family Name]
      */
    public function addFamily($idOrder, $nameFamily)
    {
      $nameFamily = str_replace("%20"," ",$nameFamily);
      $this->db->select('idFamily');
      $this->db->where('idOrder', $idOrder);
      $this->db->where('familyName', $nameFamily);
      $query = $this->db->get('organismfamily');
      if($query->num_rows() > 0){
        return array('result' => false);
      }else{
          $data = array('idOrder' => $idOrder,'familyName' => $nameFamily);
          $result = $this->db->insert('organismfamily', $data);
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
    * [getFamilies Get all records from Family]
    * @return [Array-False] [Return a array with all Familys register in the data base]
    */
   function getFamilies($idOrder){
      $query =  $this->db->query("select idFamily, familyName from organismfamily where idOrder='".$idOrder."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

/**
 * [getFamilysJoinFamilys Get Inner Join Family, Family]
 * @return [Table] [Inner Join Family, Family]
 */
   function getFamiliesJoinOrders(){

    $query =  $this->db->query('select f.idFamily, f.idOrder, f.familyName ,o.orderName FROM organismfamily as f inner join organismorder as o on f.idOrder=o.idOrder');
      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }


   /**
    * [editFamily description]
    * @param  [int] $id   [Family ID]
    * @param  [int] $idFamily [description]
    * @param  [String] $name [Family name]
    * @return [Boolean]       [Edit result]
    */
   function editFamily($id,$idOrder,$name){
      $name = str_replace("%20"," ",$name);
      $this->db->select('idFamily');
      $this->db->where('idOrder', $idOrder);
      $this->db->where('familyName', $name);
      $query = $this->db->get('organismfamily');
      if($query->num_rows() > 0){
        return false;
      }else{
          $data = array('idOrder' => $idOrder,'familyName' => $name);
          $this->db->where('idFamily', $id);
          $result = $this->db->update('organismfamily', $data);
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
   * [deleteFamily Delete a record from Family]
   * @param  [id] $id [Family ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteFamily($id){
    $this->db->where('idFamily', $id);
    $result = $this->db->delete('organismfamily');
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