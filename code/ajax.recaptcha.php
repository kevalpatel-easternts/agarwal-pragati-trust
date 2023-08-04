<?php 
include 'inc/config.php';
include 'inc/recaptchalib.php';

$resp = recaptcha_check_answer(RECAPTCHA_PRIVATE_KEY, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);
if ($resp->is_valid) {
    ?>success<?php
}
?>
