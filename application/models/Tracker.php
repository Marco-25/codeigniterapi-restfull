<?php
require_once './application/models/Base_Model.php';

class Tracker extends Base_Model
{
	protected $table = 'rastreador';


	public function get_tracker($id)
	{
		if(!empty($id)) {
			$data = $this->db->get_where( $this->table,['id' => $id])->result();
		} else {
			$data = $this->db->get($this->table)->result();
		}
		$this->setResponse(200,$data);
	}

	public function post_tracker()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if ($data === []) {
			$this->setResponse(404, [
				"mensagem" => "informe todos os campos abaixo, menos esse.",
				"marca" => "",
				"numero" => "",
				"veiculo_id" => 0,
				"cliente_id" => 0
			]);
			return;
		}

		$this->clientId = $data['cliente_id'];
		$this->db->where('id', $this->clientId);
		if (!$this->db->get('clientes')->result() ){
			$this->setResponse(409,["mensagem" => "Erro!['cliente_id'] não pertence a nenhum cliente."]);
			return;
		}

		foreach ($data as $key => $value) {
			if (empty($value) || strlen($value) < 4) {
				if($key === 'veiculo_id' || $key === 'cliente_id') continue;
				$this->setResponse(409,["mensagem" => "Campo [".strtoupper($key)."] vazio ou com menos de 3 caracters."]);
				return;
			}
		}

		$this->numero = $data['numero'];
		$this->db->where('numero', $this->numero);
		if ($this->db->get($this->table)->result() ){
			$this->setResponse(409,["mensagem" => "Numero ja cadastrada."]);
			return;
		}

		$this->db->insert($this->table ,$data);
		$this->setResponse(201,["mensagem" => "Rastreador cadastrado com sucesso."]);

	}

	public function put_tracker($id)
	{
//		$data = json_decode(file_get_contents('php://input'), true);
		$this->setResponse(200,['mensagem' => "Não é possivel alterar um rastreador."]);
	}

	public function delete_tracker($id)
	{
		$result = $this->db->get_where( $this->table,['id' => $id])->result();
		if ( $result === []) {
			$this->setResponse(404,['mensagem'=>"O id $id não foi encontrado!"]);
			return;
		}

		$this->db->delete( $this->table , ['id'=>$id]);
		$this->setResponse(200,['mensagem'=> "Rastreador excluido com sucesso!"]);
	}
}
