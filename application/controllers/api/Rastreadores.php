<?php
require_once './application/controllers/API_Controller.php';

class Rastreadores extends API_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tracker');
	}

	public function show($id = 0)
	{
		$params = ($this->uri->segment(3));
		if(is_numeric($params)) $id = intval($params);
		$this->tracker->get_tracker($id);
	}

	public function store()
	{
		$this->tracker->post_tracker();
	}

	public function update($id = 0)
	{
//		$id= intval($this->uri->segment(3));
		$this->tracker->put_tracker($id);
	}

	public function destroy($id = 0)
	{
		$id= intval($this->uri->segment(3));
		$this->tracker->delete_tracker($id);
	}
}
