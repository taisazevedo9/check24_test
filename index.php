<?php 
require __DIR__ . '/vendor/autoload.php';
use Core\ConfigController as Home;
ob_start();    
session_start();



if (isset($_GET['logout']) && $_GET['logout'] == true) {
    // var_dump('aaaa');die;
    session_destroy ();
    // unset($_SESSION["userLogin"]);

    header("Location: http://localhost/check24_test/home/");
    die;
}


    $google = new \League\OAuth2\Client\Provider\Google(GOOGLE);
    $authUrl = $google->getAuthorizationUrl();
    
    if (!empty($_GET['error'])) {
    
        // Got an error, probably user denied access
        exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));
    
    } elseif (empty($_GET['code'])) {
        // If we don't have an authorization code then get one
        $authUrl = $google->getAuthorizationUrl();
        $_SESSION['oauth2state'] = $google->getState();
        $_SESSION['authUrl'] = $authUrl;
      
        $url = new Home();
        $url->loadConfig();
    
    } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    
        // State is invalid, possible CSRF attack in progress
        unset($_SESSION['oauth2state']);
        exit('Invalid state');
    
    } else {
    
        $token = $google->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
    
        // Optional: Now you have a token you can look up a users profile data
        try {
    
            // We got an access token, let's now get the owner details
            $ownerDetails = $google->getResourceOwner($token);
            $_SESSION["userLogin"] = $ownerDetails;
    
            header("Location: " . GOOGLE["redirectUri"]);
            die;
        } catch (Exception $e) {
    
            // Failed to get user details
            exit('Something went wrong: ' . $e->getMessage());
    
        }
    
    }

    ob_end_flush();