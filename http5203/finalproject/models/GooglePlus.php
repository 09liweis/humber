<?php

class GooglePlus {
    const CLIENT_ID = '433300294368-sp6f150psm0akdkomhn80laqqmd5fukh.apps.googleusercontent.com';
    const CLIENT_SECRET = '1QwJraMuCR0FG8mexKoLXhl-';
    private $client;
    
    public function __construct($redirectURL) {
        
        $this->client = new Google_Client();
        $this->client->setClientId(self::CLIENT_ID);
        $this->client->setClientSecret(self::CLIENT_SECRET);
        $this->client->setRedirectURi($redirectURL);
        $this->client->setScopes('email');
    }
    
    public function getProfile($code) {
        $this->client->authenticate($code);
        $accessToken = $this->client->getAccessToken();
        $this->client->setAccessToken($accessToken);
        
        $plus = new Google_Service_Plus($this->client);
        $me = $plus->people->get('me');
        $username = $me->displayName;
        $profileimage = $me->image->url;
        $google_plus_id = $me->id;;
    }
}