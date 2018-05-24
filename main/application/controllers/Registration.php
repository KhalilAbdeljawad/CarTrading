<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller
{


    function __construct()
    {
        parent::__construct();


        $this->load->database();
        $this->load->helper('url', 'email', 'file');

        $this->load->helper('cookie');
        
        
        $this->load->library('session');

        $this->load->model('m_registration');
        /* ------------------ */

    }

    public function index()
    {

        $this->load->view('registration/index.php');
    }

    /////////////////////////////
    public function signUp()
    {

        //$_POST = $_GET;

        //print (isset($_POST['email'])?1:0 .'  '. isset($_POST['password'])?1:0 .'  '. empty($_POST['email'])?0:1 .'  '. empty($_POST['password'])?0:1);



        if(
            !isset($_POST['email']) || !isset($_POST['password']) || empty($_POST['email']) || empty($_POST['password'])
            || !isset($_POST['first_name']) || !isset($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['last_name'])
            || !isset($_POST['password2']) or empty($_POST['password2']) or ($_POST['password'] != $_POST['password2'])
        ) {
            $this->load->view('registration/sign-up.php');
         //    var_dump($_POST);
        }

        else{

        //$_POST = $_GET;
        unset($_POST['submit']);
        unset($_POST['password2']);
        $_POST['pwas'] = $_POST['password'];
        unset($_POST['password']);
        $_POST['account_status'] = 'inactive';
        //var_dump($_POST);
//        return;


            $result = $this->m_registration->signUp($_POST);
            
            
            if(empty($result) || !is_bool($result) || $result!=true){
                if($result == 'email_existed'){
                  //  var_dump($result);
                    //return;
                    $data['popup']=2; // email_existed
                //    var_dump($data);
//return ;
                    $data['result'] = $result;
              //      $data['data']=$data;
                    $this->load->view('registration/sign-up.php', $data);
                    return;

                }
                
         
                $data['popup']=1;
                $data['result'] = $result;
                $this->load->view('registration/sign-up.php', $data);

            }
            elseif($result == true) {
                $data['popup']=1;
                $this->load->view('registration/sign-up.php', $data);
//                redirect("Homepage");
                //$this->load->view(Registration/result.php, $data);//

                //var_dump($this->session);
                //$data['data'] = "OK man";
            }

        }

    }


    public function signin()
    {

        //$_POST = $_GET;

        //var_dump($_POST);
        //return;
        if(!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password']))
            $this->load->view('registration/sign-in.php');

        else{



            $result = $this->m_registration->signIn($_POST['email'], $_POST['password']);

            if(empty($result)){

                $data['popup']=1;
                $this->load->view('registration/sign-in.php', $data);

            }
            else {
                $data['data'] = $result[0];
              //  var_dump($data['data']);
                
                $this->session->cust_id = $data['data']->id;
                $this->session->cust_email = $data['data']->email;
                $this->session->cust_name = $data['data']->first_name;
                
                if(isset($_POST['rememberme']) and $_POST['rememberme']=='on'){
                    set_cookie('cto', '111', 0);
                    set_cookie('iic', $data['data']->id, 0);
                    set_cookie('ecc', $data['data']->email, 0);
                    set_cookie('nni', $data['data']->first_name, 0);
                }
                redirect("Homepage");
                //$this->load->view(Registration/result.php, $data);//

                //var_dump($this->session);
                //$data['data'] = "OK man";
            }

        }

    }

    public function signOut(){
        //$this->session = null;
        $this->session->sess_destroy();
        unset($this->session->userdata);
        unset($this->session);
        
        delete_cookie('cto');
        delete_cookie('iic');
        delete_cookie('ecc');
        delete_cookie('nni');
               
        
        redirect('Homepage');
    }

    public function reset_password(){

        
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        if(!$email){
            //$msg['data'] = $email;
            $this->load->view('registration/password_reset.php');
            //print '{"msg":"2"}'; //empty email
        }

        else{

            if((bool) filter_var($email, FILTER_VALIDATE_EMAIL))
            {


                $existed = $this->m_registration->email_existed($email);
                
                
               // print '{"msg":"'.$existed.'"}'; 
              //  return;
                
                
                if(!empty($existed)){
               // mail($email, "Car Trading - Password Reset", "Click this link to reset your password");

                $this->session->custoId = $this->m_registration->getIdByEmail($email);
                
                print '{"msg":"1"}'; //sent
                 }
                 else{
                     print '{"msg":"4"}'; // email is not existed
                 }
            }else{
                print '{"msg":"3"}'; // invalid email
            }


            //var_dump($email);
        }

    }


    public function end_reset_password(){

        //$email = isset($_POST['email']) ? $_POST['email'] : false;

            $this->load->view('registration/end_password_reset.php');


    }

    public function jq()
    {

        $this->load->view('jq');
    }


}

?>