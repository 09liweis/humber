<?php
session_start();
$sandbox = 'https://api.sandbox.paypal.com';
$PAYPAL_CFG = array(
 'client_id' => 'YOUR_CLIENT_ID',
 'secret' => 'YOUR_CLIENT_SECRET'
);
//THE FOLLOWING IS SIMPLE CODE, BUT IT IS RECOMMENDED THAT YOU CREATE A CLASS.

//Again, this code is incomplete but a good idea is to create a class which handles PayPal related
//stuff. You can create a PayPal object which handles API calls using methods. Invalid token errors
//can just simply request another access token before making the API call again.

//The code below is just a simple example without classes. It is only to demonstrate PayPal integration
//but you should always use best practices and make your code fully object-oriented if possible.
//An alternative to writing your own class is to use an SDK. Even if you use an SDK, depending on your
//use case, you may still find it useful to have your own class to customize the shopping cart experience
//for a particular site.
if (!isset($_SESSION['pp_token'])) {
  requestToken($sandbox, $PAYPAL_CFG);
}
sendToPayPal($sandbox, $PAYPAL_CFG, '25.00');
//still need to add code to get new token if 401 error
function requestToken($baseurl, $config) {
  $req = $baseurl.'/v1/oauth2/token';
  $header = array(
    'Accept: application/json',
    'Content-Type: application/x-www-form-urlencoded'
  );
  $params = array(
    'grant_type' => 'client_credentials'
  );
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, $req);
  curl_setopt($c, CURLOPT_HTTPHEADER, $header);
  curl_setopt($c, CURLOPT_USERPWD, $config['client_id'].':'.$config['secret']);
  curl_setopt($c, CURLOPT_POST, true);
  curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($params));
  curl_setopt($c, CURLOPT_SSLVERSION, 6);
  curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 1);
  curl_setopt($c, CURLOPT_CAINFO, 'cert/cacert.pem');
  curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
  $result =  json_decode(curl_exec($c));
  if (isset($result->access_token)){
    $_SESSION['pp_token'] = $result->access_token;
  }
  curl_close($c);
}
function sendToPayPal($baseurl, $config, $total) {
  if (!isset($_SESSION['pp_token'])) {
    requestToken($config);
  }
  $req = $baseurl.'/v1/payments/payment';
  $header = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $_SESSION['pp_token']
  );
  $test = array(
    "intent" => "sale",
    "redirect_urls" => array(
      "return_url" => "YOUR_RETURN_URL",
      "cancel_url" => "YOUR_RETURN_URL",
    ),
    "payer" => array(
      "payment_method" => "paypal"
    ),
    "transactions" => array(
      array(
        "amount" => array(
          "total" => "25.00",
          "currency" => "CAD"
        )
      )
    )
  );
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, $req);
  curl_setopt($c, CURLOPT_HTTPHEADER, $header);
  curl_setopt($c, CURLOPT_POST, true);
  curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($test));
  curl_setopt($c, CURLOPT_SSLVERSION, 6);
  curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 1);
  curl_setopt($c, CURLOPT_CAINFO, 'cert/cacert.pem');
  curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
  $result = json_decode(curl_exec($c));
  curl_close($c);
  //print_r($result);
  print '<a href="'.$result->links[1]->href.'">Pay with PayPal</a>';
}