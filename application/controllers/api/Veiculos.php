<?php
require_once './application/controllers/API_Controller.php';

class Veiculos extends API_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vehicle');
	}

	public function show($id = 0)
	{
		$params = ($this->uri->segment(3));
		if(is_numeric($params)) $id = intval($params);
		$this->vehicle->get_vehicle($id);
	}

	public function store()
	{
		$this->vehicle->post_vehicle();
	}

	public function update($id = 0)
	{
		$id= intval($this->uri->segment(3));
		$this->vehicle->put_vehicle($id);
	}

	public function destroy($id = 0)
	{
		$id= intval($this->uri->segment(3));
		$this->vehicle->delete_vehicle($id);
	}
}
