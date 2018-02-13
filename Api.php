<?php
/*
* ClassName : MauticApi
*/
include __DIR__ . '/mautic/vendor/autoload.php';

use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

Class Api {

       private $baseApiUrl='https://camp.happyshappy.com/';//Your Mautic Instance Url

       private $version='';//Version of the OAuth can be OAuth2 or OAuth1a. OAuth2 is the default value.

       private $clientKey='';//Client/Consumer key from Mautic

       private $clientSecret='';//Client/Consumer secret key from Mautic

       private $callBack ='';//Redirect URI/Callback URI for this script

       private $userName='pkumar';//Your Mautic Username

       private $passWord='happyshappy';//Your Mautic Password

       private $auth=null;

       private $api=null;



       public function __construct(){
             //Basic Authorization
             $settings = array(
                 'userName'   => $this->userName,             // Create a new user
                 'password'   => $this->passWord              // Make it a secure password
             );

            //  $settings = array(
            //       'baseUrl'          => $this->baseApiUrl,       // Base URL of the Mautic instance
            //       'version'          => 'OAuth1a', // Version of the OAuth can be OAuth2 or OAuth1a. OAuth2 is the default value.
            //       'clientKey'        => '1f84mnwia36s8ckcwoco8o4kcw84o48scs4k0cgksk0gwo8ow8',       // Client/Consumer key from Mautic
            //       'clientSecret'     => '4p09iwpaxjeoowwkowwg4wgog4kk0kkk440sk4g00kcgsosos4',       // Client/Consumer secret key from Mautic
            //       'callback'         => 'https://www.happyshappy.com/'        // Redirect URI/Callback URI for this script
            //   );

             // Initiate the auth object specifying to use BasicAuth
             $initAuth = new ApiAuth();
             $this->auth = $initAuth->newAuth($settings, 'BasicAuth');

             $this->api = new MauticApi();
       }

       //Push to Mautic
       public function pushContactToMautic($data){
            $contactApi = $this->api->newApi('contacts', $this->auth,$this->baseApiUrl );
            $contact = $contactApi->create($data);
            return $contact;
       }
}
