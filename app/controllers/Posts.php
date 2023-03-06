<?php

class Posts extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }


    public function index()
    {
        //Get posts
        $posts = $this->postModel->getPosts();


        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }


    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize the post
            $_POST = filter_input_array(htmlspecialchars(INPUT_POST));

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

            //validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }
            //make sure no errors
            if (empty($data['title_err']) && empty($data['body_err'])) {
                //validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('something went wrong');
                }
            } else {
                //load view with errors
                $this->view('posts/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => ''
            ];
            $this->view('posts/add', $data);
        }
    }



    public function show($id){

       $post = $this->postModel->getPostById($id);
       $user = $this->userModel->getUserById($post->user_id);
       
        $data = [
           'post'=>$post ,
           'user'=>$user
        ];



        $this->view('posts/show', $data);
    }
}
