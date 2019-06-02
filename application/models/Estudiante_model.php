<?php

Class Estudiante_model extends CI_Model {

    public function __construct() {
        $connection = $this->load->database();
    }

    public function get_student($id= FALSE, $user = FALSE) {
        if ($user !== "") {
            $query1 = $this->db->query("SELECT * FROM estudiante WHERE usuarioEst='$user'");
            $query2 = $this->db->query("SELECT * FROM estudiante WHERE identificacionEst='$id'");
            $row1 = $query1->row_array();
            $row2 = $query2->row_array();
            $row;

            if($row1===$row2){
              $row = $query1->row_array();
            }

            if (isset($row)){
              if ($id === $row['identificacionEst'] && $row['firstLog']==="0") {
                $log = true;
                echo json_encode($log);
              }else if($row['firstLog']==="1"){
                $log = false;
                echo json_encode($log);
              }
              $idd = $row['idEstudiante'];
              $query3 =  $this->db->query("SELECT * FROM matricula WHERE idEstudiante='$idd'");
              $row3 = $query3->row_array();

              $dataSession = array(
                'usuario' => $row['usuarioEst'],
                'contraseña' => $row['contraseñaEst'],
                'id' => $row['idEstudiante'],
                'grado' => $row3['idGrad'],
                'personaje' => $row['personaje']
              );
              $this->session->set_userdata($dataSession);
            }else if(!isset($row)){
              echo json_encode(0);
            }
        }
    }

    public function get_student2($id= FALSE, $user = FALSE, $passwd = FALSE) {
      $paswrdEnter = $passwd;
      $log;
        if ($user !== "") {
            $query = $this->db->query("SELECT * FROM estudiante WHERE usuarioEst='$user'");
            $row = $query->row_array();
            if (isset($row) && $id === $row['identificacionEst']) {
              $log = true;
              echo json_encode($log);
            }
            echo $row['contraseñaEst'];
        }
    }

    public function registerUser($dataE){
      $query = $this->db->insert('estudiante',
       array(
      'nombreEst1' => $dataE['nombreEst1'],
      'nombreEst2' => $dataE['nombreEst2'],
      'apellidoEst1' => $dataE['apellidoEst1'],
      'apellidoEst2' => $dataE['apellidoEst2'],
      'usuarioEst' => $dataE['usuarioEst'],
      'identificacionEst' => $dataE['identificacionEst']
      ));
      echo json_encode($query);
    }

    public function getStudentsList(){
      $query = $this->db->get('estudiante');
      $array = $query->result_array();
      return array_reverse($array);
    }

    public function deleteuser($usuario){
      $query = $this->db->query("SELECT * FROM estudiante WHERE usuarioEst='$usuario'");
      $row = $query->row_array();
      if (isset($row)) {
        $this->db->delete('estudiante', array('usuarioEst' => $usuario));  // Produces: // DELETE FROM mytable  // WHERE id = $id
          $log = true;
          echo json_encode($log);
      }
    }

    public function modificarUser($data, $password= false, $logged= false, $char){
      if ($data===null && $char===null){
        $query = $this->db->where('usuarioEst', $this->session->userdata('usuario'));
        $datos = array(
          'firstLog' => true,
          'contraseñaEst' => $password
        );
        $query = $this->db->update('estudiante', $datos);
        echo json_encode(true);

      }else if($data!==null && $char===null){
        $query = $this->db->where('usuarioEst', $data['usuario']);

        $datos = array(
            'nombreEst1' => $data['nombreEst1'],
            'nombreEst2' => $data['nombreEst2'],
            'apellidoEst1' => $data['apellidoEst1'],
            'apellidoEst2' => $data['apellidoEst2'],
            'contraseñaEst' => $password,
            'identificacionEst' => $data['identificacionEst']);
        $query = $this->db->update('estudiante', $datos);
        echo json_encode(true);
      }else if($data === null && $char!==null){
        $query = $this->db->where('usuarioEst', $this->session->userdata('usuario'));

        $datos = array(
            'personaje' => $char);
        $this->session->set_userdata($datos);
        $query = $this->db->update('estudiante', $datos);
        echo json_encode('set');
      }
    }
  }
