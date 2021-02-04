<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
//		$senha = 1234;
//		$key = $senha;
//
//
//
//		$payload = array (
//			"iss" => "http://localhost:8080/api/clientes",
//		);
//
//		$jwt = JWT::encode($payload, $key);
//
//		print_r($jwt);
//
//		$decoded = JWT::decode($jwt, $key, array('HS256'));
//
////		print_r($decoded);
//
//		$decoded_array = (array) $decoded;
//
//
//		JWT::$leeway = 60; //
//		$decoded = JWT::decode($jwt, $key, array('HS256'));
		$this->gerarToken();


	}

	public function gerarToken()
	{

		$data = json_decode(file_get_contents('php://input'), true);

		if ($data === []) {
			$this->setResponse(401,[
				'warning' => 'Envie e-mail e senha para se autenticar.',
				'email' => "",
				"pass" => ""
			]);
			return;
		}

		$this->email = $data['email'];
		$this->pass = $data['pass'];

		$result = $this->db->get_where('usuarios',['email' => $this->email])->result();
		if ($result === []) {
			$this->setResponse(401,['mensagem' => 'Usuário ou senha inválidos']);
			return;
		}

		$validatePass = $this->db->get_where('usuarios',['pass' => $this->pass])->result();
		if(!$validatePass) {
			$this->setResponse(401,['mensagem' => 'Usuário ou senha inválidos']);
			return;
		}

		echo $token = JWT::encode($this->email,"senha_super_secreta");


	}

	public function setResponse($code, $data)
	{
		$this->output
			->set_status_header($code)
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}
}



