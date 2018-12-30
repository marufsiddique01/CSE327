<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '1006711764872-gi9kgj4jmlkcbcb8omu560q0na0ghrl1.apps.googleusercontent.com';
$config['google']['client_secret']    = 'KWxd3YhT2Adjj3BktnhQ87ds';
$config['google']['redirect_uri']     = 'http://localhost/new_metro_ci/deliverylogin';
$config['google']['application_name'] = 'Login to Metro Soft';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();