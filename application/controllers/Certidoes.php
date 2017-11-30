<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certidoes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Casamento_model', 'casamento');
		$this->load->model('Obito_model', 'obito');
		$this->load->model('Nascimento_model', 'nascimento');
	}

	public function index()
	{
		$pagina = $this->uri->segment(1);

		if ($pagina == 'casamento' || $pagina == 'obito' || $pagina == 'nascimento') {
			
			$dados_pagina = array();
			if ($pagina == 'casamento') {
				$dados_pagina['titulo'] = "Casamento";	
			}
			if ($pagina == 'obito') {
				$dados_pagina['titulo'] = "Óbito";	
			}
			if ($pagina == 'nascimento') {
				$dados_pagina['titulo'] = "Nascimento";	
			}
			
			$this->load->view('cabecalho', $dados_pagina);
			$this->load->view($pagina);
			$this->load->view('endereco');
			$this->load->view('rodape');
		}

		else if ($pagina == 'certidaoCasamento') {
			$this->certidaoCasamento();
		}
		else if ($pagina == 'certidaoObito') {
			$this->certidaoObito();
		}
		else if ($pagina == 'certidaoNascimento') {
			$this->certidaoNascimento();
		}

		else{
			show_404();
		}
	}


	public function certidaoCasamento()
	{	

		include_once APPPATH.'vendor/autoload.php';

		$is_valid = GUMP::is_valid($_POST, array(
			'cpf' => 'required|exact_len,14',
			'data_casamento' => 'required|max_len,10',
			'nome_noivo' => 'required|valid_name|max_len,100',
			'nome_noiva' => 'required|valid_name|max_len,100',
			'cidade_casamento' => 'required|max_len,70',
			'email' => 'required|valid_email|max_len,50',
			'telefone' => 'max_len,15',
			'endereco' => 'required|max_len,75',
			'numero' => 'required|integer|max_len,5',
			'bairro' => 'required|max_len,50',
			'complemento' => 'max_len,50',
			'referencia' => 'max_len,75'
		));


		if ($is_valid === true) {
			$cpf = $this->input->post('cpf');
			$data_casamento = $this->input->post('data_casamento');
			$data_casamento = implode("", array_reverse(explode("/", $data_casamento)));
			$nome_noivo = $this->input->post('nome_noivo');
			$nome_noiva = $this->input->post('nome_noiva');
			$email = $this->input->post('email');
			$cidade_casamento = $this->input->post('cidade_casamento');
			$telefone = $this->input->post('telefone');
			$endereco = $this->input->post('endereco');
			$numero = $this->input->post('numero');
			$bairro = $this->input->post('bairro');
			$complemento = $this->input->post('complemento');
			$referencia = $this->input->post('referencia');

			$data = array(
				'cpf' => $cpf,
				'data_casamento' => $data_casamento,
				'nome_noivo' => $nome_noivo,
				'nome_noiva' => $nome_noiva,
				'cidade_casamento' => $cidade_casamento,
				'email' => $email,
				'telefone' => $telefone,
				'endereco' => $endereco,
				'numero' => $numero,
				'bairro' => $bairro,
				'complemento' => $complemento,
				'referencia' => $referencia
			);

			$id_pedido = $this->casamento->insere($data);
			$id_pedido = "C".$id_pedido;
			$tipo_certidao = "Certidão de Casamento";
			$preco = "30.00";
			$this->PagSeguro($tipo_certidao, $preco, $id_pedido);
		}

		else{
			$this->session->erros = $is_valid;
			echo 0;
		}
	}

	public function certidaoObito()
	{
		include_once APPPATH.'vendor/autoload.php';

		$is_valid = GUMP::is_valid($_POST, array(
			'cpf' => 'required|exact_len,14',
			'data_falecimento' => 'required|date',
			'nome_falecido' => 'required|valid_name|max_len,75',
			'cidade_falecimento' => 'required|valid_name|max_len,50',
			'email' => 'required|valid_email|max_len,50',
			'telefone' => 'max_len,15',
			'endereco' => 'required|max_len,75',
			'numero' => 'required|integer|max_len,5',
			'bairro' => 'required|max_len,50',
			'complemento' => 'max_len,20',
			'referencia' => 'max_len,70'
		));

		if($is_valid === true){
			$cpf = $this->input->post('cpf');
			$data_falecimento = $this->input->post('data_falecimento');
			$data_falecimento = implode("", array_reverse(explode("/", $data_falecimento)));
			$nome_falecido = $this->input->post('nome_falecido');
			$cidade_falecimento = $this->input->post('cidade_falecimento');
			$email = $this->input->post('email');
			$telefone = $this->input->post('telefone');
			$endereco = $this->input->post('endereco');
			$numero = $this->input->post('numero');
			$bairro = $this->input->post('bairro');
			$complemento = $this->input->post('complemento');
			$referencia = $this->input->post('referencia');

			$data = array(
				'cpf' => $cpf,
				'data_falecimento' => $data_falecimento,
				'nome_falecido' => $nome_falecido,
				'cidade_falecimento' => $cidade_falecimento,
				'email' => $email,
				'telefone' => $telefone,
				'endereco' => $endereco,
				'numero' => $numero,
				'bairro' => $bairro,
				'complemento' => $complemento,
				'referencia' => $referencia
			);

			$id_pedido = $this->obito->insere($data);
			$id_pedido = "O".$id_pedido;
			$tipo_certidao = "Certidão de Óbito";
			$preco = "40.00";
			$this->PagSeguro($tipo_certidao, $preco, $id_pedido);
		}

		else{
			$this->session->erros = $is_valid;
			echo 0;
		}
	}

	public function certidaoNascimento()
	{
		include_once APPPATH.'vendor/autoload.php';

		$is_valid = GUMP::is_valid($_POST, array(
			'cpf' => 'required|exact_len,14',
			'data_nascimento' => 'required|date',
			'nome' => 'required|valid_name|max_len,75',
			'nome_pai' => 'required|valid_name|max_len,75',
			'nome_mae' => 'required|valid_name|max_len,75',
			'cidade_nascimento' => 'required|valid_name|max_len,50',
			'email' => 'required|valid_email|max_len,50',
			'telefone' => 'max_len,15',
			'endereco' => 'required|max_len,50',
			'numero' => 'required|integer|max_len,5',
			'bairro' => 'required|max_len,50',
			'complemento' => 'max_len,20',
			'referencia' => 'max_len,50'
		));

		if ($is_valid === true) {
			$cpf = $this->input->post('cpf');
			$data_nascimento = $this->input->post('data_nascimento');
			$data_nascimento = implode("", array_reverse(explode("/", $data_nascimento)));
			$nome = $this->input->post('nome');
			$nome_mae = $this->input->post('nome_mae');
			$nome_pai = $this->input->post('nome_pai');
			$cidade_nascimento = $this->input->post('cidade_nascimento');
			$email = $this->input->post('email');
			$telefone = $this->input->post('telefone');
			$endereco = $this->input->post('endereco');
			$numero = $this->input->post('numero');
			$bairro = $this->input->post('bairro');
			$complemento = $this->input->post('complemento');
			$referencia = $this->input->post('referencia');

			$data = array(
				'cpf' => $cpf,
				'data_nascimento' => $data_nascimento,
				'nome' => $nome,
				'nome_mae' => $nome_mae,
				'nome_pai' => $nome_pai,
				'cidade_nascimento' => $cidade_nascimento,
				'email' => $email,
				'endereco' => $endereco,
				'telefone' => $telefone,
				'numero' => $numero,
				'bairro' => $bairro,
				'complemento' => $complemento,
				'referencia' => $referencia
			);

			$id_pedido = $this->nascimento->insere($data);
			$id_pedido = "N".$id_pedido;
			$tipo_certidao = "Certidão de Nascimento";
			$preco = "50.00";
			$this->PagSeguro($tipo_certidao, $preco, $id_pedido);
		}

		else{
			$this->session->erros = $is_valid;
			echo 0;
		}
		
	}

	public function PagSeguro($tipo_certidao, $preco, $id_pedido)
	{
		$data = array();
		$data['token'] = 'C0A4065C87644DACB41816F074F23FAA';
		$data['email'] = 'rodrigosoares8899@gmail.com';
		$data['currency'] = 'BRL';
		$data['itemId1'] = '1';
		$data['itemQuantity1'] = '1';
		$data['itemDescription1'] = $tipo_certidao;
		$data['itemAmount1'] = $preco;
		$data['reference'] = $id_pedido;

		$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";

		$data = http_build_query($data);
		$curl = curl_init($url);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

		$xml = curl_exec($curl);
		if($xml == 'Unauthorized'){
			$return = 'Não Autorizado';
			echo $return;
			exit;
		}
		curl_close($curl);

		$xml = simplexml_load_string($xml);
		if(count($xml ->error) > 0){
			$return = 'Dados Inválidos '.$xml ->error->message;
			echo $return;
			exit;
		}
		echo $xml->code;
	}
}
