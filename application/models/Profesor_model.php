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
    public function registerUser($profile, $id, $firstName, $middleName, $apellidoUno, $apellidoDos, $grado){

    }

    private function generateUsername($firstName, $middleName, $lastName){

    }

}
