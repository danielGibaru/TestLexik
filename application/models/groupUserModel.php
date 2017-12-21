<?php
/**
 *
 */
class groupUserModel extends CI_Model{
  function __construct(){
      $this->load->database();
  }
  public $IdGroupUser;
  public $NomGroup;

  public function getGroupAndUserByOrderASC(){
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

}
