<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Software extends CI_Controller {
 
 
 private $crud;
    function __construct()
    {
        parent::__construct();
 
 		
 
        $this->load->database();
		 $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
		
		$this->crud = new grocery_CRUD();
		//$this->needed_software();
    }
 
    public function index()
    {
    	print '<center><img src="'.base_url().'assets/images/logo.png" />';
        echo "<center><h1>Welcome to the world of LTNET Systems</h1>";//Just an example to ensure that we get into the function
        print "<a  href='".base_url()."software/ticket_sys/add'><h2>منظومة الدعم الفني</h2></a>";
		print "<a   href='".base_url()."software/needed_software/add'><h2>منظومة طلبات البرامج</h2></a>";
        //die();
    }
	
	public function employee()
    {
		$crud = new grocery_CRUD();
		$crud->set_subject("الأصناف");
        $crud->set_table('item');
		
		$crud->display_as('employee_name','اسم الموظف');
		$crud->display_as('employee_id','رقم الموظف');
		$crud->display_as('employee_username','اسم المستخدم');
		$crud->display_as('employee_pwd','كلمة المرور');
		$crud->display_as('management_id','الإدارة');
		$crud->display_as('division_id','القسم');
		$crud->display_as('employee_email','البريد الإلكتروني');
		$crud->display_as('employee_state_id','الوصف الوظيفي');
		//$crud->columns("TICKET", 'PRODUCT','PRICE');
		//$crud->fields("TICKET", 'LINE', 'product','price');
		//$crud->set_relation('management_id','management','management_name');
		//$crud->set_relation('employee_state_id','employee_state','employee_state_name');
        $output = $crud->render();
		//$this->to_view($output);
		
		return $output;        
 		
      /*  echo "<pre>";
        print_r($output);
        echo "</pre>";
        die();
		*/
    }


	public function needed_software()
    {
		$this->item();
	//	$this->bill();
    }
	
	function to_view($output = null)
 
    {
        $this->load->view('crud_viewer.php',$output);    
    }
	
	
	
	public function item(){
		$crud = $this->crud;
		$crud->set_subject("الأصناف");
        $crud->set_table('item');
		$crud->display_as('code','الكود');
		$crud->display_as('sizes','الأرقام');
		$crud->display_as('room','غرفة التخزين');
		$crud->display_as('note','ملاحظات');
	//	$crud->columns('employee_id', 'software_name','software_description');
		//$crud->fields("TICKET", 'LINE', 'product','price');
		
		$crud->unset_back_to_list();
		
		$crud->callback_add_field('employee_id_by_ip', function () {
			$res = $this->db->query("select employee_id from employee where employee_ip ='".$this->get_ip_address()."'");
			$res = $res->result();
			//var_dump($res);
			//var_dump($this->get_ip_address());
			//var_dump($this->get_ip_address());
			if(isset($res[0])){
				$name = $res[0]->employee_id;
				return '<input type="hidden" maxlength="50" value="'.$name.'" name="employee_id_by_ip">';
			}
        return '';// <input type="hidden" maxlength="50" value="" name="phone">';
    });
	
		//$crud->add_fields('employee_id','needed_software','software_description');
		$crud->set_relation('room','room','name');
		//$crud->set_relation('employee_id_by_ip','employee','employee_name');
		
		//if($this->get_ip_address()!="127.0.0.1" and $this->get_ip_address()!="::1" and $this->get_ip_address()!="172.16.10.59" and $this->get_ip_address()!="172.16.10.69")
         //$crud->unset_list();
        
		/*
		try{
    $crud->render();
} catch(Exception $e) {
    show_error($e->getMessage());
}*/
    //$crud->set_theme('datatables');
    
   ///////////////
    $crud->callback_after_insert(function(){
    	print "<script type='text/javascript'>alert('شكرا،، تم إرسال طلبك');</script>";
    });
	//////////////////////////
        $output = $crud->render();
		
		$this->to_view($output);
		//return $output;        
	}
	
	public function  bill(){
		$crud = new grocery_CRUD();
		//$crud = $this->crud;
		$crud->set_subject("الفواتير");
        $crud->set_table('bill');
		$crud->display_as('code','الكود');
		$crud->display_as('sizes','الأرقام');
		$crud->display_as('room','غرفة التخزين');
		$crud->display_as('note','ملاحظات');
	//	$crud->columns('employee_id', 'software_name','software_description');
		//$crud->fields("TICKET", 'LINE', 'product','price');
		
		$crud->unset_back_to_list();
		
		$crud->callback_add_field('employee_id_by_ip', function () {
			$res = $this->db->query("select employee_id from employee where employee_ip ='".$this->get_ip_address()."'");
			$res = $res->result();
			//var_dump($res);
			//var_dump($this->get_ip_address());
			//var_dump($this->get_ip_address());
			if(isset($res[0])){
				$name = $res[0]->employee_id;
				return '<input type="hidden" maxlength="50" value="'.$name.'" name="employee_id_by_ip">';
			}
        return '';// <input type="hidden" maxlength="50" value="" name="phone">';
    });
	
		//$crud->add_fields('employee_id','needed_software','software_description');
		//$crud->set_relation('room','room','name');
		//$crud->set_relation('employee_id_by_ip','employee','employee_name');
		
		//if($this->get_ip_address()!="127.0.0.1" and $this->get_ip_address()!="::1" and $this->get_ip_address()!="172.16.10.59" and $this->get_ip_address()!="172.16.10.69")
         //$crud->unset_list();
        
		/*
		try{
    $crud->render();
} catch(Exception $e) {
    show_error($e->getMessage());
}*/
    //$crud->set_theme('datatables');
    
   ///////////////
    $crud->callback_after_insert(function(){
    	print "<script type='text/javascript'>alert('شكرا،، تم إرسال طلبك');</script>";
    });
	//////////////////////////
        $output = $crud->render();
		
		$this->to_view($output);
	
	return $output;
	//
	        
	}
	 /**
  * Retrieves the best guess of the client's actual IP address.
  * Takes into account numerous HTTP proxy headers due to variations
  * in how different ISPs handle IP addresses in headers between hops.
  */
 public function get_ip_address() {
  // Check for shared internet/ISP IP
  if (!empty($_SERVER['HTTP_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_CLIENT_IP']))
   return $_SERVER['HTTP_CLIENT_IP'];

  // Check for IPs passing through proxies
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   // Check if multiple IP addresses exist in var
    $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    foreach ($iplist as $ip) {
     if ($this->validate_ip($ip))
      return $ip;
    }
   }
  
  if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED']))
   return $_SERVER['HTTP_X_FORWARDED'];
  if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
   return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
  if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
   return $_SERVER['HTTP_FORWARDED_FOR'];
  if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED']))
   return $_SERVER['HTTP_FORWARDED'];

  // Return unreliable IP address since all else failed
  return $_SERVER['REMOTE_ADDR'];
 }

 /**
  * Ensures an IP address is both a valid IP address and does not fall within
  * a private network range.
  *
  * @access public
  * @param string $ip
  */
 public function validate_ip($ip) {
     if (filter_var($ip, FILTER_VALIDATE_IP, 
                         FILTER_FLAG_IPV4 | 
                         FILTER_FLAG_IPV6 |
                         FILTER_FLAG_NO_PRIV_RANGE | 
                         FILTER_FLAG_NO_RES_RANGE) === false)
         return false;
     self::$ip = $ip;
     return true;
 }
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */
 
 