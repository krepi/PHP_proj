<?php

class Pages extends Controller
{


    public function __construct()
    {

    }


    public function index()
    {
        if (!isLoggedIn()) {
            redirect('recipes/index');
        } else{
            redirect('recipes/index');
        }
//        $data = [
//            'title' => 'Welcome',
//            'description' => 'Prosty projekt strony z postami z wykorzystaniem frameworka krepiMVC PHP z kursu Brada Traversy'
//        ];
//
//
//        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About App',
            'description' => 'This is first iteration of this application. Just some PHP and JS for learn fundations'
        ];
        $this->view('pages/about', $data);
    }

    public function recipes()
    {
        if (isLoggedIn()) {
            redirect('recipes/your_recipes');
        }else{
            redirect('users/login');
        }


    }
}
