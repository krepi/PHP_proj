<?php

class Pages extends Controller
{
    public RecipeApi $recipeApi;

    public function __construct()
    {
        if (isLoggedIn()) {
//            redirect('/');


        $this->recipeModel = $this->model('Recipe');
        $this->userModel = $this->model('User');
        }

    }


    public function index()
    {
        if (isLoggedIn()) {
//            redirect('recipes');



        $recipeApi = new RecipeApi('',3);
         $recipes = $recipeApi->getData();

         $user= $_SESSION['user_id'];
            $id = '133432';

        if($this->recipeModel->findRecipeById($id, $user)){
            $btn_class = 'btn-warning';
        } else {
            $btn_class = 'btn-light';
        }
            $data = [
                'title' => 'Notes ',
                'description' => 'Prosty projekt strony z postami z wykorzystaniem frameworka krepiMVC PHP z kursu Brada Traversy',
                'recipes' => $recipes,
                'btn_class'=> $btn_class
            ];
            $this->view('pages/index', $data);

        } else {
            $data = [
                'title' => 'Notes ',
                'description' => 'Prosty projekt strony z postami z wykorzystaniem frameworka krepiMVC PHP z kursu Brada Traversy',
                'recipes' =>[],
                'btn_class'=> 'btn-light'
            ];
        }



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
