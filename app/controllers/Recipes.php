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
        $this->apiModel = $this->model('RecipeApi');

    }

    public function index()
    {
        // todo decide about calling that method
        if (isLoggedIn()) {
//            redirect('recipes');

            $dataApi = $this->apiModel->getData();

            // exteract recipes from   Api datas
            $recipesApi = $dataApi['results'];
            $newRecipes=[];
            // check is  recipe in DB as favorite  and add proper class for button
            foreach ($recipesApi as $recipe) {

                $user = $_SESSION['user_id'];

                $id = $recipe['id'];

                if ($this->recipeModel->findRecipeById($id, $user)) {
                    $btn_class = 'btn-warning';
                } else {
                    $btn_class = 'btn-light';
                }
                // add btn class for recipe
                $recipe ['btn_class'] = $btn_class;
                $newRecipes[$recipe['id']] = $recipe;
            }

            $data = [
                'title' => 'Notes z recipe ',
                'description' => 'Tutaj znajdziesz swoje ulubione przepisy i zestawy',
                'recipes' => $newRecipes

            ];
            print_r($data);
            $this->view('recipes/index', $data);

        } else {
            $data = [
                'title' => 'Notes ',
                'description' => 'Prosty projekt strony z postami z wykorzystaniem frameworka krepiMVC PHP z kursu Brada Traversy',
                'recipes' => [],
                'btn_class' => 'btn-light'
            ];
        }


    }


    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print_r($_POST);
            $data = [
                'recipe_id' => trim($_POST['recipe_id']),
                'user_id' => $_SESSION['user_id'],

            ];
            $id = $data['recipe_id'];
            $user = $_SESSION['user_id'];

            //check if recipe_id is already liked in database
            if ($this->recipeModel->findRecipeById($id, $user)) {
                echo "recipe $id is already added by user $user  ";
            } else {
                // adding to database  if not
                if ($this->recipeModel->addRecipe($data)) {
                    flash('post_message', 'recipe added to favorites');
                    redirect('recipes/index');
                    echo "dodane przez controller z if . $id . user . $user";
                } else {
                    echo " cos poszło nie tak";
                }
            }


        }

    }
}