<?php
// include __DIR__ . '/mautic/vendor/autoload.php';
//
// use Mautic\Auth\ApiAuth;
//
//
//
// $settings = array(
//     'userName'   => 'admin',             // Create a new user
//     'password'   => 'admin1234'              // Make it a secure password
// );
//
// // Initiate the auth object specifying to use BasicAuth
// $initAuth = new ApiAuth();
// $auth = $initAuth->newAuth($settings, 'BasicAuth');
//
// use Mautic\MauticApi;
//
// $api = new MauticApi();
// $contactApi = $api->newApi('contacts', $auth, 'http://symfony.projects/mautic/');

require_once 'Api.php';
$data = array(
    'firstname' => 'Nitin',
    'lastname'  => 'Sood',
    'email'     => 'soodnitin21@happyshappy.com',
    'ipAddress' => $_SERVER['REMOTE_ADDR']
);
$map=new Api();
$map->pushContactToMautic($data);
