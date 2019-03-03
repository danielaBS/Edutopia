<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('estudiante_model');
      $this->load->helper('url_helper');
      $this->load->library('session');
    }

    public function index($page = 'registro') {

      $this->load->view('templates/header');
      $this->load->view('estudiante/' . $page);
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
}
