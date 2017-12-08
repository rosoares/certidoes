<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Casamento_model', 'casamento');
        $this->load->model('Obito_model', 'obito');
        $this->load->model('Nascimento_model', 'nascimento');
    }

    public function index()
    {
        $pagina = $this->uri->segment(2);
        $dados['solicitacoes'] = '';
        if (is_null($pagina)){
            $pagina = 'lista_casamentos';
        }

        if ($pagina == 'lista_casamentos'){
            $dados['solicitacoes'] = $this->casamento->listaPedidos();
        }
        else if ($pagina == 'lista_obitos'){
            $dados['solicitacoes'] = $this->obito->listaPedidos();
        }
        else if ($pagina == 'lista_nascimentos'){
            $dados['solicitacoes'] = $this->nascimento->listaPedidos();
        }


        $this->load->view('admin/cabecalho');
        $this->load->view('admin/'.$pagina, $dados);
        $this->load->view('admin/rodape');
    }

    public function certidaoCasamento(){
        $id = $this->uri->segment(3);
        $dados["certidao"] = $this->casamento->getCertidaoById($id);
        $this->load->view('admin/cabecalho');
        $this->load->view('admin/descricao_casamento', $dados);
        $this->load->view('admin/rodape');
    }
    public function certidaoObito(){
        $id = $this->uri->segment(3);
        $dados["certidao"] = $this->obito->getCertidaoById($id);
        $this->load->view('admin/cabecalho');
        $this->load->view('admin/descricao_obito', $dados);
        $this->load->view('admin/rodape');
    }
    public function certidaoNascimento(){
        $id = $this->uri->segment(3);
        $dados["certidao"] = $this->nascimento->getCertidaoById($id);
        $this->load->view('admin/cabecalho');
        $this->load->view('admin/descricao_nascimento', $dados);
        $this->load->view('admin/rodape');
    }

    public function alteraStatusEntregaCasamento(){
        $id = $this->input->post('id', TRUE);
        $status = $this->input->post('status', TRUE);
        $this->casamento->alteraStatusEntrega($id, $status);
        if($this->nascimento->alteraStatusEntrega($id, $status)){
            echo 1;
        } else{
            echo 0;
        }
    }

    public function alteraStatusEntregaObito(){
        $id = $this->input->post('id', TRUE);
        $status = $this->input->post('status', TRUE);
        $this->obito->alteraStatusEntrega($id, $status);
        if($this->nascimento->alteraStatusEntrega($id, $status)){
            echo 1;
        } else{
            echo 0;
        }
    }
    public function alteraStatusEntregaNascimento(){
        $id = $this->input->post('id', TRUE);
        $status = $this->input->post('status', TRUE);
        if($this->nascimento->alteraStatusEntrega($id, $status)){
            echo 1;
        } else{
            echo 0;
        }
    }

}
