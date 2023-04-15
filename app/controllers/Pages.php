<?php

class Pages extends Controller
{


    public function __construct()
    {

    }


    public function index()
    {
        if(isLoggedIn()){
            redirect('recipes/index');
        }
        $data = [
            'title' => 'Welcome',
            'description' => 'Prosty projekt strony z postami z wykorzystaniem frameworka krepiMVC PHP z kursu Brada Traversy'
        ];


        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'Prosty projekt strony z postami z wykorzystaniem frameworka krepiMVC PHP z kursu Brada Traversy'
        ];
        $this->view('pages/about', $data);
    }

    public function recipes()
    {
        if(isLoggedIn()){
            redirect('recipes/your_recipes');
        }
        $data =[
          'title' => 'Recipes',
          'description' => "Here we will display your recipes if You log in. "
        ];
        $this->view('pages/recipes', $data);
    }
}
