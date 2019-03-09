<?php

Class Clase_model extends CI_Model {

    public function __construct() {
        $connection = $this->load->database();
    }

    public function get_clases(){
      $query = $this->db->get('clase');
      $array = $query->result_array();
      return array_reverse($array);
    }
}
?>
