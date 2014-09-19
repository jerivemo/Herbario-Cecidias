<?php
class City_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     /**
      * [addCity Add a new record in City]
      * @param [String] $nameCity [City Name]
      */
    public function addCity($idState, $nameCity)
    {

      $nameCity = str_replace("%20"," ",$nameCity);
      $data = array('idState' => $idState,'nameCity' => $nameCity);
      $result = $this->db->insert('city', $data);
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
    * [getCities Get all records from City]
    * @return [Array-False] [Return a array with all Citys register in the data base]
    */
   function getCities(){
      $query = $this->db->get('city');
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

/**
 * [getCitiesJoinStates Get Inner Join City, State]
 * @return [Table] [Inner Join City, State]
 */
   function getCitiesJoinStates(){

    $query =  $this->db->query('select c.idCity, c.idState, c.nameCity ,s.nameState FROM city as c inner join state as s on c.idState=s.idState');

      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }


   /**
    * [editCity description]
    * @param  [int] $id   [City ID]
    * @param  [int] $idState [description]
    * @param  [String] $name [City name]
    * @return [Boolean]       [Edit result]
    */
   function editCity($id,$idState,$name){
    $name = str_replace("%20"," ",$name);
    $data = array('idState' => $idState,'nameCity' => $name);
    $this->db->where('idCity', $id);
    $result = $this->db->update('city', $data);
    if($result)
      {
        return true;
      }else
      {
        return false;
      }
    }

  /**
   * [deleteCity Delete a record from City]
   * @param  [id] $id [City ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteCity($id){
    $this->db->where('idCity', $id);
    $result = $this->db->delete('city');
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