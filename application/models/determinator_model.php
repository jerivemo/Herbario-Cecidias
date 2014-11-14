<?php
class Determinator_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


        public function addDeterminator($idCollection,$idPerson)
    {
          $data = array('idPerson' => $idPerson,'idCollection' => $idCollection);
          $result = $this->db->insert('determinator', $data);
          if($result)
          {
            $id=$this->db->insert_id();
            return array('result'  => true, 'id'=>$id);
          }else
          {
            return array('result' => false);
          }

    }

    function getPersonsNoDeterminators($idCollection){
      $query =  $this->db->query("select p.idPerson, p.personName FROM person p LEFT JOIN (select idPerson from determinator where idCollection='".$idCollection."') as c ON p.idPerson = c.idPerson WHERE c.idPerson IS NULL");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }
    function getDeterminators($idCollection){
      $query =  $this->db->query("select p.personName, d.idPerson FROM person as p inner join determinator as d on p.idPerson=d.idPerson where d.idCollection='".$idCollection."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }


    public function addDeterminatorList($idCollection, $listPerson)
    {
          $error=false;
          $largo = count($listPerson);
          for ($x=0;$x<$largo; $x++) {
                $data = array('idPerson' => $listPerson[$x],'idCollection' => $idCollection);
                $result = $this->db->insert('determinator', $data);
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



   function deleteDeterminator($idCollection,$idPerson){
    $this->db->where('idCollection', $idCollection);
    $this->db->where('idPerson', $idPerson);
    $result = $this->db->delete('determinator');
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