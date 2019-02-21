<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('estudiante_model');
      $this->load->model('profesor_model');
      $this->load->helper('url_helper');
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
}
