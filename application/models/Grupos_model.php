<?php

Class Grupos_model extends CI_Model {

    public function __construct() {
        $connection = $this->load->database();
    }

    public function get_grupos($idGrado){
      $query = $this->db->query("SELECT * FROM grupos WHERE idGradosGrup='$idGrado'");
      echo $idGrado;
      $array = $query->result_array();
      return array_reverse($array);
    }
}
?>
