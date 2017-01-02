<?php

	$email = $_GET['email'];

	$nome_site = $_GET['nome_site'];
	$para = $_GET['para'];

	$email_remetente = $para;

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: $nome_site <$email_remetente>\n";
	$headers .= "Return-Path: $nome_site <$email_remetente>\n";
	$headers .= "Reply-To: $email\n";

	$conteudo = '
	<h2>Olá, um novo e-mail foi cadastrado para newsletter através do site.</h2>';

	$conteudo .= '<p>';
	$conteudo .= '<br><strong>E-mail:</strong> '.$email;
	$conteudo .= '</p>';
	if(mail($para, "Newsletter, Novo E-mail", $conteudo, $headers, "-f$email_remetente")){
		echo(json_encode('ok'));
	}else{
		echo(json_encode("Desculpe, não foi possível enviar seu formulário. <br>Por favor, tente novamente mais tarde."));
	}

?>