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

define('RECAPTCHA', ossn_route()->com . 'ReCaptcha/');

/**
 * ReCaptcha initialize
 *
 * @return void
 */
function recaptcha_init()
{
  ossn_extend_view('forms/signup/before/submit', 'recaptcha/view');
  ossn_register_callback('action', 'load', 'recaptcha_check');
  ossn_register_com_panel('recaptcha', 'settings');
  if(ossn_isAdminLoggedin()){
    ossn_register_action('recaptcha/admin/settings', RECAPTCHA . 'actions/admin.php');
  }
}

/**
 * reCaptcha the actions which you wanted to validate
 *
 * @return array
 */
function recaptcha_actions_validate()
{
  return ossn_call_hook('recaptcha', 'actions', false, array(
    'user/register'
  ));
}

/**
 * Validate the recaptcha actions
 *
 * @param string $callback The callback type
 * @param string $type The callback type
 * @param array $params The option values
 *
 * @return string
 */
function recaptcha_check($callback, $type, $params)
{
  $recaptcha_data = input('g-recaptcha-response');
  if (isset($params['action']) && in_array($params['action'], recaptcha_actions_validate()) && !recaptcha_verify($recaptcha_data)) {
    if ($params['action'] == 'user/register') {
      header('Content-Type: application/json');
      echo json_encode(array(
        'dataerr' => ossn_print('recaptcha:error'),
      ));
      exit;
    } else {
      ossn_trigger_message(ossn_print('recaptcha:error'));
      redirect(REF);
    }
  }
}

/**
 * Verify a captcha based on the input value entered by the user and the seed token passed.
 *
 * @param string $input_value
 * @return bool
 */
function recaptcha_verify($input_value)
{
  ini_set('allow_url_fopen', 1);

  $recaptchaCom = new OssnComponents();

  $recaptcha = $recaptchaCom->getSettings('ReCaptcha');

  $vetParametros = array(
    "secret" => $recaptcha->recaptcha_secret_key,
    "response" => $input_value,
    "remoteip" => $_SERVER["REMOTE_ADDR"]
  );
  $curlReCaptcha = curl_init();
  curl_setopt($curlReCaptcha, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($curlReCaptcha, CURLOPT_POST, true);
  curl_setopt($curlReCaptcha, CURLOPT_POSTFIELDS, http_build_query($vetParametros));
  curl_setopt($curlReCaptcha, CURLOPT_RETURNTRANSFER, true);
  $vetResposta = json_decode(curl_exec($curlReCaptcha), true);
  curl_close($curlReCaptcha);
  if (isset($vetResposta["success"]) && $vetResposta["success"]) {
    return true;
  } else {
    return false;
  }
}

ossn_register_callback('ossn', 'init', 'recaptcha_init');