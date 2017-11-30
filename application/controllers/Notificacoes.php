<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacoes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Casamento_model', 'casamento');
		$this->load->model('Obito_model', 'obito');
		$this->load->model('Nascimento_model', 'nascimento');
	}

	public function notificacao()
	{
		$codigo = preg_replace('/[^[:alnum:]-]/','',$_POST["codigo"]);
		
		$data['token'] = 'C0A4065C87644DACB41816F074F23FAA';
		$data['email'] = 'rodrigosoares8899@gmail.com';
		$data = http_build_query($data);
		$url = "https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/".$codigo.'?'.$data;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_URL, $url);
		$xml = curl_exec($curl);
		curl_close($curl);

		$xml = simplexml_load_string($xml);
		$pedido = $xml->reference;
		$status = $xml->status;
		$id_pedido = substr($pedido, 1);
		$tipo = substr($pedido, 0,1);
		
		if ($tipo === 'C') {
			$this->casamento->atualizaStatusPedido($id_pedido, $status);
		}
		else if ($tipo === 'O') {
			$this->obito->atualizaStatusPedido($id_pedido, $status);
		}
		else if ($tipo === 'N') {
			$this->nasicmento->atualizaStatusPedido($id_pedido, $status);
		}

	}
}
