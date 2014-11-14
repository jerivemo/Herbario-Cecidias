<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    /**
     * Country Controller
     */
    public function index()
    {
        $this->load->helper('url');

        $this->load->model('state_model');
        $this->load->model('family_model');
        $this->load->model('organismorder_model');

        $data['states']=$this->state_model->getStatesJoinCountries();
        $data['families']=$this->family_model->getFamilies();
        $data['orders']=$this->organismorder_model->getOrders();

        $this->load->view('main/mainPage',$data);
    }

    public function Search()
    {
        $this->load->helper('url');
        $this->load->model('collection_model');
        if ($this->input->post('family')) {

            $family=$this->input->post('family');
            $gender=$this->input->post('gender');
            $specie=$this->input->post('specie');
            $state=$this->input->post('state');
            $this->_searchByPlantInfo($family,$gender,$specie,$state);

        }else if ($this->input->post('orgOrder')){

            $orgOrder=$this->input->post('orgOrder');
            $orgFamily=$this->input->post('orgFamily');
            $orgGender=$this->input->post('orgGender');
            $orgSpecie=$this->input->post('orgSpecie');

            $this->_searchByOrganismInfo($orgOrder,$orgFamily,$orgGender,$orgSpecie);


        }else {
             show_404();
        }


    }

    function getCollection(){

           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idCollection=$this->input->post('idCollection');
                    $data['collectionInfo']=$this->_getCollectionInfo($idCollection);
                    $json = json_encode($data);
                    echo $json;
            }
    }

    private function _searchByPlantInfo($family,$gender,$specie,$state){
        if ($family == "na" && $gender == "na" && $specie == "na" && $state = "na"){
         $data['list']=$this->collection_model->getIdCollections();
         $data['collectionInfo']=$this->_getCollectionInfo($data['list'][0]->idCollection);
         $data['collectionResults']=count($data['list']);
         $this->load->view('main/search',$data);
        } else {
            $this->load->model('searchs_model');
            $data['list']=$this->searchs_model->getCollectionByPlantsInfo($family,$gender, $specie, $state);
            //Cambiar por Mostrar ventana con no resultados
            if ($data['list']==false){
                show_404();
            }
            $data['collectionInfo']=$this->_getCollectionInfo($data['list'][0]->idCollection);
            $data['collectionResults']=count($data['list']);
            $this->load->view('main/search',$data);
        }
    }

    private function _searchByOrganismInfo($order,$family,$gender,$specie){
        if ($family == "na" && $gender == "na" && $specie == "na" && $order = "na"){
         $data['list']=$this->collection_model->getIdCollections();
         $data['collectionInfo']=$this->_getCollectionInfo($data['list'][0]->idCollection);
         $data['collectionResults']=count($data['list']);
         $this->load->view('main/search',$data);
        } else {
            $this->load->model('searchs_model');
            $data['list']=$this->searchs_model->getCollectionByOrganismInfo($order, $family,$gender, $specie);
            //Cambiar por Mostrar ventana con no resultados
            if ($data['list']==false){
                show_404();
            }
            $data['collectionInfo']=$this->_getCollectionInfo($data['list'][0]->idCollection);
            $data['collectionResults']=count($data['list']);
            $this->load->view('main/search',$data);
        }
    }

    private function _getCollectionInfo($idCollection){

        $this->load->model('collection_model');
        $data['collection']=$this->collection_model->getCollectionId($idCollection);

        if($data['collection']==false)
        {
            return false;
        }

        $this->load->model('person_model');
        $this->load->model('country_model');
        $this->load->model('state_model');
        $this->load->model('city_model');
        $this->load->model('species_model');
        $this->load->model('gender_model');
        $this->load->model('family_model');
        $this->load->model('organismorder_model');
        $this->load->model('gall_model');
        $this->load->model('companion_model');
        $this->load->model('determinator_model');
        $this->load->model('classifier_model');
        $this->load->model('collector_model');
        $this->load->model('organism_model');
        $this->load->model('images_model');

        $data['companions']=$this->companion_model->getCompanions($data['collection'][0]->idCollection);
        $data['determinators']=$this->determinator_model->getDeterminators($data['collection'][0]->idCollection);

        $data['classifier']=$this->classifier_model->getInfoClassifier($data['collection'][0]->idCollection);
        $data['collector']=$this->collector_model->getInfoCollector($data['collection'][0]->idCollection);

        $data['idStateCountry']=$this->city_model->getIdStateIdCountry($data['collection'][0]->idCity);

        $data['country']=$this->country_model->getInfoCountry($data['idStateCountry'][0]->idCountry);
        $data['state']=$this->state_model->getInfoState($data['idStateCountry'][0]->idState);
        $data['city']=$this->city_model->getInfoCity($data['collection'][0]->idCity);

        $data['idGenderFamily']=$this->species_model->getIdGenderIdFamily($data['collection'][0]->idSpecies);

        $data['family']=$this->family_model->getInfoFamily($data['idGenderFamily'][0]->idFamily);
        $data['gender']=$this->gender_model->getInfoGender($data['idGenderFamily'][0]->idGender);
        $data['specie']=$this->species_model->getInfoSpecie($data['collection'][0]->idSpecies);

        $data['gall']=$this->gall_model->getInfoGall($data['collection'][0]->idGall);

        $data['organisms']=$this->organism_model->getOrganismCollection($data['collection'][0]->idCollection);

        $data['images']=$this->images_model->getImages($data['collection'][0]->idCollection);

        $data['coordinates']=$this->_coordinatesToLatLong($data['collection'][0]->coordinates);

        return $data;
    }

    private function _coordinatesToLatLong($sCadena){
        //return array('latitud' =>  10.3633333333333 ,'longitud'=> -84.5089444444444);
        if ($sCadena=="" || strlen($sCadena) < 15){
            return array('latitud' =>  10.3633333333333 ,'longitud'=> -84.5089444444444);
        }

        $latitud="";
        $longitud="";
        $tmp="";
        for($i=0; $i<strlen($sCadena); $i++){
            if ($sCadena[$i]=="N"){
                $tmp.=$sCadena[$i];
                $i++;
                $latitud=$tmp;
                $tmp="";
            }else if ($sCadena[$i]==" "){

            }else {
                $tmp.=$sCadena[$i];
            }
        }
        $longitud=$tmp;
        $tmp="";

        $degN=0;
        $minN=0;
        $secN=0;
        for($i=0; $i<strlen($latitud); $i++){
            if (ord($latitud[$i])==194){
                $degN=$tmp;
                $tmp="";
                $i++;
            }else if ($latitud[$i]=="'") {
                $minN=$tmp;
                $tmp="";
            } else if ($latitud[$i]=='"') {
                $secN=$tmp;
                $tmp="";
            }else {
                $tmp.=$latitud[$i];
            }
        }
        $tmp="";
        $degW=0;
        $minW=0;
        $secW=0;
        for($x=0; $x<strlen($longitud); $x++){
            if ($longitud[$x]==' ' ){

            }else if (ord($longitud[$x])==194){
                $degW=$tmp;
                $tmp="";
                $x++;
            }else if ($longitud[$x]=="'") {
                $minW=$tmp;
                $tmp="";
            } else if ($longitud[$x]=='"') {
                $secW=$tmp;
                $tmp="";
            }else {
                $tmp.=$longitud[$x];
            }
        }
        $latitudF=$this->_convertDMStoDecimal($degN,$minN,$secN);
        $longitudF=(-1)*$this->_convertDMStoDecimal($degW,$minW,$secW);
        return array('latitud' =>  $latitudF ,'longitud'=> $longitudF);

    }


private function _convertDMStoDecimal($deg,$min,$sec){
    $result=$deg+((($min*60)+$sec)/3600);
    return $result;
}



}
?>