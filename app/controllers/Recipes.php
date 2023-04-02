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
        //Get recipes Ids from DB
        $recipes = $this->recipeModel->getRecipes();    
//        $recipes = $this->recipeApi->getRecipes();


        $data = [
            'recipes' => $recipes->title
        ];
        $this->view('recipes/index', $data);
    }
}