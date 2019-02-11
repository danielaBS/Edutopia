<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('estudiante_model');
      $this->load->helper('url_helper');
    }

    public function index($page = 'registro_users') {

      $this->load->view('templates/header');
      $this->load->view('administrador/' . $page);
      $this->load->view('templates/footer');
   }
}
