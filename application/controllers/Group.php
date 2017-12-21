<?php

class Group extends CI_Controller {

  function __construct(){
			parent::__construct();

      $this->load->model('groupUserModel');
			$this->load->model('UserModel');


			$this->load->helper('url_helper');
	}

	public function index(){

    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['User'] = $this->groupUserModel->getGroupAndUserByOrderASC();
    $data['result'] = $this->UserModel->seachInGroupAndUser();
    $this->form_validation->set_rules('Nom','Nom', 'required');
    $this->form_validation->set_rules('table','table', 'required');


    $this->load->view('templates/header');
		$this->load->view('groupvue.php', $data);
    $this->load->view('templates/footer');
	}


  public function add(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('Nom','Nom', 'required');
    $this->form_validation->set_rules('Prenom', 'Prenom' , 'required');
    $this->form_validation->set_rules('Email', 'Email', 'required');
    $this->form_validation->set_rules('DateAnniversaire', 'DateAnniversaire', 'required');
    $this->form_validation->set_rules('IdGroupUser', 'IdGroupUser', 'required');

    if($this->form_validation->run()=== false){
      $this->load->view('templates/header');
      $this->load->view('create.php');
      $this->load->view('templates/footer');
    }else{
      $this->UserModel->addUser();
      redirect ('Group', 'refresh');
    }
  }
  public function search(){
    $data['result'] = $this->UserModel->seachInGroupAndUser();
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('Nom','Nom', 'required');


    $this->load->view('templates/header');
    $this->load->view('groupvue.php', $data);
    $this->load->view('templates/footer');

  }

  public function remove(){
    $data['User'] = $this->groupUserModel->getGroupAndUserByOrderASC();

    $this->load->helper('form');
    $this->load->library('form_validation');
    $IdUser = $this->form_validation->set_rules('IdUser[]', 'IdUser[]', 'required');

    if($this->form_validation->run()=== false){
      $this->load->view('templates/header');
      $this->load->view('remove.php', $data);
      $this->load->view('templates/footer');

    }else{
      $this->UserModel->removeById();
      redirect ('Group', 'refresh');
    }
  }
}
