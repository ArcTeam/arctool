<?php
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '498077220384026',
  'app_secret' => '79ebf5d0be20a1fd44213ec63216f4e2',
  'default_graph_version' => 'v2.7',
]);


$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'public_profile']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/arctool/callback.php', $permissions);
?>
