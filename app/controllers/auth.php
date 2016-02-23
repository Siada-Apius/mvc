<?php

class Auth extends Controller
{
    public function __construct()
    {
        if ($_SESSION['auth']) {
            header("Location: ". HOME_URL);
            exit();
        }
    }


    public function index()
    {
        $this->view('auth/login');
    }

    public function login()
    {
        if ($_POST) {
            if (User::where(['email' => $_POST['email'], 'password' => md5($_POST['password'])])->exists()) {
                $_SESSION['auth'] = true;
                header("Location: " . HOME_URL);
            } else {
                header("Location: " . LOGIN_URL);
            }
        }
    }

    public function logout()
    {
        session_unset();

        $_SESSION['auth'] = null;
        $_SESSION['fb_auth'] = null;
        $_SESSION['auth_user'] = null;

        header("Location: " . LOGIN_URL);
    }

    public function face()
    {
        $fb = new Facebook\Facebook([
            'app_id' => FB_APP_ID,
            'app_secret' => FB_APP_SECRET,
            'default_graph_version' => FB_DEFAULT_GRAPH_VERSION,
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $helper->getLoginUrl(FACE_CALLBACK_URL, $permissions);

        header("Location: " . $loginUrl);
    }

    public function face_callback()
    {
        $fb = new Facebook\Facebook([
            'app_id' => FB_APP_ID,
            'app_secret' => FB_APP_SECRET,
            'default_graph_version' => FB_DEFAULT_GRAPH_VERSION,
        ]);

        $permissions = ['email'];

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            if (isset($_SESSION['facebook_access_token'])) {
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            } else {
                $_SESSION['facebook_access_token'] = (string)$accessToken;
                // OAuth 2.0 client handler
                $oAuth2Client = $fb->getOAuth2Client();
                // Exchanges a short-lived access token for a long-lived one
                $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
                $_SESSION['facebook_access_token'] = (string)$longLivedAccessToken;
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            }
            // validating the access token
            try {
                $request = $fb->get('/me');
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                if ($e->getCode() == 190) {
                    unset($_SESSION['facebook_access_token']);
                    $helper = $fb->getRedirectLoginHelper();
                    $loginUrl = $helper->getLoginUrl(LOGIN_URL, $permissions);
                    header("Location: " . $loginUrl);
                    exit;
                }
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            // getting basic info about user
            try {
                $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
                $profile = $profile_request->getGraphNode()->asArray();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                unset($_SESSION['facebook_access_token']);
                header("Location: " . LOGIN_URL);
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            $_SESSION['auth'] = true;
            $_SESSION['fb_auth'] = true;
            $_SESSION['auth_user'] = $profile;

            header("Location: " . HOME_URL);
        } else {
            $helper = $fb->getRedirectLoginHelper();
            $loginUrl = $helper->getLoginUrl(LOGIN_URL, $permissions);
            header("Location: " . $loginUrl);
        }
    }

    public function profile()
    {
        $this->view('auth/profile');
    }

    public function signin()
    {
        if ($_POST) {
            if (User::whereEmail($_POST['email'])->exists()) {
                echo 'Email already exist!';
                exit;
            } else {
                User::create([
                    'name'      => htmlspecialchars($_POST['first_name'] .' '. $_POST['last_name']),
                    'first_name' => htmlspecialchars($_POST['first_name']),
                    'last_name' => htmlspecialchars($_POST['last_name']),
                    'email'     => htmlspecialchars($_POST['email']),
                    'password'  => htmlspecialchars(md5($_POST['password']))
                ]);

                $_SESSION['auth'] = true;
                $_SESSION['fb_auth'] = false;
                $_SESSION['auth_user']['first_name'] = $_POST['first_name'];
                $_SESSION['auth_user']['last_name'] = $_POST['last_name'];
                $_SESSION['auth_user']['name'] = $_POST['first_name'] .' '. $_POST['last_name'];
                $_SESSION['auth_user']['email'] = $_POST['email'];

                header("Location: " . HOME_URL);
            }
        }

        $this->view('auth/signin');
    }
}