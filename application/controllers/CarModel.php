<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CarModel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ajax_crud_model");
	}

	public function index()
	{
		$table = "cars";
		$result = $this->ajax_crud_model->select($table);
		$data['rows'] = $result;
		$this->load->view('carModel/list', $data);
	}

	public function insert_data()
	{
		$table = "cars";
		$data = [
			'name' => $this->input->post('name'),
			'color' => $this->input->post('color'),
			'transmission' => $this->input->post('transmission'),
			'price' => $this->input->post('price')
		];

		$result = $this->ajax_crud_model->insert_data($table, $data);
		echo json_encode($result);
	}

	public function editdata($id)
	{
		// $id = $this->input->post('id');
		$table = "cars";
		$row = $this->ajax_crud_model->editdata($table, $id);
		echo json_encode($row);
	}

	// Update data from table 
	public function update_data($id)
	{
		// $id = $this->input->post('id');
		$table = "cars";
		$data = [
			'name' => $this->input->post('name'),
			'color' => $this->input->post('color'),
			'transmission' => $this->input->post('transmission'),
			'price' => $this->input->post('price'),
		];
		$update = $this->ajax_crud_model->updateData($id, $table, $data);
		echo json_encode($update);
	}

	// Delete Data from table 
	public function delete_data($id)
	{
		$table = "cars";
		$this->ajax_crud_model->deleteData($id, $table);
	}
}

