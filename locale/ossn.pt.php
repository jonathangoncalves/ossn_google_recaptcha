<?php
/**
 * Open Source Social Network
 *
 * @packageOpen Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */
$pt = array(
	'recaptcha' => 'Google reCAPTCHA',
	'recaptcha:text' => 'Preencha o Captcha',
	'recaptcha:error' => 'Você não preencheu o Captcha',
	'recaptcha:com:site_key' => 'SITE_KEY do Google reCAPTCHA',
	'recaptcha:com:secret_key' => 'SECRET_KEY do Google reCAPTCHA',
	'recaptcha:com:note' => 'Precisamos da chave API, vá até o site <a href="https://www.google.com/recaptcha/admin">https://www.google.com/recaptcha/admin</a>. Para ter acesso a essa página, você precisar ter acesso a sua conta do Google. Será pedido que você registre seu site, então dê um nome adequado e liste os domínios (por exemplo, '. ossn_site_url() . ') onde esse reCAPTCHA em particular será usado. Ao receber a SECRET_KEY e a SITE_KEY, coloque ela aqui',
	'recaptcha:site_key:empty' => 'A SITE_KEY não foi digitada.',
	'recaptcha:secret_key:empty' => 'A SECRET_KEY não foi digitada.',
	'recaptcha:saved' => 'Chaves salvas com sucesso.',
	'recaptcha:save:error' => 'As Chaves não puderam ser salvas corretamente.',
);
ossn_register_languages('pt', $pt);