<?php

class Pages extends Controller
{
    public RecipeApi $recipeApi;

    /**
     * @param RecipeApi $recipeApi
     */
    public function __construct()
    {

    }


    public function index()
    {
        if (isLoggedIn()) {
            redirect('posts');
        }

        $recipeApi = new RecipeApi('breakfast&includeIngredients=eggs',3);
         $recipes = $recipeApi->getData();

        $data = [
            'title' => 'Notes ',
            'description' => 'Prosty projekt strony z postami z wykorzystaniem frameworka krepiMVC PHP z kursu Brada Traversy',
            'recipes' => $recipes
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
        $data =[
          'title' => 'Recipes',
          'description' => "here we will display recipes"
        ];
        $this->view('pages/recipes', $data);
    }
}
