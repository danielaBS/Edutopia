<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('estudiante_model');
      $this->load->model('asignatura_model');
      $this->load->model('grados_model');
      $this->load->library('session');

      $this->load->helper('url_helper');
      $this->load->helper('directory');
    }

    public function index($page = 'home_est') {
      if (!file_exists(APPPATH . 'views/estudiante/' . $page . '.php')) {
          // Whoops, we don't have a page for that!
          show_404();
      }

      $data['asignatura'] = $this->asignatura_model->getStudentAsig($this->session->userdata('grado'));
      $data['asignatura_item'] = $this->asignatura_model->getStudentAsig($this->session->userdata('grado'));

      $this->load->view('templates/header_estud');
      $this->load->view('estudiante/' . $page, $data);

      $this->load->view('templates/footerEst');

   }

   public function log(){
     $idEst = $this->input->post('idEst');
     $userEst = $this->input->post('usuarioEst');

     $data['estudiante'] = $this->estudiante_model->get_student();
     $dataModel['usuario'] = $this->estudiante_model->get_student($idEst, $userEst);
   }

   public function login2(){
     $idEst = $this->input->post('idEst');
     $userEst = $this->input->post('usuarioEst');
     $passEst = $this->input->post('contrasenaEst');

     $data['estudiante'] = $this->estudiante_model->get_student2();
     $dataModel['usuario'] = $this->estudiante_model->get_student2($idEst, $userEst, $passEst);
   }

   public function modifUser(){
     $passEst = $this->input->post('contrasenaEst');
     $logged = $this->input->post('firstLog');

     $this->estudiante_model->modificarUser(null, $passEst, $logged, null);
   }

   public function setId(){
     $id = $this->input->post('idAsig');
     $idSEt = array(
       'idASig' => $id
     );
     $this->session->set_userdata($idSEt);
     $set= $this->session->userdata['idASig'];
     echo $set;
   }

   public function getChar(){
     $idPer= $this->session->userdata['personaje'];
     echo $idPer;
   }

   public function setChar(){
     $charID = $this->input->post('personaje');
     $this->estudiante_model->modificarUser(null, null, null, $charID);
   }

   public function getMinSec(){
    $iii = $this->input->post('link');
     echo $this->session->userdata[$iii];
   }

   public function searchLine(){
     $suma = array();
     $line = $this->input->post('random');
     $suma = $this->session->userdata('cancion1');

     foreach ($suma as $key) {
       echo $key. " ";
     }
  }
}
