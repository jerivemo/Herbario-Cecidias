<?php
class Collector_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * [addCollector Add a new record in Collector][addCollector description]
     * @param [INT] $idPerson     [description]
     * @param [INT] $idCollection [description]
     */
    public function addCollector($idCollection,$idPerson)
    {
          $data = array('idPerson' => $idPerson,'idCollection' => $idCollection);
          $result = $this->db->insert('collector', $data);
          if($result)
          {
            return array('result'  => true);
          }else
          {
            return array('result' => false);
          }

    }
      function editCollector($idCollection,$idPerson){
        $data = array( 'idPerson' => $idPerson);
        $this->db->where('idCollection', $idCollection);
        $result = $this->db->update('collector', $data);
        if($result)
          {
            return true;
          }else
          {
            return false;
          }

    }
    function getCollector($idCollection){
      $query =  $this->db->query("select idPerson FROM collector where idCollection='".$idCollection."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

    function getInfoCollector($idCollection){
      $query =  $this->db->query("select p.personName FROM collector as c inner join person as p on c.idPerson = p.idPerson  where idCollection='".$idCollection."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }



   function deleteCollector($idCollection){
    $this->db->where('idCollection', $idCollection);
    $result = $this->db->delete('collector');
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