<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collection extends CI_Controller {

    /**
     * Country Controller
     */
    public function index()
    {
        $this->load->helper('url');
        $this->load->model('collection_model');
        $data['collection']=$this->collection_model->getCollectionJoinLocationJoinTaxonomie();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/collections/view/view',$data);
        $this->load->view('admin/collections/view/footer');
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->model('collection_model');
        $data['collection']=$this->collection_model->getCollectionJoinLocationJoinTaxonomie();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/collections/view/view',$data);
        $this->load->view('admin/collections/view/footer');

    }

    public function edit($idCollection=null)
    {
        if (is_null($idCollection)){
            show_404();
        }

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->helper('text');
        $this->load->model('collection_model');
        $data['collection']=$this->collection_model->getCollectionId($idCollection);
        if($data['collection']==false)
        {
            show_404();
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

        $data['classifier']=$this->classifier_model->getClassifier($data['collection'][0]->idCollection);
        $data['collector']=$this->collector_model->getCollector($data['collection'][0]->idCollection);

        $data['personsNoCompanions']=$this->companion_model->getPersonsNoCompanions($data['collection'][0]->idCollection);
        $data['personsNoDeterminators']=$this->determinator_model->getPersonsNoDeterminators($data['collection'][0]->idCollection);

        $data['collection'][0]->coordinates=htmlspecialchars($data['collection'][0]->coordinates);
        $data['idStateCountry']=$this->city_model->getIdStateIdCountry($data['collection'][0]->idCity);
        $data['states']=$this->state_model->getStates($data['idStateCountry'][0]->idCountry);
        $data['cities']=$this->city_model->getCities($data['idStateCountry'][0]->idState);

        $data['idGenderFamily']=$this->species_model->getIdGenderIdFamily($data['collection'][0]->idSpecies);
        $data['genders']=$this->gender_model->getGenders($data['idGenderFamily'][0]->idFamily);
        $data['species']=$this->species_model->getSpecies($data['idGenderFamily'][0]->idGender);

        $data['organisms']=$this->organism_model->getOrganismCollection($data['collection'][0]->idCollection);

        $data['images']=$this->images_model->getImages($data['collection'][0]->idCollection);

        $data['orders']=$this->organismorder_model->getOrders();
        $data['persons']=$this->person_model->getPersons();
        $data['galls']=$this->gall_model->getGalls();
        $data['families']=$this->family_model->getFamilies();
        $data['countries']=$this->country_model->getCountries();
        $id['idCollection']=$idCollection;

        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/collections/edit/view',$data);
        $this->load->view('admin/collections/edit/footer',$id);
    }

    public function add()
    {
        $this->load->helper('url');
        $this->load->model('gall_model');
        $this->load->model('country_model');
        $this->load->model('family_model');
        $this->load->model('organismorder_model');
        $this->load->model('person_model');
        $data['orders']=$this->organismorder_model->getOrders();
        $data['galls']=$this->gall_model->getGalls();
        $data['families']=$this->family_model->getFamilies();
        $data['countries']=$this->country_model->getCountries();
        $data['persons']=$this->person_model->getPersons();
        $this->load->view('admin/head');
        $this->load->view('admin/header');
        $this->load->view('admin/collections/add/view',$data);
        $this->load->view('admin/collections/add/footer');

    }

    //create a new Collectio
    function createCollection(){
           if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $collection = array();
                    $collection['collectionNumber'] = $this->input->post('collectionNumber');
                    $collection['collectiondateDate'] = $this->input->post('collectionDate');
                    $collection['determinationDate'] = $this->input->post('determinationDate');
                    $collection['wetSample'] = $this->input->post('wetSample');
                    $collection['drySample'] = $this->input->post('drySample');
                    $collection['idGall'] = $this->input->post('idGall');
                    $collection['idSpecies'] = $this->input->post('idSpecie');
                    $collection['idCity'] = $this->input->post('idCity');
                    $collection['coordinates'] = $this->input->post('coordinates');
                    $collection['altitude'] = $this->input->post('altitude');
                    $collection['locationDescriptionSpanish'] = $this->input->post('locationSpanish');
                    $collection['locationDescriptionEnglish'] = $this->input->post('locationEnglish');
                    $collection['hostDescriptionSpanish'] = $this->input->post('hostSpanish');
                    $collection['hostDescriptionEnglish'] = $this->input->post('hostEnglish');
                    $collection['morphotypeDescriptionSpanish'] = $this->input->post('morphotypeSpanish');
                    $collection['morphotypeDescriptionEnglish'] = $this->input->post('lmorphotypeEnglish');
                    $this->load->model('collection_model');
                    $resultCollection=$this->collection_model->addCollection($collection);

                    if ($resultCollection['result']){
                        $idCollection=$resultCollection['id'];

                        $classifier=$this->input->post('classifier');
                        $this->load->model('classifier_model');
                        $resultClassifier=$this->classifier_model->addClassifier($idCollection,$classifier);

                        $collector=$this->input->post('collector');
                        $this->load->model('collector_model');
                        $resultCollector=$this->collector_model->addCollector($idCollection,$collector);

                        $companions=$this->input->post('companions');
                        if ($companions[0]!=null){
                            $this->load->model('companion_model');
                            $resultCompanion=$this->companion_model->addCompanionList($idCollection,$companions);
                        }else{
                            $resultCompanion=$arrayName = array('result' =>true);
                        }

                        $determinators=$this->input->post('determinators');
                        if ($determinators[0]!=null){
                            $this->load->model('determinator_model');
                            $resultDeterminator=$this->determinator_model->addDeterminatorList($idCollection,$determinators);
                        }else{
                            $resultDeterminator=$arrayName = array('result' =>true);
                        }

                        $organisms=$this->input->post('organisms');
                        if ($organisms[0]!=null){
                            $this->load->model('organism_model');
                            $resultOrganism=$this->organism_model->addOrganismList($idCollection,$organisms);
                        }else{
                            $resultOrganism=$arrayName = array('result' =>true);
                        }

                        $result = array('result'=>$resultCollection['result'],'resultClassifier'=>$resultClassifier['result'],'resultCollector'=>$resultCollector['result'],'resultCompanions'=>$resultCompanion['result'],'resultDeterminators'=>$resultDeterminator['result'], 'resultOrganisms'=>$resultOrganism['result'],'idCollection'=>$idCollection);
                        $json = json_encode($result);
                        echo $json;


                    }else {
                        $json = json_encode($resultCollection);
                        echo $json;
                    }


            }
    }



    public function editCollection(){
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $id=$this->input->post('id');
                    $collection = array();
                    $collection['collectionNumber'] = $this->input->post('collectionNumber');
                    $collection['collectiondateDate'] = $this->input->post('collectionDate');
                    $collection['determinationDate'] = $this->input->post('determinationDate');
                    $collection['wetSample'] = $this->input->post('wetSample');
                    $collection['drySample'] = $this->input->post('drySample');
                    $collection['idGall'] = $this->input->post('idGall');
                    $collection['idSpecies'] = $this->input->post('idSpecie');
                    $collection['idCity'] = $this->input->post('idCity');
                    $collection['coordinates'] = $this->input->post('coordinates');
                    $collection['altitude'] = $this->input->post('altitude');
                    $collection['locationDescriptionSpanish'] = $this->input->post('locationSpanish');
                    $collection['locationDescriptionEnglish'] = $this->input->post('locationEnglish');
                    $collection['hostDescriptionSpanish'] = $this->input->post('hostSpanish');
                    $collection['hostDescriptionEnglish'] = $this->input->post('hostEnglish');
                    $collection['morphotypeDescriptionSpanish'] = $this->input->post('morphotypeSpanish');
                    $collection['morphotypeDescriptionEnglish'] = $this->input->post('lmorphotypeEnglish');
                    $this->load->model('collection_model');
                    $resultEdit=$this->collection_model->editCollection($id,$collection);

                    $collector = $this->input->post('collector');
                    $clasifier = $this->input->post('clasifier');

                    $this->load->model('collector_model');
                    $resultCollector=$this->collector_model->editCollector($id,$collector);

                    $this->load->model('classifier_model');
                    $resultClasifier=$this->classifier_model->editClasifier($id,$clasifier);


                    $result = array('result'=>$resultEdit,'resultClassifier'=>$resultClasifier,'resultCollector'=>$resultCollector);

                    $json = json_encode($result);
                    echo $json;
            }

    }


    //Delete the Country Name.
    public function deleteCollection()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idCollection=$this->input->post('idCollection');
                    $this->load->model('collection_model');
                    $result=$this->collection_model->deleteCollection($idCollection);
                    $json = json_encode($result);
                    echo $json;
            }

    }

    public function addCompanion()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idPerson=$this->input->post('idPerson');
                    $idCollection=$this->input->post('idCollection');
                    $this->load->model('companion_model');
                    $result=$this->companion_model->addCompanion($idCollection,$idPerson);
                    $json = json_encode($result);
                    echo $json;
            }

    }

    public function deleteCompanion()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idPerson=$this->input->post('idPerson');
                    $idCollection=$this->input->post('idCollection');
                    $this->load->model('companion_model');
                    $result=$this->companion_model->deleteCompanion($idCollection,$idPerson);
                    $json = json_encode($result);
                    echo $json;
            }

    }

    public function addDeterminator()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idPerson=$this->input->post('idPerson');
                    $idCollection=$this->input->post('idCollection');
                    $this->load->model('determinator_model');
                    $result=$this->determinator_model->addDeterminator($idCollection,$idPerson);
                    $json = json_encode($result);
                    echo $json;
            }

    }

    public function deleteDeterminator()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idPerson=$this->input->post('idPerson');
                    $idCollection=$this->input->post('idCollection');
                    $this->load->model('determinator_model');
                    $result=$this->determinator_model->deleteDeterminator($idCollection,$idPerson);
                    $json = json_encode($result);
                    echo $json;
            }

    }

    public function addOrganism()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                $idCollection=$this->input->post('idCollection');
                $idSpecies=$this->input->post('idSpecies');
                $type=$this->input->post('type');
                $larvae=$this->input->post('larvae');
                $nymphs=$this->input->post('nymph');
                $pupae=$this->input->post('pupae');
                $adult=$this->input->post('adult');
                $this->load->model('organism_model');
                $result=$this->organism_model->addOrganism($idCollection, $idSpecies, $type, $larvae, $nymphs, $pupae, $adult);
                $json = json_encode($result);
                    echo $json;
            }

    }

    public function deleteOrganism()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idOrganism=$this->input->post('idOrganism');
                    $idCollection=$this->input->post('idCollection');
                    $this->load->model('organism_model');
                    $result=$this->organism_model->deleteOrganism($idCollection,$idOrganism);
                    $json = json_encode($result);
                    echo $json;
            }

    }

    public function deleteImage()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idImage=$this->input->post('idImage');
                    $nameImage=$this->input->post('nameImage');
                    $this->load->model('images_model');
                    $result=$this->images_model->deleteImage($idImage);
                    if ($result['result'])
                    {
                        $this->load->helper('url');
                        $this->load->helper('file');
                        $fileName = "./images/".$nameImage;
                        if (file_exists($fileName)) {
                            unlink($fileName);
                        }
                    }
                    $json = json_encode($result);
                    echo $json;
            }

    }


    public function getImages()
    {
        if(!$this->input->is_ajax_request()){
                  show_404();
            }
           else {
                    $idCollection=$this->input->post('idCollection');
                    $this->load->model('images_model');
                    $result=$this->images_model->getImages($idCollection);
                    $json = json_encode($result);
                    echo $json;
            }

    }


}

/* End of file Country.php */
/* Location: ./application/controllers/Country.php */
?>
