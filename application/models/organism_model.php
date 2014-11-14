<?php
class Organism_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function addOrganism($idCollection, $idSpecies, $type, $larvae, $nymphs, $pupae, $adult)
    {
      $data = array('idCollection' => $idCollection,'idSpecies' => $idSpecies,'organismType' => $type,'larvae' => $larvae, 'nymphs' => $nymphs,'pupae' => $pupae,'adult' => $adult);
          $result = $this->db->insert('organism', $data);
          if($result)
          {
            $id=$this->db->insert_id();
            return array('result'  => true,'idOrganism'=>$id);
          }else
          {
            return array('result' => false);
          }

    }


    public function addOrganismList($idCollection, $listOrganism)
    {
          $error=false;
           $largo = count($listOrganism);
          for ($x=0;$x<$largo; $x++) {
            $data = array('idCollection' => $idCollection,'idSpecies' => $listOrganism[$x][1],'organismType' => $listOrganism[$x][0],'larvae' => $listOrganism[$x][2], 'nymphs' => $listOrganism[$x][3],'pupae' => $listOrganism[$x][4],'adult' => $listOrganism[$x][5]);
            $result = $this->db->insert('organism', $data);
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

       function getOrganismCollection($idCollection){

    $query =  $this->db->query("select org.idOrganism, org.organismType, org.larvae, org.nymphs, org.pupae, org.adult, taxonomie.orderName, taxonomie.familyName, taxonomie.genderName, taxonomie.speciesName from organism as org inner join (select s.idSpecies, s.speciesName, g.genderName ,f.familyName, o.orderName FROM organismspecies as s inner join organismgender as g inner join organismfamily as f inner join organismorder as o on s.idGender=g.idGender and g.idFamily=f.idFamily and f.idOrder=o.idOrder) as taxonomie on org.idSpecies=taxonomie.idSpecies where org.idCollection='".$idCollection."'");

      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }

   function deleteOrganism($idCollection,$idOrganism){
    $this->db->where('idCollection', $idCollection);
    $this->db->where('idOrganism', $idOrganism);
    $result = $this->db->delete('organism');
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