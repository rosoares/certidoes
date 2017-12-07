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
}
