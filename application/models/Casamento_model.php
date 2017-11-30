<?php

class Casamento_model extends CI_Model{

	private $tabela = 'casamento';

	public function __construct(){
		parent::__construct();	
	}

	public function insere($data)
	{
		$this->db->insert($this->tabela, $data);
		return $this->db->insert_id();
	}

	public function atualizaStatusPedido($id_pedido, $status)
	{
		$this->db->set('status', $status);
        $this->db->where('id', $id_pedido);
        $this->db->update($this->tabela);
        return true;
	}

}