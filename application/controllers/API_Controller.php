<?php
require_once './application/controllers/login/Login.php';
use \Firebase\JWT\JWT;

abstract class API_Controller extends Login
{
	public function index()
	{
		try {
			 $auth = $this->input->get_request_header('Authorization',true);
			 $auth = str_replace('Bearer','',$auth);

			 if ($auth === ''){
				 $this->setResponse(401,[
					 "mensagem" => "Faça login",
					 "link" => "localhost:8080/login/login",
					 'email' => 'seu email',
					 'pass' => 'sua senha'
				 ]);
			 } else {
				 if($this->getMethodHTTP() === 'get') return $this->show();
				 if($this->getMethodHTTP() === 'post') return $this->store();
				 if($this->getMethodHTTP() === 'put') return $this->update();
				 if($this->getMethodHTTP() === 'delete') return $this->destroy();
				 if($this->getMethodHTTP() !== ['delete','get','post','put']) {
					 $this->setResponse(401,["mensagem" => "Metodo HTTP não suportado"]);
				 }
			 }
			 
		 } catch (\Exception $erro) {
		 	echo "Erro!Token inválido.";
		 }
	}

	public function show($id = 0)
	{
	}

	public function store()
	{
	}

	public function update($id = 0)
	{
	}

	public function destroy($id = 0)
	{
	}

	public function getMethodHTTP()
	{
		return $this->input->method();
	}
}
