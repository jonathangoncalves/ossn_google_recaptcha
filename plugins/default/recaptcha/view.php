<?php
$recaptchaCom = new OssnComponents();

$recaptcha = $recaptchaCom->getSettings('ReCaptcha');
?>

<div class="margin-top-10">
  <div class="g-recaptcha" data-sitekey="<?= $recaptcha->recaptcha_site_key ?>"></div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<style>
@media only screen and (max-width: 500px) {
.g-recaptcha {
transform:scale(0.77);
transform-origin:0 0;
}
}
@media only screen and (max-width: 991px) and (min-width: 768px) {
.g-recaptcha {
transform:scale(0.86);
transform-origin:0 0;
}
}
</style>
