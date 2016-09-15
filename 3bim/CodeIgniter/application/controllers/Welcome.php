<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public funcition index(){
		$data['mensagem'] = "Olá Mundo!!";
		$this->load->view('ola_mundo', $data);
	}

	//public funcition teste(){
		//echo "Isto é só um teste";	
	//}

	//public funcition teste(){
	//	$data['postagens'] = $this->db->get('postagens')->result();
	//	echo "<pre>";
	//	print-r($data);
	//}

	public function teste(){
	$data['postagens'] = $this->db->get('postagens')->result(); 
	$this->load->view('postagens',$data); 
	}
	
	public function detalhes($id) {
		$this->db->where('id', $id); 
		$data['postagem'] = $this->db->get('postagens')->result(); 
		$data['postagens'] = $this->db->get('postagens')->result();
		$this->load->view('detalhes_postagem', $data); 
	}

	public function fale_conosco(){
		$this -> load -> helper('form');
		$this -> load -> view('fale_conosco');
	}

	public function enviar_mensagem(){
	$mensagem="Nome:".$this->input->post('txt_nome').br();
	$mensagem.="E-mail:".$this->input->post('txt_email').br();
	$mensagem.="Mensagem:".$this->input->post('txt_mensagem').br();
	$config['protocol']='smtp';
	$config['smtp_host']='ssl://smtp.googlemail.com';
	$config['smtp_port']='465';
	$config['smtp_timeout']='30';
	$config['smtp_user']='endereco_que_envia@gmail.com';
	$config['smtp_pass']='senha_do_email_que_envia';
	$config['charset']='utf-8';
	$config['newline']="\r\n";
	$config['mailtype']='html';
	$this->load->library('email',$config);
	$this->email->from("endereco_que_envia@gmail.com","Formulário do website");
	$this->email->to("email_que_recebe@gmail.com");
	$this->email->subject('Assunto do e-mail,enviado pelo CodeIgniter');
	$this->email->message($mensagem);
	if($this->email->send()){
		$this->load->view('sucesso_envia_contato');
	}else{
		print_r($this->email->print_debugger());
	}
}

}
