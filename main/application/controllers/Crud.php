<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Crud extends CI_Controller {
 
 
 private $crud;
    function __construct()
    {
        parent::__construct();



        $this->load->library('session');
 
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
	
	
	
	public function car_trade(){
		$crud = $this->crud;
       // $crud->set_theme('datatables');
        $crud->set_subject("Car Inforamtion");
        $crud->set_table('car_info');


        $crud->required_fields('main_image','body_condition', 'technical_condition', 'mot', 'tax',
            'make', 'model', 'price', 'year', 'mileage', 'engine_size',
             'title');

        //////////////////////////////////////////
        // Fields need not to be shown:
        $crud->field_type('likes', 'hidden', '');
        $crud->field_type('dislikes', 'hidden', '');
        $crud->field_type('views', 'hidden', '');
        $crud->field_type('currency', 'hidden', '');
        //////////////////////////////////////////

        $crud->set_field_upload('main_image','assets/uploads/files');
        
        $crud->set_field_upload('image2','assets/uploads/files');
        $crud->set_field_upload('image3','assets/uploads/files');
        $crud->set_field_upload('image4','assets/uploads/files');
        $crud->set_field_upload('image5','assets/uploads/files');
        $crud->set_field_upload('image6','assets/uploads/files');
        $crud->set_field_upload('image7','assets/uploads/files');
        $crud->set_field_upload('image8','assets/uploads/files');
        $crud->set_field_upload('image9','assets/uploads/files');
        $crud->set_field_upload('image10','assets/uploads/files');
        $crud->set_field_upload('image11','assets/uploads/files');
        $crud->set_field_upload('image12','assets/uploads/files');
        

        /*

		$crud->display_as('code','الكود');
		$crud->display_as('sizes','الأرقام');
		$crud->display_as('room','غرفة التخزين');
		$crud->display_as('note','ملاحظات');
        $crud->display_as('price','السعر');
        $crud->display_as('name_','النوع');
        $crud->display_as('quantity','الكمية');
		*/
	//	$crud->columns('employee_id', 'software_name','software_description');
		//$crud->fields("TICKET", 'LINE', 'product','price');
		
		$crud->unset_back_to_list();


        $crud->set_lang_string('insert_success_message',
            'Your Ad has been added successfully.<br/>Please wait while you are redirecting to the list page.
		 <script type="text/javascript">
              window.location = "'.site_url().'"; // strtolower(__CLASS__).\'/\'.strtolower(__FUNCTION__)
		 </script>
		 <div style="display:none">
		 '
        );



      //  $crud->callback_after_insert(array($this, '_item_after_insert'));


        //$crud->add_fields('employee_id','needed_software','software_description');
	//	$crud->set_relation('room','room','name');
    //  $crud->set_relation('name_','names','name_');
		//$crud->set_relation('employee_id_by_ip','employee','employee_name');
		
		//if($this->get_ip_address()!="127.0.0.1" and $this->get_ip_address()!="::1" and $this->get_ip_address()!="172.16.10.59" and $this->get_ip_address()!="172.16.10.69")
         //$crud->unset_list();
         //$crud->unset_edit();

		/*
		try{
    $crud->render();
} catch(Exception $e) {
    show_error($e->getMessage());
}*/
    //$crud->set_theme('datatables');
    
   ///////////////
/*
    $crud->callback_after_insert(function(){

    	print "<script type='text/javascript'>alert('شكرا،، تم إرسال طلبك');</script>";
    });*/
	//////////////////////////
        $output = $crud->render();
		
		$this->to_view($output);
		//return $output;        
	}


    public function category1(){
        $crud = $this->crud;
        // $crud->set_theme('datatables');
        $crud->set_subject("Car Category 1");
        $crud->set_table('car_category1');




   $output = $crud->render();

        $this->to_view($output);
        //return $output;
    }



    public function category2(){
        $crud = $this->crud;
        // $crud->set_theme('datatables');
        $crud->set_subject("Car Category 2");
        $crud->set_table('car_category2');




        $output = $crud->render();

        $this->to_view($output);
        //return $output;
    }



    public function category3(){
        $crud = $this->crud;
        // $crud->set_theme('datatables');
        $crud->set_subject("Car Category 3");
        $crud->set_table('car_category1');




        $output = $crud->render();

        $this->to_view($output);
        //return $output;
    }



    function _item_after_insert($post_array,$primary_key){
        //print "<script type='text/javascript'>alert('شكرا،، تم إرسال طلبك');</script>";
        //header("Location: http://khalil.tech/number=".$post_array['code']);
        //print "<script>window.location='http://khalil.tech/number=".$post_array['code']."'</script>";

        //exit;
        foreach ($post_array as $key => $value)
        file_put_contents("data___.txt", $key.' = '.$value, FILE_APPEND);
        file_put_contents("data___2.txt", $primary_key);
        var_dump($post_array);
        var_dump($primary_key);

    }

	public function  bill(){
		$crud = new grocery_CRUD();
		//$crud = $this->crud;
		$crud->set_subject("الفواتير");
        $crud->set_table('bill');
		$crud->display_as('_date','التاريخ');
		$crud->display_as('_time','الوقت');
		$crud->display_as('user','المستخدم');
		$crud->display_as('total_price','الإجمالي');
        $crud->display_as('discount','قيمة التخفيض');
        $crud->display_as('after_discount','الإجمالي بعد التخفيض');
        $crud->display_as('paid','المدفوع');
        $crud->display_as('remainder','المتبقي');
        $crud->display_as('status','حالة الفاتورة');
	//	$crud->columns('employee_id', 'software_name','software_description');
		//$crud->fields("TICKET", 'LINE', 'product','price');

		//$crud->unset_back_to_list();

	
		//$crud->add_fields('employee_id','needed_software','software_description');
		//$crud->set_relation('room','room','name');
		//$crud->set_relation('employee_id_by_ip','employee','employee_name');

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

        //$crud2 = $this->bill_itmes();
	//////////////////////////
        $output = $crud->render();
		
		$this->to_view($output);

        //$crud->add_action('Bill Element', '', 'coba/employee');
        $crud->add_action('Detail', '', '','',array($this,'for_items'));


        return $output;
	//
	        
	}


    public function for_items($itemCode){

        $crud = new grocery_CRUD();
        $crud->set_table('bill_element');
        $crud->where('id', $itemCode);

        //$crud->callback_before_insert(array($this,'before_insert_employee'));

        $output = $crud->render();
        $this->to_view($output);

    }


    public function bill_items(){
        $crud = $this->crud;
        $crud->set_subject("الأ صناف");
        $crud->set_table('bill_element');
        $crud->display_as('code','الكود');
        $crud->display_as('sizes','الأرقام');
        $crud->display_as('room','غرفة التخزين');
        $crud->display_as('note','ملاحظات');
        $crud->display_as('price','السعر');
        $crud->display_as('name_','النوع');
        $crud->display_as('quantity','الكمية');
        //	$crud->columns('employee_id', 'software_name','software_description');
        //$crud->fields("TICKET", 'LINE', 'product','price');

//        $crud->unset_back_to_list();


        //$crud->add_fields('employee_id','needed_software','software_description');
        //$crud->set_relation('room','room','name');
        //$crud->set_relation('name_','names','name_');
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

//        return $crud;
        $output = $crud->render();

        $this->to_view($output);
        //return $output;
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
 
 