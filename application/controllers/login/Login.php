<?php

use \Firebase\JWT\JWT;

class Login extends CI_Controller
{
	protected $token;
	protected $key = 'senha_super_secreta';

	public function index()
	{
		$this->GenerateToken();
	}

	public function GenerateToken()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if ($data === []) {
			$this->setResponse(401,[
				'mensagem' => 'envie os dados de login para se conectar a API',
				'email' => 'seu email',
				'pass' => 'sua senha'
			]);
			return;
		}

		$email = $data['email'];
		if ($this->db->get_where('usuarios', ['email' => $email])->result() === []) {
			$this->setResponse(401,['mensagem'=>'email não encontado.']);
			return;
		}

		$senha = $data['pass'];
		if ($this->db->get_where('usuarios', ['pass' => $senha])->result() === []) {
			$this->setResponse(401,['mensagem'=>'Senha Inválida.']);
			return;
		}

		$this->token = JWT::encode($email,$this->key);
		$this->setResponse('200',['Authorizathion'=> $this->token]);

	}

	public function validateToken($token)
	{
		$decoded = JWT::decode($token, $this->key, array('HS256'));
		return JWT::encode($decoded,$this->key);
	}

	public function setResponse($code, $data)
	{
		$this->output
			->set_status_header($code)
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}
}
