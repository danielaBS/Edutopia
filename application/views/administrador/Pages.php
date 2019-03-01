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
      $idEst = $this->input->post('idEst');
      $userEst = $this->input->post('usuarioEst');
      $passwdEst = $this->input->post('contrasenaEst');

      $data['estudiante'] = $this->estudiante_model->get_student();
      $dataModel['usuario'] = $this->estudiante_model->get_student($idEst, $userEst, $passwdEst);

      $this->load->view('templates/header', $data);
      $this->load->view('estudiante/' . $page, $dataModel, $data);
      $this->load->view('templates/footer', $data);

   }
}
