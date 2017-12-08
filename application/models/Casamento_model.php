<?php

class Casamento_model extends CI_Model
{

    private $tabela = 'casamento';

    public function __construct()
    {
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

    public function busca($id, $cpf)
    {
        $this->db->select("CASE status
                WHEN 0 THEN 'Aguardando Pagamento' 
                WHEN 1 THEN 'Aguardando Pagamento' 
                WHEN 2 THEN 'Em análise' 
                WHEN 3 THEN 'Paga' 
                WHEN 4 THEN 'Disponível' 
                WHEN 5 THEN 'Em disputa' 
                WHEN 6 THEN 'Devolvida' 
                WHEN 7 THEN 'Cancelada'
             END as status_pedido, cpf, nome_noivo, nome_noiva, 
             CASE entrega
                WHEN 0 THEN 'Não Entregue'
                WHEN 1 THEN 'Saiu para Entrega'
                WHEN 2 THEN 'Entregue'
              END as status_entrega
         ");
        $this->db->where('id', $id);
        $this->db->where('cpf', $cpf);
        return $this->db->get($this->tabela)->row();
    }

    public function listaPedidos()
    {

        $this->db->select("CASE status
                WHEN 0 THEN 'Aguardando Pagamento' 
                WHEN 1 THEN 'Aguardando Pagamento' 
                WHEN 2 THEN 'Em análise' 
                WHEN 3 THEN 'Paga' 
                WHEN 4 THEN 'Disponível' 
                WHEN 5 THEN 'Em disputa' 
                WHEN 6 THEN 'Devolvida' 
                WHEN 7 THEN 'Cancelada'
             END as status_pedido, cpf, nome_noivo, nome_noiva, id");
        return $this->db->get($this->tabela)->result();
    }

    public function getCertidaoById($id)
    {
        $this->db->select("*, DATE_FORMAT(data_casamento, '%d/%m/%Y') AS data_casamento,  CASE status
                WHEN 0 THEN 'Aguardando Pagamento' 
                WHEN 1 THEN 'Aguardando Pagamento' 
                WHEN 2 THEN 'Em análise' 
                WHEN 3 THEN 'Paga' 
                WHEN 4 THEN 'Disponível' 
                WHEN 5 THEN 'Em disputa' 
                WHEN 6 THEN 'Devolvida' 
                WHEN 7 THEN 'Cancelada'
             END as status_pedido");
        return $this->db->get_where($this->tabela, array('id' => $id))->row();
    }

    public function alteraStatusEntrega($id, $status)
    {
        $this->db->set('entrega', $status);
        $this->db->where('id', $id);
        $this->db->update($this->tabela);
        if ($this->db->affected_rows() >= 0) {
            return true;
        } else {
            return false;
        }
    }

}