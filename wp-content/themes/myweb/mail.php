<?php

	$nome = $_GET['nome'];
	$cpf_cnpj = $_GET['email'];
	$email = $_GET['cpf_cnpj'];
	$telefone = $_GET['telefone'];
	$celular = $_GET['celular'];
	$endereco = $_GET['endereco'];
	$numero = $_GET['numero'];
	$bairro = $_GET['bairro'];
	$informativo = $_GET['informativo'];

	$email_remetente = "cadastro@depositosavassi.com.br";
	$para = 'cadastro@depositosavassi.com.br';
	$para2 = 'edertton@gmail.com';
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: Depósito Savassi <$email_remetente>\n"; // remetente
	$headers .= "Return-Path: Depósito Savassi <$email_remetente>\n"; // return-path
	$headers .= "Reply-To: <$nome> <$email>\n"; // Endereço (devidamente validado) que o seu usuário informou no contato

	$conteudo = '
	<h2>Olá, uma nova mensagem foi enviada através do site.</h2>
	<p>Confira logo abaixo, todos os dados preenchidos no formulário da área "Contato":</p>';

	$conteudo .= '<p>';
	$conteudo .= '<strong>Nome:</strong> '.$nome;
	$conteudo .= '<br><strong>CPF / CNPJ:</strong> '.$cpf_cnpj;
	$conteudo .= '<br><strong>E-mail:</strong> '.$email;
	$conteudo .= '<br><strong>Telefone:</strong> '.$telefone;
	$conteudo .= '<br><strong>Celular:</strong> '.$celular;
	$conteudo .= '<br><strong>Endereço:</strong> '.$endereco.', '.$numero;
	$conteudo .= '<br><strong>Bairro:</strong> '.$bairro;
	$conteudo .= '<br><strong>Deseja receber o informativo?</strong> '.$informativo;
	$conteudo .= '</p>';
	if(mail($para, "Contato, Fale Conosco", $conteudo, $headers, "-f$email_remetente")){
		echo(json_encode("Enviado com sucesso! Obrigado."));
	}else{
		echo(json_encode("Desculpe, não foi possível enviar seu formulário. Por favor, tente novamente mais tarde."));
	}
	if(mail($para2, "Contato, Fale Conosco", $conteudo, $headers, "-f$email_remetente")){ }

?>