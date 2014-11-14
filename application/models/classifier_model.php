<?php
class Classifier_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function addClassifier($idCollection, $idPerson)
    {
          $data = array('idPerson' => $idPerson,'idCollection' => $idCollection);
          $result = $this->db->insert('clasifier', $data);
          if($result)
          {
            return array('result'  => true);
          }else
          {
            return array('result' => false);
          }

    }

    function getClassifier($idCollection){
      $query =  $this->db->query("select idPerson FROM clasifier where idCollection='".$idCollection."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

    function getInfoClassifier($idCollection){
      $query =  $this->db->query("select p.personName FROM clasifier as c inner join person as p on c.idPerson = p.idPerson  where idCollection='".$idCollection."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

     function editClasifier($idCollection,$idPerson){
        $data = array( 'idPerson' => $idPerson);
        $this->db->where('idCollection', $idCollection);
        $result = $this->db->update('clasifier', $data);
        if($result)
          {
            return true;
          }else
          {
            return false;
          }

    }


  function deleteClassifier($idCollection){
    $this->db->where('idCollection', $idCollection);
    $result = $this->db->delete('clasifier');
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