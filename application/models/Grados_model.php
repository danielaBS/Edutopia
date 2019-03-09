<?php

Class Grados_model extends CI_Model {

    public function __construct() {
        $connection = $this->load->database();
    }

    public function getGradosList(){
      $query = $this->db->get('grado');
      $array = $query->result_array();
      return $array;
    }
  }
?>
