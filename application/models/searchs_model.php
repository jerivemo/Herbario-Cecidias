<?php
class Searchs_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


   function getCollectionByPlantsInfo($family,$gender, $specie, $state){
      $consult = "Select col.idCollection  from (Select c.idCollection, c.idCity, c.idSpecies from collection as c ) as col inner join (Select c.idCity, s.idState from city as c inner join state as s on s.idState=c.idState) as loc
    inner join (Select f.idFamily, g.idGender, s.idSpecies from family as f inner join gender as g inner join species as s on f.idFamily=g.idFamily and g.idGender=s.idGender) as  tax
      on col.idSpecies=tax.idSpecies and col.idCity=loc.idCity";

      $flag=false;

      if ($family!="na"){
          $consult.=" where tax.idFamily='".$family."'";
          $flag=true;
      }

      if ($gender!="na"){
          if ($flag==false){
            $consult.=" where tax.idGender='".$gender."'";
            $flag=true;
          } else {
            $consult.=" and tax.idGender='".$gender."'";
          }
      }

      if ($specie!="na"){
          if ($flag==false){
            $consult.=" where tax.idSpecies='".$specie."'";
            $flag=true;
          } else {
            $consult.=" and tax.idSpecies='".$specie."'";
          }
      }

      if ($state!="na"){
          if ($flag==false){
            $consult.=" where loc.idState='".$state."'";
            $flag=true;
          } else {
            $consult.=" and loc.idState='".$state."'";
          }
      }

      $query =  $this->db->query($consult);
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }


   function getCollectionByOrganismInfo($order, $family,$gender, $specie){
      $consult = "select org.idCollection from organism as org
  inner join (Select o.idOrder, f.idFamily, g.idGender, s.idSpecies from organismorder as o inner join organismfamily as f inner join organismgender as g inner join organismspecies as s
    on o.idOrder=f.idOrder and f.idFamily=g.idFamily and g.idGender=s.idGender) as tax on org.idSpecies=tax.idSpecies";

      $flag=false;

      if ($order!="na"){
          $consult.=" where tax.idOrder='".$order."'";
          $flag=true;
      }

      if ($family!="na"){
          if ($flag==false){
            $consult.=" where tax.idFamily='".$family."'";
            $flag=true;
          } else {
            $consult.=" and tax.idFamily='".$family."'";
          }
      }

      if ($gender!="na"){
          if ($flag==false){
            $consult.=" where tax.idGender='".$gender."'";
            $flag=true;
          } else {
            $consult.=" and tax.idGender='".$gender."'";
          }
      }

      if ($specie!="na"){
          if ($flag==false){
            $consult.=" where tax.idSpecies='".$specie."'";
            $flag=true;
          } else {
            $consult.=" and tax.idSpecies='".$specie."'";
          }
      }

      $consult.=" group by (org.idCollection)";

      $query =  $this->db->query($consult);
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }


}
?>