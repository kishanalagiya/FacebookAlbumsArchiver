<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '488847108076-j50bbvakd3dd5nmo6kuoc46mbjl6vhjc.apps.googleusercontent.com';
$config['google']['client_secret']    = 'odxPgdmjKsvsbbHJJuIB1MKf';
$config['google']['redirect_uri']     = 'https://kishanakworld.000webhostapp.com/index.php/User_authentication';
$config['google']['application_name'] = 'Login to rtcamptest';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array("https://www.googleapis.com/auth/userinfo.email", "https://www.googleapis.com/auth/userinfo.profile","https://www.googleapis.com/auth/drive");

?>