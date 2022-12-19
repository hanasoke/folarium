<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeModel extends CI_Model {

  function get_position() {
    $query = $this->db->get('position');
    return $query;
  }

  function get_contract($contract_id) {
    $query = $this->db->get_where('contract', array('contract_position_id' => $contract_id));
    return $query;
  }

  function get_employee() {
    $this->db->select('employee_id,position,contract_length,name,age,email,address');
    $this->db->from('employee');
    $this->db->join('position', 'employee_position_id = position_id', 'left');
    $this->db->join('contract', 'employee_contract_id = contract_id', 'left');
    $query = $this->db->get();
    return $query;
  }

  function get_employee_by_id($employee_id) {
    $query = $this->db->get_where('employee', array('employee_id' => $employee_id));
    return $query;
  }

  function save_employee($position_id,$contract_id,$name,$email,$age,$address) {
    $data = array(
      'employee_contract_id' => $contract_id,
      'employee_position_id' => $position_id,
      'name' => $name,
      'email' => $email,
      'age' => $age,
      'address' => $address
    );
    $this->db->insert('employee', $data);
  }

  function update_employee($employee_id, $position_id, $contract_id, $name, $email, $age, $address) {
    $this->db->set('name', $name);
    $this->db->set('email', $email);
    $this->db->set('age', $age);
    $this->db->set('address', $address);
    $this->db->set('employee_position_id', $position_id);
    $this->db->set('employee_contract_id', $contract_id);
    $this->db->where('employee_id', $employee_id);
    $this->db->update('employee');
  }

  function delete_employee($employee_id) {
    $this->db->delete('employee', array('employee_id' => $employee_id));
  }
}



?>