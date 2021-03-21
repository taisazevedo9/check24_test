<?php 
require __DIR__ . '/vendor/autoload.php';
use League\OAuth2\Client\Provider\Google; 
use Core\ConfigController as Home;

    
    session_start(); // Remove if session.auto_start=1 in php.ini

    $provider = new Google([
        'clientId'     => '251811500388-63m2k88n0a7tit2q3po61m34u507mp8n.apps.googleusercontent.com',
        'clientSecret' => 'vYfYRqHzQyRCZhidsAqvJQoI',
        'redirectUri'  => 'http://localhost/check24_test/',
      
    ]);
    
    if (!empty($_GET['error'])) {
    
        // Got an error, probably user denied access
        exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));
    
    } elseif (empty($_GET['code'])) {
    // var_dump("teste");die;
        // If we don't have an authorization code then get one
        $authUrl = $provider->getAuthorizationUrl();
        $_SESSION['oauth2state'] = $provider->getState();
        // header('Location: ' . $authUrl);
        // exit;    
        $_SESSION['authUrlLogin'] = $authUrl;
        
        $url = new Home();
        $url->loadConfig();
        
    
    } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    
        // State is invalid, possible CSRF attack in progress
        unset($_SESSION['oauth2state']);
        exit('Invalid state');
    
    } else {
        var_dump('aa');
        // $url = new Home();
        // $url->loadConfig();
        // Try to get an access token (using the authorization code grant)
        $token = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
    
        // Optional: Now you have a token you can look up a users profile data
        try {
    
            // We got an access token, let's now get the owner details
            $ownerDetails = $provider->getResourceOwner($token);
    
            // Use these details to create a new profile
            printf('Hello %s!', $ownerDetails->getFirstName());
            
            // $loadView = new \Core\ConfigView('Views/login/login',$ownerDetails->getFirstName());
            // $loadView->renderView();
    
        } catch (Exception $e) {
    
            // Failed to get user details
            exit('Something went wrong: ' . $e->getMessage());
    
        }
    
        // Use this to interact with an API on the users behalf
        echo $token->getToken();
    
        // Use this to get a new access token if the old one expires
        echo $token->getRefreshToken();
    
        // Unix timestamp at which the access token expires
        echo $token->getExpires();
    }
    // $url = new Home();
    // $url->loadConfig();
