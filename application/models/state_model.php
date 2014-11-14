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
      $this->db->select('idState');
      $this->db->where('idCountry', $idCountry);
      $this->db->where('nameState', $nameState);
      $query = $this->db->get('state');
      if($query->num_rows() > 0){
        return array('result' => false);
      }else{
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
    }

   /**
    * [getStates Get all records from State]
    * @return [Array-False] [Return a array with all States register in the data base]
    */
   function getStates($idCountry){
    $query =  $this->db->query("select idState, nameState from state where idCountry='".$idCountry."'");

      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }

   function getInfoState($idState){
      $query =  $this->db->query("select nameState FROM state where idState='".$idState."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }


      /**
    * [getStates Get all records from State]
    * @return [Array-False] [Return a array with all States register in the data base]
    */
   function getAllStates(){
    $query =  $this->db->query("select idState, nameState from state");

      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }



/**
 * [getStatesJoinCountries Get Inner Join State, Country]
 * @return [Table] [Inner Join State, Country]
 */
   function getStatesJoinCountries(){

    $query =  $this->db->query('select s.idState, s.idCountry, s.nameState ,c.nameCountry FROM state as s inner join country as c on s.idCountry=c.idCountry');

      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }


   /**
    * [editState description]
    * @param  [int] $id   [State ID]
    * @param  [int] $idCountry [description]
    * @param  [String] $name [State name]
    * @return [Boolean]       [Edit result]
    */
   function editState($id,$idCountry,$name){
      $name = str_replace("%20"," ",$name);
      $this->db->select('idState');
      $this->db->where('idCountry', $idCountry);
      $this->db->where('nameState', $name);
      $query = $this->db->get('state');
      if($query->num_rows() > 0){
        return false;
      }else{
          $data = array('idCountry' => $idCountry,'nameState' => $name);
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