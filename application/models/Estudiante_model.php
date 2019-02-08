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

}
