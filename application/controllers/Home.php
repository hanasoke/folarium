<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct() 
  {
    parent::__construct();
    $this->load->model('PegawaiModel');
  }

  public function index() {
    $data['pegawai'] = $this->PegawaiModel->data_pegawai()->result();
    $data['kontrak'] = $this->PegawaiModel->data_kontrak()->result();
    $data['jabatan'] = $this->PegawaiModel->data_jabatan()->result();
    $data['join3table'] = $this->PegawaiModel->join3table()->result();
    $this->load->view('home/index', $data);
  }

  function add_pegawai() {
    $data['pegawai'] = $this->PegawaiModel->data_pegawai()->result();
    $data['kontrak'] = $this->PegawaiModel->data_kontrak()->result();
    $data['jabatan'] = $this->PegawaiModel->data_jabatan()->result();
    $data['join3table'] = $this->PegawaiModel->join3table()->result();
    $this->load->view('home/add_pegawai', $data);
  }

  public function delete_pegawai() {
    $id_pegawai = $this->uri->segment(3);
    $this->PegawaiModel->delete_pegawai($id_pegawai);
    redirect('home/index');
  }


  public function kontrak() {
    $data['kontrak'] = $this->PegawaiModel->data_kontrak()->result();
    $this->load->view('home/kontrak', $data);
  }

  public function add_kontrak() {
    $this->load->view('home/add_kontrak');
  }

  public function save_kontrak() {
    $massa_kontrak = $this->input->post('massa_kontrak');
    $this->PegawaiModel->add_kontrak($massa_kontrak);
    redirect('home/kontrak');
  }

  public function save_pegawai() {
    
    $id_jabatan = $this->input->post('jabatan', TRUE);
    $id_kontrak = $this->input->post('kontrak', TRUE);
    $nama = $this->input->post('nama', TRUE);
    $umur = $this->input->post('umur', TRUE);
    $email = $this->input->post('email', TRUE);
    $tempat_tinggal = $this->input->post('tempat_tinggal', TRUE);

    $this->PegawaiModel->save_pegawai($id_jabatan, $id_kontrak, $nama, $email, $umur, $tempat_tinggal);

    redirect('home/index');

  }

  public function delete_kontrak() {
    $id_kontrak = $this->uri->segment(3);
    $this->PegawaiModel->delete_kontrak($id_kontrak);
    redirect('home/kontrak');
  }

  public function edit_kontrak() {
    $id_kontrak = $this->uri->segment(3);
    $result = $this->PegawaiModel->get_id_kontrak($id_kontrak);
    if ($result->num_rows() > 0) {
      $i = $result->row_array();
      $data = array(
        'id' => $i['id'],
        'massa_kontrak' => $i['massa_kontrak']
      );
      $this->load->view('home/edit_kontrak', $data);
    } else {
      echo "Data Was Not Found";
    }
  }

  function update_kontrak() {
    $id_kontrak = $this->input->post('id_kontrak');
    $massa_kontrak = $this->input->post('massa_kontrak');
    $this->PegawaiModel->update_kontrak($id_kontrak, $massa_kontrak);
    redirect('home/kontrak');
  }
  

  public function jabatan() {
    $data['jabatan'] = $this->PegawaiModel->data_jabatan()->result();
    $this->load->view('home/jabatan', $data);
  }

  public function add_jabatan() {
    $this->load->view('home/add_jabatan');
  }

  public function save_jabatan() {
    $jabatan = $this->input->post('jabatan');
    $this->PegawaiModel->add_jabatan($jabatan);
    redirect('home/jabatan');
  }

  public function delete_jabatan() {
    $id_jabatan = $this->uri->segment(3);
    $this->PegawaiModel->delete_jabatan($id_jabatan);
    redirect('home/jabatan');
  }

  public function edit_jabatan() {
    $id_jabatan = $this->uri->segment(3);
    $result = $this->PegawaiModel->get_id_jabatan($id_jabatan);
    if ($result->num_rows() > 0) {
      $i = $result->row_array();
      $data = array(
        'id' => $i['id'],
        'jabatan' => $i['jabatan']
      );
      $this->load->view('home/edit_jabatan', $data);
    } else {
      echo "Data Was Not Found";
    }
  }

  function update_jabatan() {
    $id_jabatan = $this->input->post('id_jabatan');
    $jabatan = $this->input->post('jabatan');
    $this->PegawaiModel->update_jabatan($id_jabatan, $jabatan);
    redirect('home/jabatan');
  }
  

}