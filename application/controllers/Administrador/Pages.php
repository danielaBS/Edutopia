<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('estudiante_model');
      $this->load->model('profesor_model');
      $this->load->helper('url_helper');
      $this->load->library('session');

    }

    public function index($page ='home') {
      if (!file_exists(APPPATH . 'views/administrador/' . $page . '.php')) {
          // Whoops, we don't have a page for that!
          show_404();
      }

      $data['profesores'] = $this->profesor_model->getTeachersList();
      $data['profesor_item'] = $this->profesor_model->getTeachersList();
      $data['estudiantes'] = $this->estudiante_model->getStudentsList();
      $data['estudiante_item'] = $this->estudiante_model->getStudentsList();

      $this->load->view('templates/header_admin');
      $this->load->view('administrador/' . $page, $data);
      $this->load->view('templates/footer');
   }

   public function registroUsuarios($page = 'registro_users'){
     $RegPerfil = $this->input->post('perfil');
     $RegId = $this->input->post('identificacion');
     $RegName = $this->input->post('nombres');
     $RegApellidos = $this->input->post('apellidos');
     $RegUser = $this->input->post('usuario');
     $RegPasswd = $this->input->post('contraseña');
     $grado = $this->input->post('grado');

     $nombreUno=""; $nombreDos=""; $apellidoUno=""; $apellidoDos="";

     $pattern=" ";

     if(strpos($RegName, $pattern)!==false){
       $names = explode(" ", $RegName);
       $nombreUno = $names[0];
       $nombreDos = $names[1];
      }else{
       $nombreUno = $RegName;
     }

     if(strpos($RegApellidos, $pattern)!==false){
       $lastnames = explode(" ", $RegApellidos);
       $apellidoUno = $lastnames[0];
       $apellidoDos = $lastnames[1];
      }else{
       $apellidoUno = $RegApellidos;
     }

     if($RegPerfil==="profesor"){
       $data = array(
         "nombreProf1" => $nombreUno,
         "nombreProf2" => $nombreDos,
         "apellidoProf1" => $apellidoUno,
         "apellidoProf2" => $apellidoDos,
         "estado" => "2",
         "usuarioProf" => $RegUser,
         "contraseñaProf" => $RegPasswd,
         "identificacionProf" => $RegId,
       );
       $this->profesor_model->registerUser($data);

     }else if ($RegPerfil==="estudiante"){
       $dataE = array(
         "nombreEst1" => $nombreUno,
         "nombreEst2" => $nombreDos,
         "apellidoEst1" => $apellidoUno,
         "apellidoEst2" => $apellidoDos,
         "idGrad" => $grado,
         "usuarioEst" => $RegUser,
         "contraseñaEst" => $RegPasswd,
         "identificacionEst" => $RegId,
       );
       $this->estudiante_model->registerUser($dataE);
     }
   }

   public function eliminarUsuario(){
     $perfil = $this->input->post('perfil');
     $usuario = $this->input->post('usuario');

     if($perfil==="profesor"){
       $this->profesor_model->deleteuser($usuario);
     }else if($perfil==="estudiante"){
       $this->estudiante_model->deleteuser($usuario);
     }
   }

   public function modificarUsuario(){
     $perfil = $this->input->post('perfil');
     $nombres = $this->input->post('nombres');
     $apellidos = $this->input->post('apellidos');
     $usuario = $this->input->post('usuario');
     $identificacion = $this->input->post('identificacion');
     $nombreUno=""; $nombreDos=""; $apellidoUno=""; $apellidoDos="";

     $pattern=" ";

     if(strpos($nombres, $pattern)!==false){
       $names = explode(" ", $nombres);
       $nombreUno = $names[0];
       $nombreDos = $names[1];
      }else{
       $nombreUno = $nombres;
     }

     if(strpos($apellidos, $pattern)!==false){
       $lastnames = explode(" ", $apellidos);
       $apellidoUno = $lastnames[0];
       $apellidoDos = $lastnames[1];
      }else{
       $apellidoUno = $apellidos;
     }

     if(strlen($perfil) === 12){
       $data = array(
         "nombreProf1" => $nombreUno,
         "nombreProf2" => $nombreDos,
         "apellidoProf1" => $apellidoUno,
         "apellidoProf2" => $apellidoDos,
         "usuario" => $usuario,
         "identificacionProf" => $identificacion,
       );
       $this->profesor_model->modificarUser($data);

     }else{
       $dataE = array(
         "nombreEst1" => $nombreUno,
         "nombreEst2" => $nombreDos,
         "apellidoEst1" => $apellidoUno,
         "apellidoEst2" => $apellidoDos,
         "usuario" => $usuario,
         "identificacionEst" => $identificacion,
       );
       $this->estudiante_model->modificarUser($dataE);
     }
   }
}
