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
            else print '{"name":"'.$item->name_ .'", "id":'.$item->id.', "price":'.$item->price.', "quantity":'.$item->quantity.'}';
        }else{
            print '{"msg":"ERROR"}';
        }
    }


    function save_bill(){


     //  print_r($_POST);


        $result = $this->pos_model->save_bill($_POST);



        echo '{"result":"'.$result.'"}';

//        print "Sent json = ".$json;
    }



    function test(){
        print '{"msg":"you sent to me: '.$_POST["id"].'   with name '.$_POST["name"].'"}';
    }


    function print_receipt(){

        $this->load->view('receipt');

    }


    function bills(){
        $this->load->view("bills");
    }

    function get_bills($limit=100){
        print $this->pos_model->get_bills($limit);
    }


    function get_bill_elements($bill_id){
        if(isset($bill_id)) {
            $elem = $this->pos_model->get_bill_element($bill_id);
            if($elem=="ERROR") print '{"msg":"ERROR"}';
            print $elem;
            //else print '{"item":"'.$elem->item .'", "price":'.$elem->price.', "quantity":'.$elem->quantity.'}';
        }else{
            print '{"msg":"ERROR"}';
        }
    }








}

?>