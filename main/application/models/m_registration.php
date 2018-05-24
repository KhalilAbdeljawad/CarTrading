<?php

/**
 * Created by PhpStorm.
 * User: Khalil
 * Date: 9/13/2016
 * Time: 8:20 PM
 */
class m_registration extends CI_Model
{

    private $table = 'customer';

    function __construct()
    {
        parent::__construct();



    }

    function signIn($email, $passw){

        //$query = "SELECT * FROM customer WHERE email='$email' AND pwas='$passw'";


        if($this->email_existed($email)!=null) {
            $result = $this->db->get_where('customer', array('email' => $email, 'pwas' => $passw))->result();
            //$result = $this->db->query($query)->result();

            return $result;
        }

        return false;



    }



    function signUp($data){

        //$query = "SELECT * FROM customer WHERE email='$email' AND pwas='$passw'";


        if($this->email_existed($data['email'])!=null)
            return 'email_existed';

        else{


  //          $sql = $this->db->set($data)->get_compiled_insert('customer');
//return $sql;
            $result = $this->db->insert('customer', $data);
            //$result = $this->db->query($query)->result();

//            return null;
            return $result;
        }

        //return false;



    }

    function email_existed($email){


        $this->db->select('email');
        $result = $this->db->get_where('customer', array('email' => $email))->result();
        //$result = $this->db->query($query)->result();
     //   file_put_contents ('file.txt', json_encode($result[0]));
        
        return $result;

    }

    
    
    function getIdByEmail($email){


        $this->db->select('id');
        $result = $this->db->get_where('customer', array('email' => $email))->result()[0]->id;
        //$result = $this->db->query($query)->result();
     //   file_put_contents ('file.txt', json_encode($result[0]));
        
        return $result;

    }



    function list_all()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get($this->table);
    }
}