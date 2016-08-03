<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Handle_pos extends CI_Controller
{


    function __construct()
    {

//        print "<html><body>";

        parent::__construct();

        //$this->emp_level = $this->session->userdata('emp_level');

        ////
        $this->load->database();
        // load library

        // load helper
        $this->load->helper(array('form', 'url', 'html'));
        //$userId = $this -> session -> userdata('user_id');

        $this->load->model('pos_model');



    }

    function index()
    {

        if(isset($_POST['item_id'])) {
            $item = $this->pos_model->get_item_by_id($_POST['item_id']);
            if($item=="ERROR") print '{"msg":"ERROR"}';
            else print '{"name":"'.$item->name_ .'", "id":'.$item->id.', "price":'.$item->price.'}';
        }else{
            print '{"msg":"ERROR"}';
        }

    }

    function get_item($item_id){
        if(isset($item_id)) {
            $item = $this->pos_model->get_item_by_id($item_id);
            if($item=="ERROR") print '{"msg":"ERROR"}';
            else print '{"name":"'.$item->name_ .'", "id":'.$item->id.', "price":'.$item->price.'}';
        }else{
            print '{"msg":"ERROR"}';
        }
    }


    function save_bill(){


        print_r($_POST);




/*
        if(isset($_POST['discount']) and trim($_POST['discount'])!=""){
            $discount  = $_POST['discount'];

            if(strpos($discount, "%")){
                $discount=substr($discount, 0, strpos($discount, "%"));
                if($discount!="0")
                    $totalPrice = $totalPrice - $discount/100*$totalPrice;
            }else{
                $totalPrice = $totalPrice-$discount;
            }


        }
*/
        $insertedId = $this->pos_model->save_bill($_POST);



        echo $insertedId;

//        print "Sent json = ".$json;
    }



    function test(){
        print '{"msg":"you sent to me: '.$_POST["id"].'   with name '.$_POST["name"].'"}';
    }
}

?>