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


        if (isset($_SESSION['facebook_access_token'])) {

            $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

            // get list of friends' names
            try {
                $requestFriends = $fb->get('/me/taggable_friends?fields=name&limit=1000');
                $friends = $requestFriends->getGraphEdge();
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }


            // getting all posts published by user
            try {
                $posts_request = $fb->get('/me/posts?limit=500');
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

//            $posts_response = $posts_request->getGraphEdge()->asArray();

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

        $this->view('home/index', ['friends' => $friends->asArray(), 'posts' => $total_posts]);
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