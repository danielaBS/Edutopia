<?php

Class Estudiante_model extends CI_Model {

    public function __construct() {
        $connection = $this->load->database();
    }

    public function get_student($id= FALSE, $user = FALSE, $passwd = FALSE) {
        if ($user !== "") {
            $query = $this->db->query("SELECT * FROM estudiante WHERE usuarioEst='$user'");
            $row = $query->row_array();

            if (isset($row) && $passwd === $row['contraseñaEst'] && $id === $row['identificacionEst']) {
                $log = true;
                echo json_encode($log);
            }
        }
    }
    public function registerUser($dataE){
      $query = $this->db->insert('estudiante',
       array(
      'nombreEst1' => $dataE['nombreEst1'],
      'nombreEst2' => $dataE['nombreEst2'],
      'apellidoEst1' => $dataE['apellidoEst1'],
      'apellidoEst2' => $dataE['apellidoEst2'],
      'idGrad' => $dataE['idGrad'],
      'usuarioEst' => $dataE['usuarioEst'],
      'contraseñaEst' => $dataE['contraseñaEst'],
      'identificacionEst' => $dataE['identificacionEst']
      ));
      echo json_encode($query);
    }
    public function getStudentsList(){
      $query = $this->db->get('estudiante');
      return $query->result_array();
    }
}
