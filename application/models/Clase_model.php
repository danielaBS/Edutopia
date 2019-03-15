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

    public function registerclass($data){
      $query = $this->db->insert('clase',
      $data = array(
        "nombreClase" =>  $data['nombreClase'],
        "descripcionClase" =>  $data['descripcionClase'],
      ));
      echo json_encode($query);
    }

}
?>
