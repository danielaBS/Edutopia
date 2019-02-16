<?php

Class Profesor_model extends CI_Model {

    public function __construct() {
        $connection = $this->load->database();
    }

    public function get_profesor($id= FALSE, $user = FALSE, $passwd = FALSE) {
        if ($user !== "") {
            $query = $this->db->query("SELECT * FROM profesores WHERE usuarioProf='$user'");
            $row = $query->row_array();
            if (isset($row) && $passwd === $row['contraseñaProf'] && $id === $row['identificacionProf']) {
                $log = true;
                echo($row['estado']);
                echo json_encode($log);
            }
        }
    }
    public function registerUser($data){
      $query = $this->db->insert('profesores',
       array(
      'nombreProf1' => $data['nombreProf1'],
      'nombreProf2' => $data['nombreProf2'],
      'apellidoProf1' => $data['apellidoProf1'],
      'apellidoProf2' => $data['apellidoProf2'],
      'estado' => $data['estado'],
      'usuarioProf' => $data['usuarioProf'],
      'contraseñaProf' => $data['contraseñaProf'],
      'identificacionProf' => $data['identificacionProf']
      ));
      echo json_encode($query);
    }
}
