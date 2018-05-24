<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Handle_car extends CI_Controller {

    public $uploader;

    function __construct() {

//        print "<html><body>";

        parent::__construct();

        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('session');

        if (null == $this->session->userdata('cust_id')) {
            redirect("Homepage");
            exit;
        }

        //$this->emp_level = $this->session->userdata('emp_level');

        $this->load->library('uploader');

        //$uploader = new $this->Uploader();
        ////
        $this->load->database();
        // load library
        // load helper

        $this->load->library('form_validation');
        //$userId = $this -> session -> userdata('user_id');

        $this->load->model('car_model');
    }

    function index() {

        if (isset($_POST['item_id'])) {
            $item = $this->pos_model->get_item_by_id($_POST['item_id']);
            if ($item == "ERROR")
              ;//  print '{"msg":"ERROR"}';
            else
                print '{"name":"' . $item->name_ . '", "id":' . $item->id . ', "price":' . $item->price . '}';
        }else {
           ;// print '{"msg":"ERROR"}';
        }
    }

    function get_ad($car_id) {

        if (isset($car_id)) {
            $ad = $this->car_model->get_ad($car_id);

            if ($ad == "ERROR")
                print '{"msg":"ERROR"}';
            else
                print json_encode($ad);
        }else {
            print '{"msg":"ERROR"}';
        }
    }

    function get_item($item_id) {
        if (isset($item_id)) {
            $item = $this->pos_model->get_item_by_id($item_id);
            if ($item == "ERROR")
                print '{"msg":"ERROR"}';
            else
                print '{"name":"' . $item->name_ . '", "id":' . $item->id . ', "price":' . $item->price . ', "quantity":' . $item->quantity . '}';
        }else {
            print '{"msg":"ERROR"}';
        }
    }

    function test() {
        print '{"msg":"you sent to me: ' . $_POST["id"] . '   with name ' . $_POST["name"] . '"}';
    }

    function addAd() {

        $data['fields'] = $this->db->list_fields('car_info');
        $this->load->view("addAd", $data);
    }

    function saveAd() {




        //include(base_url()."assets/jQuery.filer/php/class.uploader.php");
        //$this->load->view("class.uploader");
        //$uploader = new Uploader();
        $this->form_validation->set_rules('car_title', 'Car Title', 'required');


        $this->validation();
        //  var_dump($this->form_validation->run());


        if ($this->form_validation->run() == FALSE) {
            $data['errors'] = "Errors";
            $data['post'] = $_POST;
            $this->load->view('addAd', $data);
        } else {

            $_POST['customer_id'] = $this->session->cust_id;
            unset($_POST['submit']);

            $this->session->adData = $_POST;

            redirect("Handle_car/saveAdImages", "saveAdImages");
            //$this->saveAdImages();
            //  var_dump($_POST);
            //  $this->load->view('addAdImages', $data);
        }



        return;
    }

    function saveAdImages() {



        $data['adData'] = $this->session->adData;
      
      
        if (isset( $data['adData'] ['purchase_type']) and is_array( $data['adData'] ['purchase_type'])) {
            $str = "";
            foreach ( $data['adData'] ['purchase_type'] as $value) {
                if($str == "")
                    $str = $value;
                else
                $str .= ','.$value;
            
                
            
                  
            }
             $data['adData']['purchase_type']  = $str;
           // exit;
        }
       

        //  var_dump($_FILES);
        //  var_dump(isset($_FILES['files']));
        //return;
        if (!isset($_FILES['files']))
            $this->load->view("addAdImages", $data);

        else {



            // var_dump($this->session);
            // var_dump($query);    
            //return;
            //$this->session->adData['customer_id'] = $this->session->cust_id;
            //   var_dump($this->session->adData);

            $ires = $this->db->insert('car_info',  $data['adData']);

            $query = "SELECT max(id) as id FROM car_info WHERE customer_id = " . $this->session->cust_id;
            //  var_dump($ires);
            //return;
            $adID = $this->db->query($query)->result()[0]->id;

           // var_dump($_SERVER['DOCUMENT_ROOT'] . "CarTrading/grocery/assets/uploads/files/" . $this->session->cust_id . "/" . $adID . "/");
            //exit;

            $data = $this->uploader->upload($_FILES['files'], array(
                'limit' => 10, //Maximum Limit of files. {null, Number}
                'maxSize' => 10, //Maximum Size of files {null, Number(in MB's)}
                'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
                'required' => false, //Minimum one file is required for upload {Boolean}
                'uploadDir' => $_SERVER['DOCUMENT_ROOT'] . "CarTrading/main/assets/uploads/files/" . $this->session->cust_id . "/" . $adID . "/", //Upload directory {String}
                'title' => array('name'), //New file name {null, String, Array} *please read documentation in README.md
                'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
                'replace' => true, //Replace the file if it already exists  {Boolean}
                'perms' => null, //Uploaded file permisions {null, Number}
                'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
                'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
                'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
                'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
                'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
                'onRemove' => null //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
            ));



            if ($data['isComplete']) {
                $info = $data['data'];
                $mainImage = substr($info['files'][0], strrpos($info['files'][0], '/') + 1);

                $dataa = array(
                    'main_image' => $mainImage);


                $this->db->where('id', $adID);
                $this->db->update('car_info', $dataa);


                if ($ires == true and isset($info['files']) and ! empty($info['files']))
                    redirect ("Homepage/viewAd/".$adID);
                    //print "<h1>Well done</h1>";
            }


            if ($data['hasErrors']) {
                $errors = $data['errors'];
                print_r($errors);
            }
        }
    }

/////////////////////////////////////

    function updateAdForm($id)
    {

        $query = "select * from car_info where id =".$id;
        $data['car_info'] = $this->db->query($query)->result()[0];

        $data['fields'] = $this->db->list_fields('car_info');

        $this->session->carForUpdate = $id;

        $data['ad_customer'] = $this->car_model->get_ad_customer($id);
        $data['path'] = "assets/uploads/files/" . $data['ad_customer']->id . "/" . $id . "";
		$data['adId']=$id;
        $this->load->view("updateAd", $data);


    }
	
	function updateImages($id){



		$data['ad_customer'] = $this->car_model->get_ad_customer($id);
        $data['path'] = "assets/uploads/files/" . $data['ad_customer']->id . "/" . $id . "";
		$this->load->view("files", $data);
		
		
	}



    function updateAd() {





        //include(base_url()."assets/jQuery.filer/php/class.uploader.php");
        //$this->load->view("class.uploader");
        //$uploader = new Uploader();
        $this->form_validation->set_rules('car_title', 'Car Title', 'required');


        $this->validation();
        //  var_dump($this->form_validation->run());


        if ($this->form_validation->run() == FALSE) {
            $data['errors'] = "Errors";
            $data['post'] = $_POST;
            $this->load->view('addAd', $data);
        } else {

            $_POST['customer_id'] = $this->session->cust_id;
            unset($_POST['submit']);

            //$this->session->adData = $_POST;


            ////////////////

            $data['adData'] = $_POST;


            if (isset($data['adData'] ['purchase_type']) and is_array($data['adData'] ['purchase_type'])) {
                $str = "";
                foreach ($data['adData'] ['purchase_type'] as $value) {
                    if ($str == "")
                        $str = $value;
                    else
                        $str .= ',' . $value;


                }
                $data['adData']['purchase_type'] = $str;
                // exit;
            }


            //  var_dump($_FILES);
            //  var_dump(isset($_FILES['files']));
            //return;
            {


                // var_dump($this->session);
                // var_dump($query);
                //return;
                //$this->session->adData['customer_id'] = $this->session->cust_id;
                //   var_dump($this->session->adData);


                $this->db->where('id', $this->session->userdata['carForUpdate']);

                $res = $this->db->update('car_info', $data['adData']);
                if($res)
                    redirect("Homepage/viewAd/".$this->session->userdata['carForUpdate']);
                else
                    print "<div style='font-size:20px'>Update failed!</div>";

            }


        }
        return;
    }




///////////////////////////////////////


    function car() {

        $res = $this->db->list_fields('car_info');
        foreach ($res as $flied) {
            print "array(<br />'field'=>'" . $flied . "',<br />";
            print "'label'=>'" . ucwords(str_replace("_", " ", $flied)) . "', <br />";
            print "'rules'=>'required'<br />),<br /><br />";
        }
        //  var_dump($res);
    }

    function rename() {

        $str = "this_a_name.jpg";
        $name = substr($str, 0, strrpos($str, "."));
        $ext = substr($str, strrpos($str, "."));
        //  var_dump($name."   ".$ext);
    }

    public function validation() {

        $config = array(
            array(
                'field' => 'car_title',
                'label' => 'Car Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'body_condition',
                'label' => 'Body Condition',
                'rules' => 'required'
            ),
            array(
                'field' => 'technical_condition',
                'label' => 'Technical Condition',
                'rules' => 'required'
            ),
            array(
                'field' => 'mot',
                'label' => 'Mot',
                'rules' => 'required|date'
            ),
            array(
                'field' => 'tax',
                'label' => 'Tax',
                'rules' => 'required|date'
            ),
            array(
                'field' => 'make',
                'label' => 'Make',
                'rules' => 'required'
            ),
            array(
                'field' => 'model',
                'label' => 'Model',
                'rules' => 'required'
            ),
            array(
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required'
            ),
            array(
                'field' => 'currency',
                'label' => 'Currency',
                'rules' => 'required'
            ),
            /*
              array(
              'field'=>'purchase_type',
              'label'=>'Purchase Type',
              'rules'=>'required'
              ),
             */
            array(
                'field' => 'year',
                'label' => 'Year',
                'rules' => 'required|integer'
            ),
            array(
                'field' => 'mileage',
                'label' => 'Mileage',
                'rules' => 'required'
            ),
            array(
                'field' => 'fuel_type',
                'label' => 'Fuel Type',
                'rules' => 'required'
            ),
            array(
                'field' => 'engine_size',
                'label' => 'Engine Size',
                'rules' => 'required'
            ),
            array(
                'field' => 'fuel_consumption',
                'label' => 'Fuel Consumption',
                'rules' => 'required'
            ),
            array(
                'field' => 'acceleration',
                'label' => 'Acceleration',
                'rules' => 'required'
            ),
            /*
              array(
              'field'=>'gerbox',
              'label'=>'Gerbox',
              'rules'=>'required'
              ),
             */
            array(
                'field' => 'co2_emmision',
                'label' => 'Co2 Emmision',
                'rules' => 'required'
            ),
            array(
                'field' => 'no_of_doors',
                'label' => 'No Of Doors',
                'rules' => 'required'
            ),
            array(
                'field' => 'body_type',
                'label' => 'Body Type',
                'rules' => 'required'
            ),
            array(
                'field' => 'no_of_seats',
                'label' => 'No Of Seats',
                'rules' => 'required'
            ),
            array(
                'field' => 'insurance_group',
                'label' => 'Insurance Group',
                'rules' => 'required'
            ),
            array(
                'field' => 'tax_price',
                'label' => 'Tax Price',
                'rules' => 'required'
            ),
            array(
                'field' => 'colour',
                'label' => 'Colour',
                'rules' => 'required'
            ),
            array(
                'field' => 'small_description',
                'label' => 'Small Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'main_description',
                'label' => 'Main Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'evaluated_price',
                'label' => 'Evaluated Price',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
        $this->form_validation->set_message('required', '{field} is required.');
    }

}

?>