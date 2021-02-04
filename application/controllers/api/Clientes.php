<?php
require_once './application/controllers/API_Controller.php';

class Clientes extends API_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('client');
	}

	public function show($id = 0)
	{
		$params = ($this->uri->segment(3));
		if(is_numeric($params)) $id = intval($params);
		$this->client->get_client($id);
	}

	public function store()
	{
		$this->client->post_client();
	}

	public function update($id = 0)
	{
		$id= intval($this->uri->segment(3));
		$this->client->put_client($id);
	}

	public function destroy($id = 0)
	{
		$id= intval($this->uri->segment(3));
		$this->client->delete_client($id);
	}
}
