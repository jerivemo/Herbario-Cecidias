<?php
class OrganismSpecies_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     /**
      * [addSpecies Add a new record in Species]
      * @param [String] $nameSpecies [Species Name]
      */
    public function addSpecies($idGender, $nameSpecies)
    {

      $nameSpecies = str_replace("%20"," ",$nameSpecies);
      $data = array('idGender' => $idGender,'speciesName' => $nameSpecies);
      $result = $this->db->insert('organismspecies', $data);
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
    * [getSpecies Get all records from Species]
    * @return [Array-False] [Return a array with all Speciess register in the data base]
    */
   function getSpecies(){
      $query = $this->db->get('organismspecies');
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

/**
 * [getSpeciesJoinGenders Get Inner Join Species, Gender]
 * @return [Table] [Inner Join Species, Gender]
 */
   function getSpeciesJoinGenders(){

    $query =  $this->db->query('select s.idSpecies, s.idGender, s.speciesName ,g.genderName FROM organismspecies as s inner join organismgender as g on s.idGender=g.idGender');

      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }


   /**
    * [editSpecies description]
    * @param  [int] $id   [Species ID]
    * @param  [int] $idGender [description]
    * @param  [String] $name [Species name]
    * @return [Boolean]       [Edit result]
    */
   function editSpecies($id,$idGender,$name){
    $name = str_replace("%20"," ",$name);
    $data = array('idGender' => $idGender,'speciesName' => $name);
    $this->db->where('idSpecies', $id);
    $result = $this->db->update('organismspecies', $data);
    if($result)
      {
        return true;
      }else
      {
        return false;
      }
    }

  /**
   * [deleteSpecies Delete a record from Species]
   * @param  [id] $id [Species ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteSpecies($id){
    $this->db->where('idSpecies', $id);
    $result = $this->db->delete('organismspecies');
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