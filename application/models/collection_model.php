<?php
class Collection_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     /**
      * [addCity Add a new record in City]
      * @param [String] $nameCity [City Name]
      */
    public function addCollection($collection)
    {
      $collection['collectionNumber'] = str_replace("%20"," ",$collection['collectionNumber']);
      $collection['collectiondateDate'] = str_replace("%20"," ",$collection['collectiondateDate']);
      $collection['determinationDate'] = str_replace("%20"," ",$collection['determinationDate']);
      $collection['coordinates'] = str_replace("%20"," ",$collection['coordinates']);
      $collection['altitude'] = str_replace("%20"," ",$collection['altitude']);
      $collection['locationDescriptionSpanish'] = str_replace("%20"," ",$collection['locationDescriptionSpanish']);
      $collection['locationDescriptionEnglish'] = str_replace("%20"," ",$collection['locationDescriptionEnglish']);
      $collection['hostDescriptionSpanish'] = str_replace("%20"," ",$collection['hostDescriptionSpanish']);
      $collection['hostDescriptionEnglish'] = str_replace("%20"," ",$collection['hostDescriptionEnglish']);
      $collection['morphotypeDescriptionSpanish'] = str_replace("%20"," ",$collection['morphotypeDescriptionSpanish']);
      $collection['morphotypeDescriptionEnglish'] = str_replace("%20"," ",$collection['morphotypeDescriptionEnglish']);

      $result = $this->db->insert('collection', $collection);
      if($result)
      {
          $id=$this->db->insert_id();
          return array('result'  => true, 'id' => $id);
      }else
      {
          return array('result' => false, 'message'=>'Error: Alredy exist a entry with this Collection Number');
        }
      }


   function getCollectionId($idCollection){
      $this->db->where('idCollection',$idCollection);
      $query = $this->db->get('collection');
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }


    function getIdCollections(){
    $query =  $this->db->query("select idCollection from collection");

      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }

   function getCollectionJoinLocationJoinTaxonomie(){

    $query =  $this->db->query('select collection.idCollection, collection.collectionNumber, location.nameCountry, location.nameState, location.nameCity, taxonomie.familyName, taxonomie.genderName, taxonomie.speciesName from (select idCollection, collectionNumber, idSpecies, idCity from collection) as collection inner join (select c.idCity, c.nameCity ,s.nameState, cnt.nameCountry FROM city as c inner join state as s inner join country as cnt on c.idState=s.idState and s.idCountry=cnt.idCountry ) as location inner join (select s.idSpecies, s.speciesName , g.genderName, f.familyName FROM species as s inner join gender as g inner join family as f on s.idGender=g.idGender and g.idFamily=f.idFamily) as taxonomie on collection.idCity=location.idCity and collection.idSpecies=taxonomie.idSpecies');

      if($query->num_rows() > 0){

         return $query->result();
      }else
      {
         return false;
       }
   }


   function editCollection($id,$collection){

      $collection['collectionNumber'] = str_replace("%20"," ",$collection['collectionNumber']);
      $collection['collectiondateDate'] = str_replace("%20"," ",$collection['collectiondateDate']);
      $collection['determinationDate'] = str_replace("%20"," ",$collection['determinationDate']);
      $collection['coordinates'] = str_replace("%20"," ",$collection['coordinates']);
      $collection['altitude'] = str_replace("%20"," ",$collection['altitude']);
      $collection['locationDescriptionSpanish'] = str_replace("%20"," ",$collection['locationDescriptionSpanish']);
      $collection['locationDescriptionEnglish'] = str_replace("%20"," ",$collection['locationDescriptionEnglish']);
      $collection['hostDescriptionSpanish'] = str_replace("%20"," ",$collection['hostDescriptionSpanish']);
      $collection['hostDescriptionEnglish'] = str_replace("%20"," ",$collection['hostDescriptionEnglish']);
      $collection['morphotypeDescriptionSpanish'] = str_replace("%20"," ",$collection['morphotypeDescriptionSpanish']);
      $collection['morphotypeDescriptionEnglish'] = str_replace("%20"," ",$collection['morphotypeDescriptionEnglish']);

        $this->db->where('idCollection', $id);
        $result = $this->db->update('collection', $collection);
        if($result)
          {
            return true;
          }else
          {
            return false;
          }

    }


   function deleteCollection($id){
    $this->db->where('idCollection', $id);
    $result = $this->db->delete('collection');
    if($result)
      {
        return array('result'  => true);
      }else
      {
         return array('result' => false);
      }
    }
}
?>