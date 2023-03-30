<?php

class Recipes extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->recipeModel = $this->model('Recipe');
        $this->userModel = $this->model('User');
    }
    public function index()
    {
        // todo decide about calling that method
        //Get posts
        $recipes = $this->recipeModel->getRecipes();


        $data = [
            'recipes' => $recipes
        ];
        $this->view('recipes/index', $data);
    }
}