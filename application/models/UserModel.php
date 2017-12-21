<?php

class UserModel extends CI_Model{
  function __construct(){
      $this->load->database();
  }
  public $IdUser;
  public $Nom;
  public $Prenom;
  public $Email;
  public $DateAnniversaire;
  public $IdGroupUser;

  public function getUserById($IdUser){

    $query = $this->db->get_where('user',array('IdUser' => $IdUser));
    return $query->row_array();
  }

  public function addUser(){
      $this->load->helper('url');
      $data = array(
          'Nom' => $this->input->post('Nom'),
          'Prenom' => $this->input->post('Prenom'),
          'Email' => $this->input->post('Email'),
          'DateAnniversaire' => $this->input->post('DateAnniversaire'),
          'IdGroupUser' => $this->input->post('IdGroupUser'),
      );
          return $this->db->insert('user',$data);
      }

  public function seachInGroupAndUser(){
    $table = $this->input->post('table');
    $data = $this->input->post('Nom');
    if(strlen($data) == 0){
      $this->db->order_by("groupuser.NomGroup", "asc");
      $this->db->select('groupuser.IdGroupUser');

      $this->db->select('groupuser.NomGroup');
      $this->db->select('user.IdUser');
      $this->db->select('user.Nom');
      $this->db->select('user.Prenom');
      $this->db->select('user.Email');
      $this->db->select('user.DateAnniversaire');

      $this->db->join('user', 'user.IdGroupUser = groupuser.IdGroupUser', 'inner');
      $query = $this->db->get('groupuser');
      return $query->result_array();

    }
    if (strcmp($table,"user") == 0) {
      $this->db->like('Nom', $data);
      $this->db->join('groupuser', 'user.IdGroupUser = groupuser.IdGroupUser', 'inner');

      $query = $this->db->get('user');

      return $query->result_array();
    }else{
      $this->db->like('NomGroup', $data);
      $this->db->join('user', 'user.IdGroupUser = groupuser.IdGroupUser', 'inner');
      $query = $this->db->get('groupuser');

      return $query->result_array();
    }
  }

  public function removeById(){
    $id = [];
    $this->load->helper('url');

    $IdUser = $this->input->post('IdUser[]');
    var_dump($IdUser);
    if (count($IdUser) !=0) {
    foreach ($IdUser as $IdUsers) {
      array_push($id, intval($IdUsers));
    }

       $this->db->where_in('IdUser', $id);
       var_dump($id);

       return $this->db->delete('user');
     }
  }
}
