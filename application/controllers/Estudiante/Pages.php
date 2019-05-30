<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('estudiante_model');
      $this->load->model('asignatura_model');
      $this->load->model('grados_model');
      $this->load->helper('url_helper');
      $this->load->library('session');
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

      $this->load->view('templates/footer');

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

     $this->estudiante_model->modificarUser(null, $passEst, $logged);
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


}
