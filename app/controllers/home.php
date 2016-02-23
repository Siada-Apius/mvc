<?php


use Facebook\FacebookRequest;

class Home extends Controller
{
    public function __construct()
    {
        if( ! $_SESSION['auth']) {
            header("Location: ".LOGIN_URL);
        }
    }

    public function index($name = '')
    {
        $user = $this->medol('User');
        $user->name = $name;



        $fb = new Facebook\Facebook([
            'app_id' => FB_APP_ID,
            'app_secret' => FB_APP_SECRET,
            'default_graph_version' => FB_DEFAULT_GRAPH_VERSION,
        ]);
        $permissions = ['user_friends']; // optionnal

        $error = null;
        if (isset($_SESSION['facebook_access_token'])) {

            $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

            // get list of friends' names
            try {
                $requestFriends = $fb->get('/me/taggable_friends?fields=name&limit=1000');
                $friends = $requestFriends->getGraphEdge();
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                $error['error'] = 'This is a test application, if you want to see your friends list contact administrator!';
                $error['taggable_friends']['graph'] = 'Graph returned an error: ' . $e->getMessage();
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                $error['error'] = 'This is a test application, if you want to see your friends list contact administrator!';
                $error['taggable_friends']['sdk'] = 'Facebook SDK returned an error: ' . $e->getMessage();
            }


            if (isset($_POST['message'])) {
                $post = $fb->post('/me/feed', array('message' => $_POST['message']));
                //$post = $post->getGraphNode()->asArray();
            }


            // getting all posts published by user
            try {
                $posts_request = $fb->get('/me/posts?limit=500');
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                $error['error'] = 'This is a test application, if you want to see your posts list contact administrator!';
                $error['posts']['graph'] = 'Graph returned an error: ' . $e->getMessage();
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                $error['error'] = 'This is a test application, if you want to see your posts list contact administrator!';
                $error['posts']['sdk'] = 'Facebook SDK returned an error: ' . $e->getMessage();
            }


            $total_posts = array();
            $posts_response = $posts_request->getGraphEdge();
            if($fb->next($posts_response)) {
                $response_array = $posts_response->asArray();
                $total_posts = array_merge($total_posts, $response_array);
                while ($posts_response = $fb->next($posts_response)) {
                    $response_array = $posts_response->asArray();
                    $total_posts = array_merge($total_posts, $response_array);
                }
            } else {
                $posts_response = $posts_request->getGraphEdge()->asArray();
                $total_posts = $posts_response;
            }

        }

        if (isset($error['taggable_friends'])) {
            $fr = null;
        } else {
            $fr = $friends->asArray();
        }

        if (isset($error['posts'])) {
            $po = null;
        } else {
            $po = $total_posts;
        }

        $this->view('home/index', ['friends' => $fr, 'posts' => $po, 'error' => $error]);

    }

    public function create($name = '')
    {
        if( ! empty($name)) {
            User::create([
                'name' => $name
            ]);
        }
    }


    public function profile()
    {
        $user = User::whereFacebookId($_SESSION['auth_user']['id'])->first();

        $this->view('home/profile', ['user' => $user]);
    }
}