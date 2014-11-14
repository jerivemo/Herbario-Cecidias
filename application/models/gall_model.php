<?php
class Gall_model extends  CI_Model {

      function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     //Add a new gall
     public function addGall($nameGall)
    {

      $nameGall = str_replace("%20"," ",$nameGall);
      $data = array( 'gallName' => $nameGall);
      $result = $this->db->insert('gall', $data);
      if($result)
      {
        $id=$this->db->insert_id();
        return array('result'  => 'true', 'id' => $id);
      }else
      {
        return array('result' => false);
      }
    }

   //Return all galls
   function getGalls(){
      $query = $this->db->get('gall');
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

   function getInfoGall($idGall){
      $query =  $this->db->query("select gallName FROM gall where idGall='".$idGall."'");
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

   //Edit Gall
   function editGall($id,$name){
    $name = str_replace("%20"," ",$name);
    $data = array('gallName' => $name);
    $this->db->where('idGall', $id);
    $result = $this->db->update('gall', $data);
    if($result)
      {
        return true;
      }else
      {
        return false;
      }
    }

   //Edit Gall
   function deleteGall($id){
    //$result = $this->db->delete('gall', array('idGall' => $id));
    $this->db->where('idGall', $id);
    $result = $this->db->delete('gall');
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