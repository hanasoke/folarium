<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('EmployeeModel');
    $this->load->library('form_validation');
  }

  public function index() {
    $data['title'] = 'HomePage';
    $data['employee'] = $this->EmployeeModel->get_employee();
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/main_sidebar');
    $this->load->view('templates/main_topbar');
    $this->load->view('main/index', $data);
    $this->load->view('templates/main_footer');
  }

  // add new product
  function add_employee() {
    $data['title'] = 'Add Data';
    $data['position'] = $this->EmployeeModel->get_position()->result();
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/main_sidebar');
    $this->load->view('templates/main_topbar');
    $this->load->view('main/add_employee', $data);
  }

  function get_contract() {
    $contract_id = $this->input->post('id', TRUE);
    $data = $this->EmployeeModel->get_contract($contract_id)->result();
    echo json_encode($data);
  }

  // save product to database
  function save_employee() {

    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('age', 'Age', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('position', 'Position', 'required|trim');

    $data['title'] = 'Add DataKu';
    $data['position'] = $this->EmployeeModel->get_position()->result();
    if($this->form_validation->run() == false) {
      $this->load->view('templates/main_header', $data);
      $this->load->view('templates/main_sidebar');
      $this->load->view('templates/main_topbar');
      $this->load->view('main/add_employee', $data);
    } else {
      $position_id = $this->input->post('position', TRUE);
      $contract_id = $this->input->post('contract', TRUE);
      $name = $this->input->post('name', TRUE);
      $email = $this->input->post('email', TRUE);
      $age = $this->input->post('age', TRUE);
      $address = $this->input->post('address', TRUE);

      $this->EmployeeModel->save_employee($position_id,$contract_id,$name,$email,$age,$address);

      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Employee Saved<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('main/index');
    }
  }

  public function get_edit() {
    $employee_id = $this->uri->segment(3);
    $data['employee_id'] = $employee_id;
    $data['title'] = 'Edit Data';
    $data['position'] = $this->EmployeeModel->get_position()->result();
    $get_data = $this->EmployeeModel->get_employee_by_id($employee_id);
    if ($get_data->num_rows() > 0) {
      $i = $get_data->row_array();
      $data['sub_contract_id'] = $i['employee_contract_id'];
      $this->load->view('templates/main_header', $data);
      $this->load->view('templates/main_sidebar');
      $this->load->view('templates/main_topbar');
      $this->load->view('main/edit_employee', $data);
      $this->load->view('templates/main_footer');
    } else {
      echo "Data Was Not Found";
    }
  }

  function get_data_edit() {
    $employee_id = $this->input->post('employee_id', TRUE);
    $data = $this->EmployeeModel->get_employee_by_id($employee_id)->result();
    echo json_encode($data);
  }

  // update product to database
  function update_employee() {
    $this->form_validation->set_rules('employee_id', 'ID', 'required|trim');
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('age', 'Age', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('position', 'Position', 'required|trim');

    $data['title'] = 'Update DataKu';
    $data['position'] = $this->EmployeeModel->get_position()->result();

    if($this->form_validation->run() == false) {
      $this->load->view('templates/main_header', $data);
      $this->load->view('templates/main_sidebar');
      $this->load->view('templates/main_topbar');
      $this->load->view('main/edit_employee', $data);
    } else {
    $employee_id = $this->input->post('employee_id', TRUE);
    $name = $this->input->post('name', TRUE);
    $email = $this->input->post('email', TRUE);
    $age = $this->input->post('age', TRUE);
    $address = $this->input->post('address', TRUE);
    $position_id = $this->input->post('position', TRUE);
    $contract_id = $this->input->post('contract', TRUE);

    $this->EmployeeModel->update_employee($employee_id, $position_id,$contract_id, $name, $email, $age, $address);
    $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">Employee has been updated<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('main/index');
    }
  }

  function delete() {
    $employee_id = $this->uri->segment(3);
    $this->EmployeeModel->delete_employee($employee_id);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Employee has been delated<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('main/index');
  }

}