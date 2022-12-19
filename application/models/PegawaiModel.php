<?php 

class PegawaiModel extends CI_Model
{
  public function data_pegawai() {
    $this->db->select('id, jabatan, massa_kontrak, nama, umur, tempat_tinggal');
    $this->db->from('pegawai');
    $this->db->join('jabatan', 'jabatan.id = id_jabatan', 'left');
    $this->db->join('kontrak', 'kontrak.id = id_kontrak', 'left');
    $query = $this->db->get();
    return $query;
  }
  
  public function delete_pegawai($id_pegawai) {
    $this->db->delete('pegawai', array('id' => $id_pegawai));
  }
  

  public function data_kontrak() {
    $this->db->select('*');
    $this->db->from('kontrak');
    $query = $this->db->get();
    return $query;
  }

  public function data_jabatan() {
    $this->db->select('*');
    $this->db->from('jabatan');
    $query = $this->db->get();
    return $query;
  }

  public function add_kontrak($massa_kontrak) {
    $data = array(
      'massa_kontrak' => $massa_kontrak
    );
    $this->db->insert('kontrak', $data);
  }

  public function delete_kontrak($id_kontrak) {
    $this->db->where('id', $id_kontrak);
    $this->db->delete('kontrak');
  }


  public function get_id_kontrak($id_kontrak) {
    $query = $this->db->get_where('kontrak', array('id' => $id_kontrak));
    return $query;
  }

  public function update_kontrak($id_kontrak, $massa_kontrak) {
    $data = array(
      'massa_kontrak' => $massa_kontrak
    );
    $this->db->where('id', $id_kontrak);
    $this->db->update('kontrak', $data);
  }

  public function add_jabatan($jabatan) {
    $data = array(
      'jabatan' => $jabatan
    );
    $this->db->insert('jabatan', $data);
  }

  public function delete_jabatan($id_jabatan) {
    $this->db->where('id', $id_jabatan);
    $this->db->delete('jabatan');
  }

  public function get_id_jabatan($id_jabatan) {
    $query = $this->db->get_where('jabatan', array('id' => $id_jabatan));
    return $query;
  }

  public function update_jabatan($id_jabatan, $jabatan) {
    $data = array(
      'jabatan' => $jabatan
    );
    $this->db->where('id', $id_jabatan);
    $this->db->update('jabatan', $data);
  }

  public function join3table() {
    $this->db->select('*');
    $this->db->from('pegawai');
    $this->db->join('jabatan', 'jabatan.id = pegawai.id_jabatan', 'LEFT');
    $this->db->join('kontrak', 'kontrak.id = pegawai.id_kontrak', 'LEFT');
    $query = $this->db->get();
    return $query;
  }

  public function save_pegawai($id_jabatan, $id_kontrak, $nama, $email, $umur, $tempat_tinggal) {
    $data = array(
      'id_jabatan'     => $id_jabatan,
      'id_kontrak'     => $id_kontrak,
      'nama'           => $nama,
      'email'          => $email,
      'umur'           => $umur,
      'tempat_tinggal' => $tempat_tinggal
    );
    $this->db->insert('pegawai', $data);
  }

  public function get_id_pegawai($id_pegawai) {
    $query = $this->db->get_where('pegawai', array('id' => $id_pegawai));
    return $query;
  }

  function get_pegawai($id_pegawai) {
    $query = $this->db->get_where('pegawai', array('id_jabatan' => $id_pegawai));
  }

  // public function update_pegawai($id_pegawai, $id_jabatan, $id_kontrak, $nama, $email, $umur, $tempat_tinggal) {
    
  //   $data = array(
  //     'id_jabatan'      = $id_jabatan,
  //     'id_kontrak'      = $id_kontrak,
  //     'nama'            = $nama,
  //     'email'           = $email,
  //     'umur'            = $umur,
  //     'tempat_tinggal'  = $tempat_tinggal
  //   );

  //   $this->db->where('id', $id_pegawai);
  //   $this->db->update('pegawai', $data);
  // }



}


?>