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

    public function getTeachersList(){
      $query = $this->db->get('profesores');
      $array = $query->result_array();
      return array_reverse($array);
    }

    public function deleteuser($usuario){
      $query = $this->db->query("SELECT * FROM profesores WHERE usuarioProf='$usuario'");
      $row = $query->row_array();
      if (isset($row) && $row['estado']==="1") {
          $log = false;
          echo json_encode($log);
      }else if(isset($row) && $row['estado']==="2"){
        $this->db->delete('profesores', array('usuarioProf' => $usuario));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        $log = true;
        echo json_encode($log);
      }
    }

    public function modificarUser($data){
      $query = $this->db->where('usuarioProf', $data['usuario']);

      $datos = array(
          'nombreProf1' => $data['nombreProf1'],
          'nombreProf2' => $data['nombreProf2'],
          'apellidoProf1' => $data['apellidoProf1'],
          'apellidoProf2' => $data['apellidoProf2'],
          'identificacionProf' => $data['identificacionProf']);

      $query = $this->db->update('profesores', $datos);

      echo json_encode(true);
    }
  }
