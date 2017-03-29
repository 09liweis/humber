<?php
//THE FOLLOWING CODE IS INCOMPLETE. YOU SHOULD ADD CHECKS FOR ERRORS,
//CANCELLED LOGINS, AND HTTP RESPONSE CODES
/* In practice, you should use best practices and have classes, etc. */
session_start();
//If 401 error, destroy session
if (http_response_code() == '401') {
  session_destroy();
}
//LinkedIn API config variables
$LINKEDIN_CFG = array(
  'key' => 'YOUR_CLIENT_ID',
  'secret' => 'YOUR_CLIENT_SECRET',
  'redirect' => 'URL_IN_YOUR_SITE_REGISTERED_AS_A_REDIRECT_IN_LINKEDIN',
  'scope' => 'r_basicprofile'
);
$LINKEDIN_AUTH_PAGE = 'https://www.linkedin.com/oauth/v2/authorization';
$LINKEDIN_ACCESSTOKEN_PAGE = 'https://www.linkedin.com/oauth/v2/accessToken';
//SOME FUNCTIONS FOR LINKEDIN STUFF
//These should actually be in a class, but for example's sake I'll put
//everything in this file.
function getAuthCode($config, $url) {
  $req_params = array(
    'response_type' => 'code',
    'client_id' => $config['key'],
    'redirect_uri' => $config['redirect'],
    'state' => 'A_RANDOM_ALPHANUMERIC_STRING',
    'scope' => $config['scope']
  );
  $req_url = $url . '?' . http_build_query($req_params);
  //need to store state because you'll need to check if the state that's
  //returned matches the original
  $_SESSION['linkedin']['state'] = $req_params['state'];
  $_SESSION['authstate'] = 'authorizing';
  //BELOW WILL RETURN: code, state
  //ON RETURN: check if state matches $_SESSION['linkedin']['state']
  header("Location: $req_url");
}
function getAccessToken($authcode, $config, $url) {
  $params = array(
    'grant_type' => 'authorization_code',
    'code' => $authcode,
    'redirect_uri' => $config['redirect'],
    'client_id' => $config['key'],
    'client_secret' => $config['secret']
  );
  //make a POST using cURL to get the access token
  /*$c = curl_init();
  //set cURL options
  curl_setopt($c, CURLOPT_URL, $url); //URL to send request to
  curl_setopt($c, CURLOPT_POST, true);
  curl_setopt($c, CURLOPT_POSTFIELDS, $params);
  $result = curl_exec($c);
  print_r($result);
  curl_close($c);*/
  //POST with PHP core
  $opts = array(
    'http' => array(
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query($params)
    )
  );
  $str = stream_context_create($opts);
  $result = file_get_contents($url, false, $str);
  $res = json_decode($result);
  if (isset($res->access_token)) {
    $_SESSION['authstate'] = 'authorized';
    $_SESSION['linkedin']['token'] = $res->access_token;
    return $res;
  } else {
    $_SESSION['authstate'] = '';
    return false;
  }
}
function getProfile() {
  $req_url = 'https://api.linkedin.com/v1/people/~?format=json';
  /*$header = array();
  $header[] = 'Authorization: Bearer ' . $_SESSION['linkedin']['token'];
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, $req_url);
  curl_setopt($c, CURLOPT_HTTPHEADER, $header);
  curl_setopt($c, CURLOPT_POST, true);
  $result = curl_exec($c);
  curl_close($c);*/
  
  $opts = array(
    'http' => array(
      'header' => "Authorization: Bearer " . $_SESSION['linkedin']['token'] . "\r\n",
      'method' => 'GET'
    )
  );
  $str = stream_context_create($opts);
  $result = file_get_contents($req_url, false, $str);
  return json_decode($result);
}
//DO THE CHECKS
//if session for state not even set, get authorization code
$state = array();
if (empty($_SESSION['authstate'])) {
  getAuthCode($LINKEDIN_CFG, $LINKEDIN_AUTH_PAGE);
}
//if there is an authorization code, move on to the access token
if ($_SESSION['authstate'] == 'authorizing' || $_SESSION['authstate'] == 'code') {
  if ($_SESSION['linkedin']['state'] == $_GET['state']) {
    if ($_SESSION['authstate'] == 'authorizing') {
      $_SESSION['linkedin']['auth'] = $_GET['code'];
    }
    $_SESSION['authstate'] = 'code';
    $state = getAccessToken($_SESSION['linkedin']['auth'], $LINKEDIN_CFG, $LINKEDIN_ACCESSTOKEN_PAGE);
  } else {
    getAuthCode($LINKEDIN_CFG, $LINKEDIN_AUTH_PAGE);
  }
}
//if there is an access token, get the profile data 
if ($_SESSION['authstate'] == 'authorized') {
  //GET THE PROFILE
  $profile = getProfile();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Test LinkedIn</title>
  </head>
  <body>
    <h1>Your Profile</h1>
    <?php 
      if (empty($profile)) {
        print 'There was an error retrieving your profile...';
      } else {
        print "Hello, $profile->firstName $profile->lastName";
      }
    ?>
  </body>
</html>
<?php
}
?>