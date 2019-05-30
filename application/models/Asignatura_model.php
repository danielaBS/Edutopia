<?php

Class Asignatura_model extends CI_Model {

    public function __construct() {
        $connection = $this->load->database();
    }

    public function getStudentAsig($idGrad){
      $query = $this->db->query("SELECT idAsignatura FROM pensum WHERE idGrado='$idGrad'");
      $array = $query->result_array();
      return $array;
    }

    public function getNameAsig($idAsig){
      $query = $this->db->query("SELECT * FROM asignaturas WHERE idAsignatura='$idAsig'");
      $row = $query->row_array();
      return $row;
    }

    public function getSongA(){
      $id = $this->session->userdata['idASig'];
      $query = $this->db->query("SELECT * FROM cancionacta WHERE idAsign='$id'");
      $array = $query->result_array();
      return $array;
    }
  }
?>
