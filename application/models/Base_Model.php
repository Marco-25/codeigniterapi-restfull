<?php


class Base_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function JsonEncode($array){
		return json_encode($array);
	}

	public function setResponse($code, $data)
	{
		$this->output
			->set_status_header($code)
			->set_content_type('application/json')
			->set_output($this->JsonEncode($data));
	}

}
