<?php

require 'vendor/autoload.php';

$facebook = new \Facebook\Facebook([
    'app_id'                =>  '230969055040310',
    'app_secret'            =>  '70a2b3065fde022e7d804c551bb6f89e',
    'default_graph_version' =>  'v2.10'
]);
$helper = $facebook->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/OAuth2/admin/index.php");

try {
    $accessToken = $helper->getAccessToken();
    if (isset($accessToken)) {
        $_SESSION['access_token'] = (string)$accessToken;

        header("Location:admin/index.php");
    }
} catch (Exception $e) {
}
