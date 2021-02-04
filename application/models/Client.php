<?php
require_once './application/models/Base_Model.php';

class Client extends Base_Model
{
	protected $table = 'clientes';


	public function get_client($id)
	{
		if(!empty($id)) {
			$data = $this->db->get_where( $this->table,['id' => $id])->result();
		} else {
			$data = $this->db->get($this->table)->result();
		}
		$this->setResponse(200,$data);
	}

	public function post_client()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if ($data === []) {
			$this->setResponse(404, [
				"mensagem" => "informe os campos abaixo.",
				"nome" => "",
				"cpf" => "123.456.789-72",
				"cidade" => "",
				"endereco" => "",
				"numero" => "",
				"bairro" => ""
			]);
			return;
		}

		foreach ($data as $key => $value) {
			if (empty($value) || strlen($value) < 3) {
				if($key === 'numero') continue;
				$this->setResponse(409,["mensagem" => "Campo [".strtoupper($key)."] vazio ou com menos de 3 caracters."]);
				return;
			}
		}

		$this->cpf = $data['cpf'];
		$this->db->where('cpf', $this->cpf);

		if ($this->db->get($this->table)->result() ){
			$this->setResponse(409,["mensagem" => "CPF ja cadastrado."]);
			return;
		}

		$this->db->insert($this->table ,$data);
		$this->setResponse(201,["mensagem" => "Cliente cadastrado com sucesso."]);

	}

	public function put_client($id)
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if ($data === []) {
			$this->setResponse(404, ['mensagem' => 'Campo não informado.']);
			return;
		}

		$result = $this->db->get_where( $this->table,['id' => $id])->result();
		if ( $result === []) {
			$this->setResponse(404,['mensagem'=>"O id $id não foi encontrado!"]);
			return;
		}
		$this->db->update( $this->table, $data, ['id'=>$id]);
		$this->setResponse(200,['mensagem' => "Alterado com sucesso."]);

	}

	public function delete_client($id)
	{
		$result = $this->db->get_where( $this->table,['id' => $id])->result();
		if ( $result === []) {
			$this->setResponse(404,['mensagem'=>"O id $id não foi encontrado!"]);
			return;
		}

		$this->db->delete( $this->table , ['id'=>$id]);
		$this->setResponse(200,['mensagem'=> "Cliente excluido com sucesso!"]);
	}
}
