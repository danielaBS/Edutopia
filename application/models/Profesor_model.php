<?php

Class Profesor_model extends CI_Model {

    public function __construct() {
        $connection = $this->load->database();
    }

    public function get_profesor($id= FALSE, $user = FALSE) {
        if ($user !== "") {
            $query1 = $this->db->query("SELECT * FROM profesores WHERE usuarioProf='$user'");
            $query2 = $this->db->query("SELECT * FROM profesores WHERE identificacionProf='$id'");
            $row1 = $query1->row_array();
            $row2 = $query2->row_array();
            $row;

            if($row1===$row2){
              $row = $query1->row_array();
            }

            if(isset($row)){
              if ($id === $row['identificacionProf'] && $row['estado']==="1") {
                $log = false;
                echo json_encode($log);
              }else if($id === $row['identificacionProf'] && $row['estado']==="2"){
                if($row['firstLog']==="0"){
                  $log = true;
                  echo json_encode($log);
                }else if ($row['firstLog']==="1"){
                  $log = false;
                  echo json_encode($log);
                }
              }
              //cache del inicio del sesión
              $dataSession = array(
                'usuario' => $row['usuarioProf'],
                'contraseña' => $row['contraseñaProf'],
                'estado' => $row['estado']
              );

              $this->session->set_userdata($dataSession);
            }else{
              echo json_encode(0);
            }
        }
    }
    public function get_profesor2($id= FALSE, $user = FALSE, $passwd = FALSE) {
      $passProf = $passwd;
        if ($user !== "") {
            $query = $this->db->query("SELECT * FROM profesores WHERE usuarioProf='$user'");
            $row = $query->row_array();
            if (isset($row) && $id === $row['identificacionProf']) {
                $log = true;
                echo($row['estado']);
                echo json_encode($log);
                echo($row['contraseñaProf']);
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

    public function modificarUser($data, $password= false, $logged= false){
      if ($data===null){
        $query = $this->db->where('usuarioProf', $this->session->userdata('usuario'));
        $datos = array(
          'firstLog' => true,
          'contraseñaProf' => $password
        );

        if($this->session->userdata('estado')==="1"){
          echo $this->session->userdata('estado');
          echo json_encode(true);
        }else if($this->session->userdata('estado')==="2"){
          echo $this->session->userdata('estado');
          echo json_encode(true);
        }

        $query = $this->db->update('profesores', $datos);

      }else if ($data!==null){
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
  }
