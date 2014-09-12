<?php
class OrganismOrder_model extends  CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     /**
      * [addOrder Add a new record in Order]
      * @param [String] $nameOrder [Order Name]
      */
    public function addOrder($nameOrder)
    {

      $nameOrder = str_replace("%20"," ",$nameOrder);
      $data = array( 'orderName' => $nameOrder);
      $result = $this->db->insert('organismorder', $data);
      if($result)
      {
        $id=$this->db->insert_id();
        return array('result'  => 'true', 'id' => $id);
      }else
      {
        return array('result' => false);
      }
    }

   /**
    * [getOrders Get all records from Order]
    * @return [Array-False] [Return a array with all orders register in the data base]
    */
   function getOrders(){
      $query = $this->db->get('organismorder');
      if($query->num_rows() > 0){
         return $query->result();
      }else
      {
         return false;
       }
   }

   /**
    * [editOrder Edit information of a Order]
    * @param  [int] $id   [Order ID]
    * @param  [String] $name [Order name]
    * @return [Boolean]       [Edit result]
    */
   function editOrder($id,$name){
    $name = str_replace("%20"," ",$name);
    $data = array('orderName' => $name);
    $this->db->where('idOrder', $id);
    $result = $this->db->update('organismorder', $data);
    if($result)
      {
        return true;
      }else
      {
        return false;
      }
    }

  /**
   * [deleteOrder Delete a record from Order]
   * @param  [id] $id [Order ID]
   * @return [Boolean]     [Delete result]
   */
   function deleteOrder($id){
    $this->db->where('idOrder', $id);
    $result = $this->db->delete('organismorder');
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