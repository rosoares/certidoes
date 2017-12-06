<?php

class Obito_model extends CI_Model{

	private $tabela = 'obito';

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

    public function busca($id, $cpf){
        $this->db->select('cpf, nome_falecido, status');
        $this->db->where('id', $id);
        $this->db->where('cpf', $cpf);
        return $this->db->get($this->tabela)->row();
    }
}