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
      $this->load->view('templates/header');
      $this->load->view('profesor/' . $page);
      $this->load->view('templates/footer');
    }

    public function log(){
      $idProf = $this->input->post('idProf');
      $userProf = $this->input->post('usuarioProf');

      $data['profesor'] = $this->profesor_model->get_profesor();
      $dataModel['usuario'] = $this->profesor_model->get_profesor($idProf, $userProf);
    }

    public function login2(){
      $idProf = $this->input->post('idProf');
      $userProf = $this->input->post('usuarioProf');
      $passProf = $this->input->post('contrasenaProf');

      $data['profesor'] = $this->profesor_model->get_profesor2();
      $dataModel['usuario'] = $this->profesor_model->get_profesor2($idProf, $userProf, $passProf);
    }

    public function modifUser(){
      $passProf = $this->input->post('contrasenaProf');
      $logged = $this->input->post('firstLog');

      $this->profesor_model->modificarUser(null, $passProf, $logged);
    }
  }
