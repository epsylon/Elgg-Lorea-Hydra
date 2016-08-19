<?php
return array(
	'gnusocial_api' => 'Servicos do GNUSocial',

	'gnusocial_api:requires_oauth' => 'Servicos do GNUSocial necessitam que o plugin da Biblioteca \'OAuth\' esteja habilitado.',

	'gnusocial_api:consumer_key' => 'Chave publica <i>(Consumer Key)</i>',
	'gnusocial_api:consumer_secret' => 'Chave privada <i>(Consumer Secret)</i>',

	'gnusocial_api:settings:instructions' => 'Voce deve obter uma chave pública <i>(Consumer Key)</i> e outra chave privada <i>(Consumer Secret)</i> no site do <a href="https://gnusocial.com/oauth_clients" target="_blank">GNUSocial</a>. Os demais campos são auto-explicativos, a única informação que você terá que fornecer será o endereco de retorno <i>(callback url)<i> que tem o formato de %sgnusocial_api/authorize</i></i>',

	'gnusocial_api:usersettings:description' => "Vincule sua conta %s com o GNUSocial.",
	'gnusocial_api:usersettings:request' => "Voce deve primeiro autorizar %s acessar sua conta do GNUSocial.",
	'gnusocial_api:usersettings:cannot_revoke' => "Você não pode desvincular sua conta do GNUSocial por que você não forneceu seu email ou sua senha.",
	'gnusocial_api:authorize:error' => 'Nao foi possivel autorização pelo GNUSocial.',
	'gnusocial_api:authorize:success' => 'Acesso pelo GNUSocial foi autorizado.',

	'gnusocial_api:usersettings:authorized' => "Você possui autorização %s para acessar sua conta do GNUSocial: @%s.",
	'gnusocial_api:usersettings:revoke' => 'Clique <a href="%s">aqui</a> para revogar o acesso.',
	'gnusocial_api:usersettings:site_not_configured' => 'Um administrador deve configurar primeiro o GNUSocial antes dele poder ser usado.',

	'gnusocial_api:revoke:success' => 'Acesso do GNUSocial foi revogado.',

	'gnusocial_api:post_to_gnusocial' => "Envia postagens no micro-blog dos usuários para GNUSocial?",

	'gnusocial_api:login' => 'Permite aos usuarios existentes que possuem conta no GNUSocial a autenticação para acesso atraves do uso do GNUSocial?',
	'gnusocial_api:new_users' => 'Permite aos novos usuarios a autenticação para acesso através do uso do GNUSocial mesmo se o registro manual estiver desabilitado?',
	'gnusocial_api:login:success' => 'Voce foi autenticado e entrou na rede.',
	'gnusocial_api:login:error' => 'Não foi possivel autenticação através do GNUSocial.',
	'gnusocial_api:login:email' => "Voce deve digitar um endereço de email válido para sua nova conta %s.",

	'gnusocial_api:invalid_page' => 'Página inválida',

	'gnusocial_api:deprecated_callback_url' => 'O endereço de retorno <i>(callback URL)</i>  foi alterado para o API do GNUSocial para %s.  Por favor solicite ao seu administrador que efetue a alteração.',

	'gnusocial_api:interstitial:settings' => 'Configure suas preferências',
	'gnusocial_api:interstitial:description' => 'Você está próximo de usar %s!  São necessários poucos detalhes antes que você continue. Eles são opcionais mas permitiram que o login aconteça mesmo que o login pelo GNUSocial não esteja disponível ou você decida desvincular sua conta.',

	'gnusocial_api:interstitial:username' => 'Este é seu nome de usuário. Ele não pode ser alterado.  Se você definir uma senha você poder´autilizar seu login ou endereço de email para se autenticar na rede.',

	'gnusocial_api:interstitial:name' => 'Este será o nome que as pessoas usarão para interagir com você.',

	'gnusocial_api:interstitial:email' => 'Seu endereço de email Por padrão, as pessoas não conseguiram visualizar este email.',

	'gnusocial_api:interstitial:password' => 'Um senha para que o login aconteça mesmo que o login pelo GNUSocial não esteja disponível ou você decida desvincular sua conta.',
	'gnusocial_api:interstitial:password2' => 'Digite a mesma senha, novamente.',

	'gnusocial_api:interstitial:no_thanks' => 'Não obrigado',

	'gnusocial_api:interstitial:no_display_name' => 'Você deve ter um nome de apresentação para as pessoas.',
	'gnusocial_api:interstitial:invalid_email' => 'Você deve digitar um endereço de email válido ou deixar em branco.',
	'gnusocial_api:interstitial:existing_email' => 'Este endereço de email já foi registrado no site.',
	'gnusocial_api:interstitial:password_mismatch' => 'Suas senhas não são iguais.',
	'gnusocial_api:interstitial:cannot_save' => 'Não foi possível salvar os detalhes da conta.',
	'gnusocial_api:interstitial:saved' => 'Detalhes da conta foram salvos.',
);
