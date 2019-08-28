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

    public function getSongData($id){
      $query = $this->db->query("SELECT * FROM cancionacta WHERE link='$id'");
      $array = $query->result_array();
      return $array;
    }

    public function getActInfo($idAs){
      $query = $this->db->query("SELECT * FROM actividad WHERE idASig='$idAs'");
      $array = $query->result_array();
      return $array;
    }

    public function getActStatus($idAct){
      $query = $this->db->query("SELECT * FROM session WHERE idAct='$idAct'");
      $array = $query->result_array();
      $stat = false;
      if( $array != null){
        return $array;
      } else {
        return $stat;
      }
    }

    public function getActHistoria($asig, $grado){
      $query = $this->db->query("SELECT * FROM historiaactc WHERE idAsigHis='$asig' AND idGradHist='$grado'");
      $array = $query->result_array();
      return $array;
    }

    public function guardarActSession($porcentaje){
      $query = $this->db->insert('session',
       array(
      'idAct' => $this->session->userdata('idAct'),
      'idEst' => $this->session->userdata('id'),
      'porcentaje' => $porcentaje
      ));
      echo json_encode($query);
    }

    public function guardarHistoria($titulo, $texto){
      $query = $this->db->insert('historias',
       array(
      'título' => $titulo,
      'texto' => $texto
      ));
      echo json_encode($query);
    }
  }
?>
