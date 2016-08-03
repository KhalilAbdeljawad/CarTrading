<?php
class Pos_model extends CI_Model {

    private $table = 'item';

    function __construct() {
        parent::__construct();
    }

    function list_all() {
        $this -> db -> order_by('id', 'asc');
        return $this -> db -> get($this->table);
    }

    function count_all() {
        return $this -> db -> count_all($this -> table);
    }

    function getQuery($query) {
        return $this -> db -> query($query) -> result();
    }

    function get_paged_list($limit = 10, $offset = 0) {
        $this -> db -> order_by('id', 'asc');
        return $this -> db -> get($this->table, $limit, $offset);
    }

    function get_by_id($id) {
        $this -> db -> where('id', $id);
        return $this -> db -> get($this -> table);
    }

    function save($table, $row) {
        //	var_dump($document);
        $this -> db -> insert($table, $row);
        return $this -> db -> insert_id();
    }

    function update($id, $row) {
        $this -> db -> where('id', $id);
        return $this -> db -> update($this -> table, $row);
    }

    function delete($id) {
        $this -> db -> where('doc_id', $id);
        $this -> db -> delete($this -> table);
    }

    function get_doc_persons($doc_id) {

        $query = "select  emp1.employee_name  as 'doc_from' , emp2.employee_name as 'doc_to', emp3.employee_name as doc_place, emp3.employee_id as doc_place_emp_id
                   from employee as emp1, employee as emp2  , employee as emp3, document as doc,  document_track as dt
                   where   emp1.employee_id= doc.document_from and emp2.employee_id = doc.document_to
					and doc.document_id = " . $doc_id . "
					and emp3.employee_id = dt.document_place 
					and dt.document_id = doc.document_id 
					and dt.track_id = (select max(document_track.track_id) from document_track where document_track.document_id = " . $doc_id . "  );";
        //
        $query = $this -> db -> query($query) -> result();
        //var_dump($query[0]);
        return $query[0];
    }

    function get_item_by_code($code) {
        $query = "SELECT `names`.name_, item.id, price FROM `item`, `names`
        WHERE code ='" . $code . "' AND `names`.id = item.name_;";

        $data = $this -> db -> query($query) -> result();
        return $data[0];
    }

    function get_item_by_id($id) {
        $query = "SELECT `names`.name_, item.id, price FROM `item`, `names`
        WHERE item.id ='" . $id . "' AND `names`.id = item.name_;";

        $data = $this -> db -> query($query) -> result();
        if(empty($data)) return "ERROR";
        return $data[0];
    }

    function save_bill($data){


        $this->db->trans_start();

        $status = "done";

        if($data['remainder']!=0)
            $status = "suspended";

        $insertData=array(
            'user' => 1,
            'total_price' => $data['total_price'],
            'discount' => $data['discount'],
            'after_discount' => $data['after_discount'],
            'paid' => $data['paid'],
            'remainder' => $data['remainder'],
            'status' => $status

        );

        $this->db->insert('bill', $insertData);

        $bill_id = $this->db->insert_id();

        $insertData = array();

        foreach ($_POST['items'] as $key => $value) {
            foreach ($value as $k => $val) {
                $insertData[$key][$k] = $val;
            }
            $insertData[$key]['bill'] = $bill_id;
            $this->db->insert('bill_element', $insertData[$key]);
        }


        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
            return 'FALSE';


        return "TRUE";

    }

    function get_doc_type_by_id($type_id){

        $query = "SELECT type_name as doc_type FROM `document_type` where type_id = ".$type_id;
        $data = $this -> db -> query($query) -> result();
        return $data[0] -> doc_type;
    }
    function get_doc_types($emp_level) {
        $query = "select document_type.type_id, type_name from document_type, level_type where
document_type.type_id = level_type.type_id and
 emp_level = ".$emp_level.";";
        $data = $this -> db -> query($query) -> result();

        return $data;
    }


    function get_doc_track($doc_id) {
        $query = "SELECT * FROM `document_track` as dt WHERE dt.document_id = " . $doc_id." order by track_date asc, track_time asc";
        $data = $this -> db -> query($query) -> result();
        //var_dump($this->db->last_query());
        //var_dump($data);
        for($i = 0; $i<count($data); $i++){
            //var_dump($data[$i]->document_place);
            $data[$i]->document_from = $data[$i]->document_from."|".$this->employee_model->get_emp_name_state($data[$i]->document_from);
            $data[$i]->document_place = $this->employee_model->get_emp_name_state($data[$i]->document_place);
        }

        return $data;
    }

    function save2($document){
        //	var_dump($document);
        //$query = "insert into document (document_id, doc_title ,doc_text, keywords, document, attachment,  document_from, document_to, creation_date, creation_time, document_place, fromhashcode, tohashcode, serialhashcode, yearhashcode, doc_class, doc_type) values(";
        $this->db->insert('document', $document);
        //$this->db->insert($this->tbl_document, $document);
        return $this->db->insert_id();

    }


    function get_doc_text($doc_id){

        $query = "SELECT doc_title, doc_text FROM `document` where document_id = ".$doc_id;
        $data = $this -> db -> query($query) -> result();
        $arr = array();
        $arr[]=$data[0] -> doc_title;
        $arr[]=$data[0] -> doc_text;

        return $arr;

    }


    function get_managers_docs(){

        $query = "SELECT document_id, document, creation_date, doc_title, document_from, document_to, hashcode, IF(seen = \"no\", \"لا\", \"نعم\")  as seen FROM document 
WHERE document.document_from in (SELECT employee_id FROM `employee`, `employee_level` ,employee_state

WHERE employee.employee_state_id = employee_state.employee_state_id 
			AND employee_state.employee_level_id = employee_level.employee_level_id and employee_level.employee_level_id <=4
			)
 
AND document.document_to in (SELECT employee_id FROM `employee`, `employee_level` ,employee_state

WHERE employee.employee_state_id = employee_state.employee_state_id 
			AND employee_state.employee_level_id = employee_level.employee_level_id and employee_level.employee_level_id <=4
			)";


        $data = $this->db->query($query);
        //var_dump($data);
        return $data;
    }


    function get_all_docs(){

        $query = "SELECT document_id, document, creation_date,  type_name as doc_type, doc_title, document_from, document_to, hashcode, IF(seen = \"no\", \"لا\", \"نعم\")  as seen FROM document , document_type where doc_type = type_id";


        $data = $this->db->query($query);

        return $data;
    }

}
?>