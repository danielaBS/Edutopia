<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('profesor_model');
        $this->load->helper('url_helper');
        $this->load->library('session');

    }

    public function index($page= 'home') {

      $idProf = $this->input->post('idProf');
      $userProf = $this->input->post('usuarioProf');
      $passProf = $this->input->post('contrasenaProf');

      $data['profesor'] = $this->profesor_model->get_profesor();
      $dataModel['usuario'] = $this->profesor_model->get_profesor($idProf, $userProf, $passProf);

  		//cache del inicio de sesión

  		$this->session->set_userdata($data['profesor']);

      $this->load->view('templates/header', $data);
      $this->load->view('profesor/' . $page, $dataModel, $data);
      $this->load->view('templates/footer', $data);
  }
}
