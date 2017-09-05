<?php
$recaptchaCom = new OssnComponents();

$recaptcha = $recaptchaCom->getSettings('ReCaptcha');
?>

<div class="margin-top-10">
  <div class="g-recaptcha" data-sitekey="<?= $recaptcha->recaptcha_site_key ?>"></div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
