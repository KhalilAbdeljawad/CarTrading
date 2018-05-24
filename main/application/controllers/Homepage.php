<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('session');


        $this->load->helper('cookie');

        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('directory');
        $this->load->model('car_model');
        /* ------------------ */
    }

    public function index()
    {


        if (get_cookie('cto') == '111') {
            $this->session->cust_id = get_cookie('iic');
            $this->session->cust_email = get_cookie('ecc');
            $this->session->cust_name = get_cookie('nni');
        }


        $data['lastCars'] = $this->car_model->get_last_4_cars();
        $data['topCars'] = $this->car_model->get_top_cars();
        // $data['customer'] = "";


        if (isset($this->session->userdata['cust_id'])) {
            $data['customer'] = $this->session->cust_id;
            $data['name'] = $this->session->cust_name;
        }
//        var_dump($data['topCars']);
//        var_dump($data['lastCars']);

        $data['makers'] = $this->db->query("select distinct make from vehiclemodelyear order by make")->result();

        $this->load->view('index', $data);
    }

    public function viewAd($car_id)
    {

        // update number of views

        $this->db->query("update car_info set views = views+1 where id = " . $car_id);
///////////////////////////////////

        $data['car_info'] = $this->car_model->get_ad($car_id);
        $data['ad_customer'] = $this->car_model->get_ad_customer($car_id);

        $data['images'] = (directory_map("assets/uploads/files/" . $data['ad_customer']->id . "/" . $car_id));
        natsort($data['images']);

        $data['path'] = "assets/uploads/files/" . $data['ad_customer']->id . "/" . $car_id . "/";
        $data['car_id'] = $car_id;

        $data['customer'] = $this->db->query("select * from customer where id =" . $data['car_info']->customer_id);


        $this->load->view('view_ad', $data);
    }

    ///////////////////////////////////// User Profile ////////////////////////////
    function userProfile($custId)
    {
        if (!isset($custId) or !is_int(intval($custId))) {
            redirect('Homepage');
            return;
        }


        if (!isset($this->session->userdata['cust_id']) or $this->session->userdata['cust_id'] != $custId) {
            redirect('Homepage');
            return;
        }


        $data['cust'] = $this->db->query("select * from customer where id=" . $this->session->userdata['cust_id'])->result()[0];


        $this->load->view('view_profile',$data);


    }






    function myAds()
    {


        if (!isset($this->session->userdata['cust_id']) ) {
            redirect('Homepage');
            return;
        }

        $_POST = $_GET;
        $query = "SELECT id, car_title, customer_id, main_image, views, likes FROM car_info WHERE customer_id = ".$this->session->userdata['cust_id'];


        $data['searchResult'] = $this->db->query($query)->result();
        $data['makers'] = $this->db->query("select distinct make from vehiclemodelyear order by make")->result();

        $data['customer'] = $this->session->cust_id;
        $data['name'] = $this->session->cust_name;
        $this->load->view('customerAds', $data);


    }



    //////////////////////////////////////////////////
    public function search()
    {
        //var_dump($_POST);

        $_POST = $_GET;
        $query = "SELECT id, car_title, customer_id, main_image, views, likes FROM car_info WHERE ";

        if ($_POST['make'] != 'any')
            $query .= " make = '" . $_POST['make'] . "' and ";

        if ($_POST['model'] != 'any')
            $query .= " model = '" . $_POST['model'] . "' and ";

        if ($_POST['minPrice'] != 'any')
            $query .= " price >= " . $_POST['minPrice'] . " and ";

        if ($_POST['maxPrice'] != 'any')
            $query .= " price <= " . $_POST['maxPrice'] . " and ";


        if ($_POST['mileage'] != 'any')
            $query .= " mileage >= " . ($_POST['mileage'] - 3000) . " and  mileage <= " . ($_POST['mileage'] + 3000) . " and ";

        $query .= " 1=1 ";

        //  print $query;
        $data['searchResult'] = $this->db->query($query)->result();
        $data['makers'] = $this->db->query("select distinct make from vehiclemodelyear order by make")->result();

        $data['customer'] = $this->session->cust_id;
        $data['name'] = $this->session->cust_name;
        $this->load->view('searchResult', $data);

        // redirect("Homepage/search");


    }


    public function likeAd($adId)
    {


        if (!isset($this->session->userdata['liked' . $adId])) {

            $this->db->query("update car_info set likes = likes+1 where id=" . $adId);
            $likes = $this->db->query("select likes from car_info where id=" . $adId)->result()[0]->likes;
            print $likes;
            $this->session->userdata['liked' . $adId] = true;
            // var_dump($this->session);
            // exit;
        } else print "false";

    }

    public function getModels($model)
    {


        $models = $this->db->query("select DISTINCT model from vehiclemodelyear where make='" . $model . "' order by model")->result();

        $str = "";

        print "<option value='any'>Model (any)</option>";


        foreach ($models as $model) {
            $str .= "<option value='" . $model->model . "'>" . $model->model . "</option>\n";
        }
        //var_dump($str);
        print $str;


    }

    public function enc($id)
    {
        $id = $id . "";
        $len = strlen($id);

        $text = "";
        for ($i = 0; $i < $len; $i++) {
            //  var_dump($i . '  ' . (int)($id[$i]));
            $text .= chr((((int)($id[$i]) + 4) ^ 65)); //
        }

        var_dump($len);
        $text = substr(strtoupper(md5($id)), 4, 15) . '' . $len . '' . substr(strtoupper(md5($text)), 10, 20)
            . '' . $text . '' . strtoupper(md5('pjhc'));
        var_dump($text);

        var_dump($len = substr($text, 15, 1));
        var_dump(substr($text, 16, 20));

        $text = substr($text, 36);
        var_dump($text);

        $dectext = "";
        for ($i = 0; $i < $len; $i++) {
            $dectext .= ((ord($text[$i]) - 4) ^ 65);
            var_dump(ord($text[$i]) . '  ' . $text[$i] . '  ' . $i . '    ' . ((ord($text[$i]) - $i) ^ 65));
        }

        var_dump($dectext);
    }

}
