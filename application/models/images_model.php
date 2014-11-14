<?php
class Images_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


   /**
    * [getCountries Get all records from country]
    * @return [Array-False] [Return a array with all countries register in the data base]
    */
   function getImages($idCollection){
      $query =  $this->db->query("select idImage, name from images where idCollection='".$idCollection."'");
      if($query->num_rows() > 0){
         return $query->result();
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
   function deleteImage($idImage){
    $this->db->where('idImage', $idImage);
    $result = $this->db->delete('images');
    if($result)
      {
        return $arrayName = array('result' => true );
      }else
      {
        return $arrayName = array('result' => false );

      }
    }
}
?>