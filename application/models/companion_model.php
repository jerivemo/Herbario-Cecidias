<?php
class Companion_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


        public function addCompanion($idCollection,$idPerson)
    {
          $data = array('idPerson' => $idPerson,'idCollection' => $idCollection);
          $result = $this->db->insert('companion', $data);
          if($result)
          {
            $id=$this->db->insert_id();
            return array('result'  => true, 'id'=>$id);
          }else
          {
            return array('result' => false);
          }

    }


    function getPersonsNoCompanions($idCollection){
      $query =  $this->db->query("select p.idPerson, p.personName FROM person p LEFT JOIN (select idPerson from companion where idCollection='".$idCollection."') as c ON p.idPerson = c.idPerson WHERE c.idPerson IS NULL");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }



    function getCompanions($idCollection){
      $query =  $this->db->query("select p.personName, c.idPerson FROM person as p inner join companion as c on p.idPerson=c.idPerson where c.idCollection='".$idCollection."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }


    public function addCompanionList($idCollection, $listPerson)
    {
          $error=false;
          $largo = count($listPerson);
          for ($x=0;$x<$largo; $x++) {
                $data = array('idPerson' => $listPerson[$x],'idCollection' => $idCollection);
                $result = $this->db->insert('companion', $data);
                if($result)
                {

                }else
                {
                  $error=true;
                }
          }

          if($error)
          {
              return array('result' => false);
          }else
          {
              return array('result'  => true);
          }

    }



   function deleteCompanion($idCollection,$idPerson){
    $this->db->where('idCollection', $idCollection);
    $this->db->where('idPerson', $idPerson);
    $result = $this->db->delete('companion');
    if($result)
    {
        return array('result' => true);
      }else
      {
        return array('result'  => false);
      }
    }
}
?>