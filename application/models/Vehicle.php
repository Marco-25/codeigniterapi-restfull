<?php
require_once './application/models/Base_Model.php';

class Vehicle extends Base_Model
{
	protected $table = 'veiculos';


	public function get_vehicle($id)
	{
		if(!empty($id)) {
			$data = $this->db->get_where( $this->table,['id' => $id])->result();
		} else {
			$data = $this->db->get($this->table)->result();
		}
		$this->setResponse(200,$data);
	}

	public function post_vehicle()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if ($data === []) {
			$this->setResponse(404, [
				"mensagem" => "informe todos os campos abaixo, menos esse.",
				"nome" => "",
				"placa" => "",
				"cor" => "",
				"ano" => "",
				"modelo" => "",
				"cliente_id" => 0
			]);
			return;
		}

		foreach ($data as $key => $value) {
			if (empty($value) || strlen($value) < 4) {
				if($key === 'cliente_id') continue;
				$this->setResponse(409,["mensagem" => "Campo [".strtoupper($key)."] vazio ou com menos de 3 caracters."]);
				return;
			}
		}

		$this->clientId = $data['cliente_id'];
		$this->db->where('id', $this->clientId);
		if (!$this->db->get('clientes')->result() ){
			$this->setResponse(409,["mensagem" => "Erro!['cliente_id'] não pertence a nenhum cliente."]);
			return;
		}

		$this->placa = $data['placa'];
		$this->db->where('placa', $this->placa);
		if ($this->db->get($this->table)->result() ){
			$this->setResponse(409,["mensagem" => "PLACA ja cadastrada."]);
			return;
		}

		if ($this->db->insert($this->table ,$data)){
			$this->setResponse(201,["mensagem" => "Veiculo cadastrado com sucesso."]);
			return;
		}
	}

	public function put_vehicle($id)
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

		$newData = [];
		foreach ($data as $key => $value) {
			if ($key !== 'cliente_id' && $key === 'placa'){
				$newData[$key] = $value;
			}
		}
		$this->db->update( $this->table, $newData, ['id'=>$id]);
		$this->setResponse(200,['mensagem' => "Alterado com sucesso."]);
	}

	public function delete_vehicle($id)
	{
		$result = $this->db->get_where( $this->table,['id' => $id])->result();
		if ( $result === []) {
			$this->setResponse(404,['mensagem'=>"O id $id não foi encontrado!"]);
			return;
		}

		$this->db->delete( $this->table , ['id'=>$id]);
		$this->setResponse(200,['mensagem'=> "veiculo excluido com sucesso!"]);
	}
}
