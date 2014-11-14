<?php
class Country_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     /**
      * [addCountry Add a new record in country]
      * @param [String] $nameCountry [Country Name]
      */
    public function addCountry($nameCountry)
    {

      $nameCountry = str_replace("%20"," ",$nameCountry);
      $data = array( 'nameCountry' => $nameCountry);
      $result = $this->db->insert('country', $data);
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
    * [getCountries Get all records from country]
    * @return [Array-False] [Return a array with all countries register in the data base]
    */
   function getCountries(){
      $query = $this->db->get('country');
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

    function getInfoCountry($idCountry){
      $query =  $this->db->query("select nameCountry FROM country where idCountry='".$idCountry."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

   /**
    * [editCountry Edit information of a country]
    * @param  [int] $id   [Country ID]
    * @param  [String] $name [Country name]
    * @return [Boolean]       [Edit result]
    */
   function editCountry($id,$name){
    $name = str_replace("%20"," ",$name);
    $data = array('nameCountry' => $name);
    $this->db->where('idCountry', $id);
    $result = $this->db->update('country', $data);
    if($result)
      {
        return true;
      }else
      {
        return false;
      }
    }

  /**
   * [deleteCountry Delete a record from country]
   * @param  [id] $id [Country ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteCountry($id){
    //$result = $this->db->delete('tabla', array('id' => $id));
    $this->db->where('idCountry', $id);
    $result = $this->db->delete('country');
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