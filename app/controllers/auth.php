<?php

use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use Facebook\FacebookSession;
use Facebook\GraphUser;

//use Facebook\Entities\AccessToken;
//use Facebook\HttpClients\FacebookCurlHttpClient;
//use Facebook\HttpClients\FacebookHttpable;

class Auth extends Controller
{
    public function login()
    {
//        print_r($_REQUEST);
















        $this->view('auth/login');
    }

    public function logout()
    {
        session_unset();

        $_SESSION['FBID'] = NULL;
        $_SESSION['FULLNAME'] = NULL;
        $_SESSION['EMAIL'] =  NULL;

        header("Location: /");
    }

    public function face()
    {
        FacebookSession::setDefaultApplication(
            '166803343700868',
            '49cf2bd6b9b304361f1b2455103723fd'
        );

        $helper = new FacebookRedirectLoginHelper( 'http://mvc.local/auth/face' );

        try {
            $session = $helper->getSessionFromRedirect();
        } catch(FacebookRequestException $ex) {
            // When Facebook returns an error
        } catch(\Exception $ex) {
            // When validation fails or other local issues
        }

        $loginUrl = $helper->getLoginUrl();

        if ( isset( $session ) ) {
            // graph api request for user data
            $request = new FacebookRequest( $session, 'GET', '/me' );
            $response = $request->execute();
            // get response
            $graphObject = $response->getGraphObject();
            $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
            $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
            $femail = $graphObject->getProperty('email');    // To Get Facebook email ID


            /* ---- Session Variables -----*/
            $_SESSION['AUTH'] = true;
            $_SESSION['FBID'] = $fbid;
            $_SESSION['FULLNAME'] = $fbfullname;
            $_SESSION['EMAIL'] =  $femail;
            /* ---- header location after session ----*/
            header("Location: /");
        } else {
            $loginUrl = $helper->getLoginUrl(array('email'));
            header("Location: ".$loginUrl);
        }

    }
}