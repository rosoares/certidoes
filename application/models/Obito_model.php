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
        $this->db->select('cpf, nome_falecido');
        $this->db->select("
            CASE status
                WHEN 0 THEN 'Aguardando Pagamento' 
                WHEN 1 THEN 'Aguardando Pagamento' 
                WHEN 2 THEN 'Em análise' 
                WHEN 3 THEN 'Paga' 
                WHEN 4 THEN 'Disponível' 
                WHEN 5 THEN 'Em disputa' 
                WHEN 6 THEN 'Devolvida' 
                WHEN 7 THEN 'Cancelada'
             END AS status_pedido 
         ");
        $this->db->where('id', $id);
        $this->db->where('cpf', $cpf);
        return $this->db->get($this->tabela)->row();
    }

    public function listaPedidos()
    {
        $this->db->select('id, cpf, nome_falecido');
        $this->db->select("
            CASE status
                WHEN 0 THEN 'Aguardando Pagamento' 
                WHEN 1 THEN 'Aguardando Pagamento' 
                WHEN 2 THEN 'Em análise' 
                WHEN 3 THEN 'Paga' 
                WHEN 4 THEN 'Disponível' 
                WHEN 5 THEN 'Em disputa' 
                WHEN 6 THEN 'Devolvida' 
                WHEN 7 THEN 'Cancelada'
             END AS status_pedido 
         ");
        return $this->db->get($this->tabela)->result();
    }
}