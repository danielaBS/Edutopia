<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('estudiante_model');
      $this->load->model('profesor_model');
      $this->load->helper('url_helper');
    }

    public function index($page = 'registro_users') {

      $this->load->view('templates/header');
      $this->load->view('administrador/' . $page);
      $this->load->view('templates/footer');
   }

   public function registroUsuarios(){
     $RegPerfil= $this->input->post('perfil');
     $RegIdEst = $this->input->post('identificacion');
     $RegNameEst = $this->input->post('nombres');
     $RegApellidosEst= $this->input->post('apellidos');
     $nombreUno=""; $nombreDos=""; $apellidoUno=""; $apellidoDos="";

     $pattern=" ";

     if(strpos($RegNameEst, $pattern)!==false){
       $names = explode(" ", $RegNameEst);
       $nombreUno = $names[0];
       $nombreDos = $names[1];
      }else{
       $nombreUno = $RegNameEst;
     }

     if(strpos($RegApellidosEst, $pattern)!==false){
       $lastnames = explode(" ", $RegApellidosEst);
       $apellidoUno = $lastnames[0];
       $apellidoDos = $lastnames[1];
      }else{
       $apellidoUno = $RegApellidosEst;
     }

     if($RegPerfil==="profesor"){
       echo "prof";
       $usuarioProf = array(
         "nombreProf1" => $nombreUno,
         "nombreProf2" => $nombreDos,
         "apellidoProf1" => $apellidoUno,
         "apellidoProf2" => $apellidoDos,
         "estado" => "2",
         "usuarioProf" => "",
         "contraseñaProf" =>"",
         "identificacionProf" => $RegIdEst,
       );
     }else if ($RegPerfil==="estudiante"){
       echo "est";
       $usuarioEst = array(
         "nombreEst1" => $nombreUno,
         "nombreEst2" => $nombreDos,
         "apellidoEst1" => $apellidoUno,
         "apellidoEst2" => $apellidoDos,
         "idGrad" => "",
         "usuarioEst" => "",
         "contraseñaProf" => "",
         "identificacionEst" => $RegIdEst,
       );
     }

   }
}
