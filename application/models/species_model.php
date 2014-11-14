<?php
class Species_model extends  CI_Model {

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
      $this->db->select('idSpecies');
      $this->db->where('idGender', $idGender);
      $this->db->where('speciesName', $nameSpecies);
      $query = $this->db->get('species');
      if($query->num_rows() > 0){
        return array('result' => false);
      }else{
          $data = array('idGender' => $idGender,'speciesName' => $nameSpecies);
          $result = $this->db->insert('species', $data);
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
    * [getSpecies Get all records from Species]
    * @return [Array-False] [Return a array with all Speciess register in the data base]
    */
   function getSpecies($idGender){
      $query =  $this->db->query("select idSpecies, speciesName from species where idGender='".$idGender."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

   function getInfoSpecie($idSpecie){
      $query =  $this->db->query("select speciesName FROM species where idSpecies='".$idSpecie."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

    function getIdGenderIdFamily($idSpecie){
      $query =  $this->db->query("select g.idGender, f.idFamily FROM species as s inner join gender as g inner join family as f on s.idGender=g.idGender and g.idFamily=f.idFamily where s.idSpecies='".$idSpecie."'");
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

    $query =  $this->db->query('select s.idSpecies, s.idGender, f.idFamily, s.speciesName ,g.genderName, f.familyName FROM species as s inner join gender as g inner join family as f on s.idGender=g.idGender and g.idFamily=f.idFamily');

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
      $this->db->select('idSpecies');
      $this->db->where('idGender', $idGender);
      $this->db->where('speciesName', $name);
      $query = $this->db->get('species');
      if($query->num_rows() > 0){
        return false;
      }else{
          $data = array('idGender' => $idGender,'speciesName' => $name);
          $this->db->where('idSpecies', $id);
          $result = $this->db->update('species', $data);
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
   * [deleteSpecies Delete a record from Species]
   * @param  [id] $id [Species ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteSpecies($id){
    $this->db->where('idSpecies', $id);
    $result = $this->db->delete('species');
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